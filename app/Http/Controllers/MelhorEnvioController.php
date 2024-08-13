<?php

namespace App\Http\Controllers;

use App\Integration;
use App\Product;
use Illuminate\Http\Request;

use function GuzzleHttp\json_decode;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Response;

class MelhorEnvioController extends Controller
{
    protected $url;
    protected $integration;

    public function __construct()
    {
        $this->integration = Integration::first();
        $environmentSandbox = env('ENVIRONMENT_SANDBOX', false);

        $this->url = 'https://melhorenvio.com.br';
        if($environmentSandbox){
            $this->url = 'https://sandbox.melhorenvio.com.br';
        }
    }

    public function calc(Request $request){
        $dateRefresh = date('Y-m-d', strtotime("-2 days",strtotime($this->integration->token_expires_in_me)));

        if($dateRefresh < date("Y-m-d")){

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url."/oauth/token",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array(
                    'grant_type' => 'refresh_token'
                    ,'refresh_token' => $this->integration->refresh_token_me
                    ,'client_id' => $this->integration->client_id_me
                    ,'client_secret' => $this->integration->client_secret_me
                ),
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json"
                ),
            ));

            $curlRefresh = json_decode(curl_exec($curl));
            curl_close($curl);

            $daysRefresh = $curlRefresh->expires_in / 60 / 60 / 24;
            $dateRefresh = date('Y-m-d', strtotime("+{$daysRefresh} days",strtotime(date("Y-m-d"))));

            $this->integration = Integration::first();
            $this->integration->token_me = $curlRefresh->access_token;
            $this->integration->refresh_token_me = $curlRefresh->refresh_token;
            $this->integration->token_expires_in_me = $dateRefresh;
            $this->integration->save();
        }

        $this->integrations = Integration::first();
        $cartTotal = str_replace(',', '', Cart::total());

        $carts = Cart::content();
        $productsCart = [];
        foreach($carts as $cart){
            $products = [
                "id" => $cart->id,
                "width" => $cart->options->width,
                "height" => $cart->options->height,
                "length" => $cart->options->length,
                "weigth" => $cart->options->weigth,
                "insurance_value" => $cart->price,
                "quantity" => $cart->qty
            ];

            array_push($productsCart, $products);
        }

        $arrayContent =
            [
                "from" => [
                    "postal_code" => "41745030"
                ],
                "to" => [
                    "postal_code" => $request->zip_code
                ],
                "products" => $productsCart
            ];

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->integration->token_me,
            'Content: '.json_encode($arrayContent)
        ];

        $curl = curl_init($this->url."/api/v2/me/shipment/calculate");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($arrayContent));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER , true);
        curl_setopt($curl, CURLOPT_POST, true);

        $responseCurl   = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            $message = sprintf('cURL error[%s]: %s', curl_errno($curl), curl_error($curl));
            dd($message);
        }

        curl_close($curl);

        $returnME = json_decode($responseCurl);

        if(isset($returnME->message)){
            $response['status'] = 'error';
            $response['message'] = $returnME->message;
            return Response::json($response);
        }
        $html = '<div id="inputOpcaoFrete" class="viewOpcoesFrete"> <ul id="inputOpcaoFrete">';
        $company = '';



        foreach($returnME as $freight){
            if($company == $freight->company->name){
                $picture = '';
                $company = '';
            }else{
                $picture = $freight->company->picture;
                $company = $freight->company->name;
            }

            if(!isset($freight->error)){
                $html .= '';
                if($picture <> ''){
                    $html .= '<div class="form-group"><li class="image"><img class="company" src="'.$picture.'" width="80px"></li> </div>';
                }
                $html .='<li>';
                $html .=                    '

                    <div class="form-group">
                        <label for="freight-'.$freight->id.'">
                            <span>'.$freight->name.'</span>
                            <span>'.$freight->currency.' '.$freight->price.' ('.$freight->delivery_time.' dias)</span>
                        </label>
                    </div>
                ';
                $html .='</li>';
            }
        }

        if($cartTotal >= $this->integrations->min_price_freight_free && $this->integrations->min_price_freight_free <> ''){
            $html .=
                '<div class="form-group freteTitulo"><li class="image"><img src="'.asset('site/assets/images/logoFrete.png').'" width="80" alt="Frete Daducha"></li></div>
                    <div class="form-group">
                        <label for="gratis">Grátis <i>('.$returnME[1]->delivery_time.' dias)</i></label>
                    </div>
                    <div class="form-group">
                        <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
                    </div>
                ';
        }else{
            $html .=
                '<div class="form-group freteTitulo"><li class="image"><img src="'.asset('site/assets/images/logoFrete.png').'" width="80" alt="Frete Daducha"></li></div>
                    <div class="form-group">
                        <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
                    </div>
                    <div class="form-group">
                        <label for="retira_loja">Frete Fixo R$ 15,00 <i>(Motoboy)</i></label>
                    </div>
                ';
        }

        $html .= '</ul>
                </div>';

        $response['status'] = 'success';
        $response['html'] = $html;

        return Response::json($response);

    }

    public function selectFreigth($zip_code){
        $dateRefresh = date('Y-m-d', strtotime("-2 days",strtotime($this->integration->token_expires_in_me)));

        if($dateRefresh < date("Y-m-d")){

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url."/oauth/token",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('grant_type' => 'refresh_token','refresh_token' => $this->integration->refresh_token_me,'client_id' => $this->integration->client_id_me, 'client_secret' => $this->integration->client_secret_me),
                CURLOPT_HTTPHEADER => array(
                    "Accept: application/json"
                ),
            ));

            $curlRefresh = json_decode(curl_exec($curl));
            curl_close($curl);

            $daysRefresh = $curlRefresh->expires_in / 60 / 60 / 24;
            $dateRefresh = date('Y-m-d', strtotime("+{$daysRefresh} days",strtotime(date("Y-m-d"))));

            $this->integration->token_me = $curlRefresh->access_token;
            $this->integration->refresh_token_me = $curlRefresh->refresh_token;
            $this->integration->token_expires_in_me = $dateRefresh;
            $this->integration->save();
        }

        $carts = Cart::content();
        $productsCart = [];
        foreach($carts as $cart){
            $products = [
                "id" => $cart->id,
                "width" => $cart->options->width,
                "height" => $cart->options->height,
                "length" => $cart->options->length,
                "weigth" => $cart->options->weigth,
                "insurance_value" => $cart->price,
                "quantity" => $cart->qty
            ];

            array_push($productsCart, $products);
        }

        $arrayContent =
            [
                "from" => [
                    "postal_code" => "41745030"
                ],
                "to" => [
                    "postal_code" => $zip_code
                ],
                "products" => $productsCart
            ];

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer '.$this->integration->token_me,
            'Content: '.json_encode($arrayContent)
        ];

        $curl = curl_init($this->url."/api/v2/me/shipment/calculate");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($arrayContent));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER , true);
        curl_setopt($curl, CURLOPT_POST, true);

        $responseCurl   = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            $message = sprintf('cURL error[%s]: %s', curl_errno($curl), curl_error($curl));
            dd($message);
        }

        curl_close($curl);

        $returnME = json_decode($responseCurl);

        if(isset($returnME->message)){
            $response['status'] = 'error';
            $response['message'] = $returnME->message;
            return Response::json($response);
        }

        return $returnME;

    }

    public function generateToken(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url.'/oauth/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'grant_type' => 'authorization_code',
                'client_id' => $this->integration->client_id_me,
                'client_secret' => $this->integration->client_secret_me,
                'redirect_uri' => url('')."/tokenME",
                'code' => $request->code),
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'User-Agent: Aplicação (anderson@hoom.com.br)'
            ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        $expires_in = $response->expires_in/60/60/24;
        $access_token = $response->access_token;
        $refresh_token = $response->refresh_token;

        $expires_in = date('Y-m-d', strtotime(date('Y-m-d').' + '.$expires_in.' days'));

        $this->integration->token_me = $access_token;
        $this->integration->refresh_token_me = $refresh_token;
        $this->integration->token_expires_in_me = $expires_in;

        if($this->integration->save()){
            echo "<script>alert('Token Gerado com sucesso, você já pode fechar está janela')</script>";
        }

    }
}
