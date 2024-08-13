<?php

namespace App\Http\Controllers;

use App\Cards;
use App\Extra;
use App\Order;
use App\Stock;
use App\Region;
use App\Address;
use App\Contact;
use App\Product;
use App\Category;
use App\Customer;
use App\OrderItem;
use App\OptionItem;
use App\PaymentMethod;
use App\NotificationPush;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use EscapeWork\Frete\Correios\Data;
use EscapeWork\Frete\FreteException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use EscapeWork\Frete\Correios\PrecoPrazo;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\CieloPaymentController;
use App\Http\Controllers\PagSeguroPaymentController;
use App\Integration;
use Artistas\PagSeguro\PagSeguroController;
use PagSeguro;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(Session::all());
        // Session::forget('cart_options.delivery');
        // Session::forget('cart_options.freight');
        // Session::save();

        // dd(Cart::content());


        // dd(PagSeguroPaymentController::getSaleOrder('082BDB70-7E25-46E0-BD92-08309C172C8B'));

        if(Cart::count()<1){
            // Session::flash('info', 'Adicione itens ao carrinho');
            return redirect()->route('site.product');
        }

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        $arrReturn = [
            'contacts' => Contact::first()
           ,'productsMenu' => $productsMenu
        ];

        if(Auth::guard('customer')->check()){
            // dd(Session::has('cart_options.freight'));
            if(!Session::has('cart_options.freight')){
                $address  = Address::where('customer_id', Auth::guard('customer')->user()->id)->where('default',1)->first();

                if(Session::has('cart_options.delivery')){
                    $address  = Address::where('customer_id', Auth::guard('customer')->user()->id)->where('id',Session::get('cart_options.delivery.id'))->first();
                }

                if($address){
                    $peso = Cart::weight();
                    $data = ['-', '.'];
                    $returnME = MelhorEnvioController::selectFreigth(str_replace($data, '',$address->zip_code));

                    // dd($returnME);

                    Session::forget('cart_options.delivery');
                    Session::forget('cart_options.freight');

                    Session::put('cart_options.delivery.id',$address->id);
                    Session::put('cart_options.delivery.zip_code',$address->zip_code);
                    Session::save();

                    $html = '<ul id="inputOpcaoFrete">';
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
                                $html .= '<li class="image"><img class="company" src="'.$picture.'" width="80px"></li>';
                            }
                            $html .='<li>';
                            $html .=
                                '
                                <input type="radio" name="freight" id="freight-'.$freight->id.'" data-type="'.$freight->name.'" data-prazo="'.$freight->delivery_time.'" value="'.$freight->price.'">
                                <label for="freight-'.$freight->id.'">
                                    <span>'.$freight->name.'</span>
                                    <span>'.$freight->currency.' '.$freight->price.' ('.$freight->delivery_time.' dias)</span>
                                </label>
                            ';
                            $html .='</li>';
                        }
                    }

                    $integrations = Integration::first();
                    $cartTotal = str_replace(',', '', Cart::total());

                    if($cartTotal >= $integrations->min_price_freight_free && $integrations->min_price_freight_free <> ''){
                        $html .= '<li><img src="'.asset('site/assets/images/logoFrete.png').'" width="80" alt="Frete Daducha"></li>
                                <li>
                                    <div class="form-group">
                                        <input type="radio" name="freight" id="gratis" data-type="gratis" data-prazo="'.$returnME[1]->delivery_time.'" value="0,00">
                                        <label for="gratis">Grátis <i>('.$returnME[1]->delivery_time.' dias)</i></label>
                                    </div>
                                  </li>
                                  <li>
                                    <div class="form-group">
                                        <input type="radio" name="freight" id="retira_loja" data-type="inStore" data-prazo="" value="0,00">
                                        <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <input type="radio" name="freight" id="frete_fixo" data-type="fixedFreight" data-prazo="Motoboy" value="15,00">
                                        <label for="frete_fixo">Frete Fixo Motoboy R$ 15,00 <i>(Somente Salvador)</i></label>
                                    </div>
                                </li>
                            ';
                    }else{
                        $html.='<li><img src="'.asset('site/assets/images/logoFrete.png').'" width="80" alt="Frete Daducha"></li>
                                <li>
                                    <div class="form-group">
                                        <input type="radio" name="freight" id="retira_loja" data-type="inStore" data-prazo="" value="0,00">
                                        <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-group">
                                        <input type="radio" name="freight" id="frete_fixo" data-type="fixedFreight" data-prazo="Motoboy" value="15,00">
                                        <label for="frete_fixo">Frete Fixo Motoboy R$ 15,00 <i>(Somente Salvador)</i></label>
                                    </div>
                                </li>
                            ';

                    }


                    $html .= '</ul>';


                    $arrReturn['frefreights'] = $html;
                }

            }

            $addresses = Address::where('customer_id', Auth::guard('customer')->user()->id)->get();
            $arrReturn['addresses'] = $addresses;
            $arrReturn['integration'] = Integration::first();
        }

        // dd($arrReturn);

        return view('site.pages.checkOut',$arrReturn);
    }

    public function deliveryAddress(Address $address)
    {

        $peso = Cart::weight();
        $data = ['-', '.'];
        $returnME = MelhorEnvioController::selectFreigth(str_replace($data, '',$address->zip_code));

        Session::forget('cart_options.delivery');
        Session::forget('cart_options.freight');

        Session::put('cart_options.delivery.id',$address->id);
        Session::put('cart_options.delivery.zip_code',$address->zip_code);
        Session::save();

        $html = '<ul id="inputOpcaoFrete">';
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
                    $html .= '<li class="image"><img class="company" src="'.$picture.'" width="80px"></li>';
                }
                $html .='<li>';
                $html .=
                    '
                            <input type="radio" name="freight" id="freight-'.$freight->id.'" data-type="'.$freight->name.'" data-prazo="'.$freight->delivery_time.'" value="'.$freight->price.'">
                            <label for="freight-'.$freight->id.'">
                                <span>'.$freight->name.' </span>
                                <span style="margin-left: 5px;"> '.$freight->currency.' '.$freight->price.' ('.$freight->delivery_time.' dias)</span>
                            </label>
                        ';
                $html .='</li>';
            }
        }

        $integrations = Integration::first();
        $cartTotal = str_replace(',', '', Cart::total());

        if($cartTotal >= $integrations->min_price_freight_free && $integrations->min_price_freight_free <> ''){
            $html.='<li><img src="'.asset('site/assets/images/logoFrete.png').'" width="80" alt="Frete Daducha"></li>
                    <li>
                        <div class="form-group">
                            <input type="radio" name="freight" id="gratis" data-type="gratis" data-prazo="'.$returnME[1]->delivery_time.'" value="0,00">
                            <label for="gratis">Grátis <i>('.$returnME[1]->delivery_time.' dias)</i></label>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <input type="radio" name="freight" id="retira_loja" data-type="inStore" data-prazo="" value="0,00">
                            <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <input type="radio" name="freight" id="frete_fixo" data-type="fixedFreight" data-prazo="Motoboy" value="15,00">
                            <label for="frete_fixo">Frete Fixo Motoboy R$ 15,00 <i>(Somente Salvador)</i></label>
                        </div>
                    </li>
                ';
        }else{

            $html.='<li><img src="'.asset('site/assets/images/logoFrete.png').'" width="80" alt="Frete Daducha"></li>
                    <li>
                        <div class="form-group">
                            <input type="radio" name="freight" id="retira_loja" data-type="inStore" data-prazo="" value="0,00">
                            <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <input type="radio" name="freight" id="frete_fixo" data-type="fixedFreight" data-prazo="Motoboy" value="15,00">
                            <label for="frete_fixo">Frete Fixo Motoboy R$ 15,00 <i>(Somente Salvador)</i></label>
                        </div>
                    </li>';
        }


        $html .= '</ul>';


        $response['status'] = 'success';
        $response['html'] = $html;

        return Response::json($response);

    }

    protected static function saveOrder($request, $paymentStatus, $addressId, $customerId, $paymentId, $cardId)
    {
        return DB::transaction(function () use (&$return, $request, $paymentStatus, $addressId, $customerId, $paymentId, $cardId)
        {
            $integrations = Integration::first();

            /*
            FP = Frete Pago
            FG = Frete Gratis
            RL = Retirar na Loja
            */

            $cartTotal = str_replace(',', '', Cart::total());

            $freight_type = Session::get('cart_options.freight.type');

            if(Session::get('cart_options.freight.type') == 'gratis'){
                $freight_type = 'FG';
            }
            if(Session::get('cart_options.freight.type') == 'inStore'){
                $freight_type = 'RL';
            }
            if(Session::get('cart_options.freight.type') == 'fixedFreight'){
                $freight_type = 'FF';
            }

            $order = new Order();
            $order->customer_id = $customerId;
            $order->address_id = $addressId;
            $order->card_id = $cardId;
            $order->freight_type = $freight_type;
            $order->order_integration_id = $request->reference;
            $order->payment_method = $request->paymentMethodType;
            $order->amount = $cartTotal + Session::get('cart_options.freight.amount');
            $order->coupon = Session::has('cart_options.coupon') ? Session::get('cart_options.coupon') : null;
            $order->payment_integration_id = $request->reference;
            $order->link_billet = isset($request->paymentLink)?$request->paymentLink:null;

            if($cartTotal >= $integrations->min_price_freight_free && $integrations->min_price_freight_free <> '' && Session::get('cart_options.freight.type')=='gratis'){
                $order->freight = 0.00;
            }else{
                $order->freight = Session::get('cart_options.freight.amount');
            }

            $order->autorization = $paymentStatus;

            if ($order->save()) {
                foreach (Cart::content() as $item) {

                    $order_item = new OrderItem();

                    $order_item->product_id = $item->id;
                    $order_item->order_id = $order->id;
                    $order_item->quantity = $item->qty;
                    $order_item->amount = $item->price;
                    $order_item->note = $item->options->obs ?: '';
                    $order_item->attachment_image = $item->options->pathImage ?: '';
                    $order_item->color = $item->options->color ?: '';
                    $order_item->size = $item->options->size ?: '';

                    $order_item->save();

                }

                $customer = Customer::find($customerId);

                SendEmailController::PaymentOrderNotification($order->id);
                // $customer->sendOrderReceipt();

                $notification = new NotificationPush();
                $notification->title = "Novo Pedido";
                $notification->menssage = "Pedido Nº <b>{$order->payment_integration_id}</b>";
                $notification->type = 10;
                $notification->save();

                $response['status'] = 'success';
                return $response;

            }else{
                $response['status'] = 'error';
                $response['mensage'] = 'Erro ao salvar ordem de Serviço';
                return $response;
            }

        });
    }

    public function checkout(Request $request)
    {

        $integrations = Integration::first();

        foreach (Cart::content() as $item) {
            $verifyStock = Stock::find($item->options->stock_id);

            if($item->qty > $verifyStock->quantity){
                $response['status'] = 'stockError';
                $response['rowId'] = $item->rowId;
                if($verifyStock->quantity == 0){
                    $response['mensagem'] = "Infelizmente o produto {$item->name} | Tamanho {$item->options->size} | Cor/Estampa {$item->options->nameColor}, não tem em nossos estoques.";
                }else{
                    $response['mensagem'] = "O produto ({$item->name} | Tamanho {$item->options->size} | Cor/Estampa {$item->options->nameColor}) só tem a quantidade de {$verifyStock->quantity} unidades em nossos estoques.";
                }

                return Response::json($response);
            }
        }

        if(!Session::has('cart_options.delivery.id')){
            $rponse = [
                'status' => 'error',
                'type' => 'Endereco',
                'mensagem' => 'Selecione o endereço cadastrado no início da página ou adicione um novo para calcular o frete.'
            ];
            return Response::json($rponse);
        }


        if(!Session::has('cart_options.freight')){
            $rponse = [
                'status' => 'error',
                'type' => 'Frete',
                'mensagem' => 'Selecione uma opção de frete acima antes de finalizar a compra'
            ];
            return Response::json($rponse);
        }


        if($request->payment_method == 'cardCredit'){
            if(!isset($request->flag_card)){
                $rponse = [
                    'status' => 'error',
                    'mensagem' => 'Favor selecionar a bandeira do cartão.'
                ];
                return Response::json($rponse);
            }
        }

        if($request->payment_method == 'cardCredit'){
            if($request->parcel == '0'){
                $rponse = [
                    'status' => 'error',
                    'mensagem' => 'Favor selecionar a quantidade de parcelas.'
                ];
                return Response::json($rponse);
            }
        }
        if(Auth::guard('customer')->check()){

            switch ($request->paymentInstitution) {
                case 'cielo':
                    $MerchantId = "a2d2e260-3799-4f13-9e51-3faf1cb6b1bf";
                    $MerchantKey = "DZEEXXURDPYMCOQUERXCSOFXECVXPQWYMEJVLEFT";

                    switch ($request->payment_method) {
                        case 'cardCredit':
                            $paymentCard = CieloPaymentController::paymentCard($request, $MerchantId, $MerchantKey);

                            if($paymentCard['status'] == 'error'){
                                return $paymentCard['error'];
                            }

                            if(isset($paymentCard['sale'])){
                                $url = $paymentCard['sale']['links'][0]->Href;
                                $paymentCard = CieloPaymentController::getSaleOrder($url, $MerchantId, $MerchantKey);
                            }

                            $returnCardCredit = (object) $paymentCard;

                            // Salva os Dados do cartao de pagamento para detalhamento do pedido
                            if($returnCardCredit->Payment->CreditCard){
                                $cards = new Cards();
                                $cards->number = $returnCardCredit->Payment->CreditCard->CardNumber;
                                $cards->holder_name = $returnCardCredit->Payment->CreditCard->Holder;
                                $cards->expiration_date = $returnCardCredit->Payment->CreditCard->ExpirationDate;
                                $cards->brand = $returnCardCredit->Payment->CreditCard->Brand;
                                $cards->parcel = $returnCardCredit->Payment->Installments;
                                if($cards->save()){
                                    $cardId = $cards->id;
                                }
                            }
                        break;
                        case 'billet':
                            $paymentBillet = CieloPaymentController::paymentBillet($request);
                        break;
                    }
                break;
                case 'pagseguro':

                    $items = [];
                    foreach(Cart::content() as $cartItem){
                        $item = [
                            'itemId' => $cartItem->id,
                            'itemDescription' => $cartItem->name,
                            'itemAmount' => $cartItem->price,
                            'itemQuantity' => $cartItem->qty,
                        ];
                        array_push($items, $item);
                    }
                    $freightFree = false;

                    $cartTotal = str_replace(',', '', Cart::total());

                    if($cartTotal >= $integrations->min_price_freight_free && $integrations->min_price_freight_free <> '' && Session::get('cart_options.freight.type')=='gratis'){
                        $freightFree = true;
                        if(Session::has('cart_options.freight')){
                            Session::put('cart_options.freight.amount', 0.01);
                        }else{
                            Session::put('cart_options.freight.amount', 0.01);
                            Session::put('cart_options.freight.type', 'Grátis');
                            Session::put('cart_options.freight.deadline', '0');
                        }
                    }

                    $addresses = Address::where('id', Session::get('cart_options.delivery.id'))->first();
                    $customer = Customer::where('id', Auth::guard('customer')->user()->id)->first();
                    $discount = Cart::discount();
                    $freight = Session::get('cart_options.freight');

                    switch($request->payment_method){
                        case 'cardCredit':
                            $ResponsePayment = PagSeguroPaymentController::paymentCardCredit($request, $items, $customer, $addresses, $freight, $discount, $freightFree);
                        break;
                        case 'billet':
                            $ResponsePayment = PagSeguroPaymentController::paymentBillet($request, $items, $customer, $addresses, $freight, $discount, $freightFree);
                        break;
                    }
                    $payment_integration_id = isset($ResponsePayment->reference)?$ResponsePayment->reference:'';
                break;
            }

            // dd($ResponsePayment);

            // $returnPayment = PagSeguroPaymentController::getSaleOrder($ResponsePayment->code);
            // dd($returnPayment);

            if($payment_integration_id == ''){
                $response['status'] = 'error';
                $response['mensagem'] = 'Erro ao processar pagamento, tente novamente mais tarde. Código erro: '.$ResponsePayment->getCode().' / '.$ResponsePayment->getMessage();
                return Response::json($response);
            }

            $rponse = [
                'status' => 'success',
                'installmentCount' => $ResponsePayment->installmentCount,
                'codigoTrasacao' => $ResponsePayment->code,
                'payment_integration_id' => $payment_integration_id,
                'reference' => $ResponsePayment->reference,
                'paymentMethodType' => $ResponsePayment->paymentMethod->type,
                'paymentStatus' => $ResponsePayment->status,
                'paymentLink' => isset($ResponsePayment->paymentLink)?$ResponsePayment->paymentLink:null
            ];

            return Response::json($rponse);
        }

    }

    public function saveSaleOrderPayment(Request $request)
    {

        // dd(simplexml_load_string(PagSeguroPaymentController::getSaleOrder($request->payment_integration_id)));

        $paymentStatus = $request->paymentStatus;

        if($request->typePayment == 'cardCredit'){
            $returnPayment = PagSeguroPaymentController::getSaleOrder($request->codigoTransacao);
            // dd($returnPayment);

            if(!isset($returnPayment->status)){
                $response = [
                    'status' => 'error',
                    'message' => "Infelizmente não conseguimos finalizar seu pagamento, verifique se todas as informações do cartão estão corretas. Se preferir poderá escolher outra forma de pagamento."
                ];
                return Response::json($response);
            }

            if($returnPayment->status == 7 && $returnPayment->cancellationSource == 'EXTERNAL'){
                $response = [
                    'status' => 'error',
                    'message' => "Pagamento não autorizado pela instituição financeira do seu cartão. Se preferir poderá escolher outra forma de pagamento."
                ];
                return Response::json($response);
            }

            if($returnPayment->status == 7 && $returnPayment->cancellationSource == 'INTERNAL'){
                $response = [
                    'status' => 'error',
                    'message' => "Pagamento não autorizado pelo PagSeguro. Se preferir poderá escolher outra forma de pagamento."
                ];
                return Response::json($response);
            }

            switch ($returnPayment->status) {
                case 1:
                    $response = [
                        'status' => 'success'
                    ];
                    $paymentStatus = $returnPayment->status;
                break;
                case 3:
                    $response = [
                        'status' => 'success'
                    ];
                    $paymentStatus = $returnPayment->status;
                break;
                case 4:
                    $response = [
                        'status' => 'success'
                    ];
                    $paymentStatus = $returnPayment->status;
                break;
                default:
                    $message = "Infelizmente não conseguimos finalizar seu pagamento, verifique se todas as informações do cartão estão corretas. Se preferir poderá escolher outra forma de pagamento.";
                    $response = [
                        'status' => 'error',
                        'message' => $message
                    ];
                    return Response::json($response);
                break;
            }
        }else{
            $response = [
                'status' => 'success'
            ];
        }

        if($response['status'] === 'success'){

            // Salva os Dados do cartao de pagamento para detalhamento do pedido
            if($request->payment_method == 'cardCredit'){
                $cards = new Cards();
                $cards->number = $request->card_number;
                $cards->holder_name = $request->cardholder_name;
                $cards->expiration_date = $request->expiration_date;
                $cards->brand = $request->flag_card;
                $cards->parcel = $request->installmentCount;
                if($cards->save()){
                    $cardId = $cards->id;
                }else{
                    $response['status'] = 'error';
                    $response['mensagem'] = 'Erro ao Salvar dados de pagamento';
                    return Response::json($response);
                }
            }else{
                $cardId = 0;
            }

            $saveOrder = CheckoutController::saveOrder($request, $paymentStatus, Session::get('cart_options.delivery.id'), Auth::guard('customer')->user()->id, $request->payment_integration_id, $cardId);

            if($saveOrder['status'] == 'success'){
                foreach (Cart::content() as $item) {
                    $verifyStock = Stock::find($item->options->stock_id);
                    $stockActual = $verifyStock->quantity - $item->qty;
                    $verifyStock->quantity = $stockActual;
                    $verifyStock->save();
                }

                Session::pull('cart_options', 'default');

                return Response::json($saveOrder);
            }else{
                $saveOrder['status'] = 'error';
                return Response::json($saveOrder);
            }
        }
    }

    public function confirmiedOrder()
    {

        Session::forget('cart');
        Session::forget('productOptions');

        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('subcategory')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();
        $order = Order::with('orderItems')->where('customer_id', Auth::guard('customer')->user()->id)->orderBy('id', 'desc')->first();

        return view('site.pages.finishedPayment',[
            'contacts' => Contact::first(),
            'order' => $order,
            'productsMenu' => $productsMenu
        ]);
    }
}
