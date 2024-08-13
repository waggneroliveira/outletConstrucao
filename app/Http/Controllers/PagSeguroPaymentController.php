<?php

namespace App\Http\Controllers;

use App\Integration;
use App\NotificationPush;
use App\Order;
use Dotenv\Dotenv;
use PagSeguro;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Response;

class PagSeguroPaymentController extends Controller
{
    public static function paymentBillet($request = null, $items = [], $customer, $address, $freight, $discount, $freightFree = false){
        $idOrder = date('dmYHis').rand(10, 99);
        switch($freight['type']){
            case 'PAC': $freightType = 1; break;
            case 'SEDEX': $freightType = 2; break;
            default: $freightType = 3; break;
        }
        try {
            $pagseguro = PagSeguro::setReference($idOrder)
                ->setSenderInfo([
                    'senderName' => $customer->name, //Deve conter nome e sobrenome
                    'senderPhone' => $customer->phone, //Código de área enviado junto com o telefone
                    'senderEmail' => $customer->email,
                    'senderHash' => $request->senderHash,
                    'senderCPF' => $customer->cpf //Ou CNPJ se for Pessoa Júridica
                ])
                ->setShippingAddress([ // OPCIONAL
                    'shippingAddressStreet' => $address->public_place,
                    'shippingAddressNumber' => $address->number,
                    'shippingAddressDistrict' => $address->region,
                    'shippingAddressPostalCode' => $address->zip_code,
                    'shippingAddressCity' => $address->city,
                    'shippingAddressState' => $address->state
                ])
                ->setShippingInfo([
                    'shippingType' => $freightType, //: 1 – PAC, 2 – SEDEX, 3 - Desconhecido
                    'shippingCost' => $freight['amount'],
                ])
                ->setExtraAmount(-$discount)
                ->setItems($items)
                ->send([
                    'paymentMethod' => 'boleto'
                ]);

            return $pagseguro;
        }
        catch(\Artistas\PagSeguro\PagSeguroException $e) {
            $e->getCode(); //codigo do erro
            $e->getMessage(); //mensagem do erro

            return $e;
        }

    }

    public static function paymentCardCredit($request = null, $items = [], $customer, $address, $freight, $discount, $freightFree = false){
        $idOrder = date('dmYHis').rand(10, 99);

        $installmentQuantity = (int) explode('/', $request->parcel)[0];
        $installmentValue = floatval(explode('/', $request->parcel)[1]);

        try {
            if($freightFree){
                $pagseguro = PagSeguro::setReference($idOrder)
                    ->setSenderInfo([
                        'senderName' => $customer->name,
                        'senderPhone' => $customer->phone,
                        'senderEmail' => $customer->email,
                        'senderHash' => $request->senderHash,
                        'senderCPF' => $customer->cpf
                    ])
                    ->setCreditCardHolder([
                        'creditCardHolderName' => $request->cardholder_name, //Deve conter nome e sobrenome
                        'creditCardHolderPhone' => $customer->phone, //Código de área enviado junto com o telefone
                        'creditCardHolderCPF' => $request->cpf, //Ou CNPJ se for Pessoa Júridica
                        'creditCardHolderBirthDate' => $request->birth_date,
                    ])
                    ->setShippingAddress([ // OPCIONAL
                        'shippingAddressStreet' => $address->public_place,
                        'shippingAddressNumber' => $address->number,
                        'shippingAddressDistrict' => $address->region,
                        'shippingAddressPostalCode' => $address->zip_code,
                        'shippingAddressCity' => $address->city,
                        'shippingAddressState' => $address->state
                    ])
                    ->setExtraAmount(-$discount)
                    ->setBillingAddress([
                        'billingAddressStreet' => $address->public_place,
                        'billingAddressNumber' => $address->number,
                        'billingAddressDistrict' => $address->region,
                        'billingAddressPostalCode' => $address->zip_code,
                        'billingAddressCity' => $address->city,
                        'billingAddressState' => $address->state
                    ])

                    ->setItems($items)
                    ->send([
                        'paymentMethod' => 'creditCard',
                        'creditCardToken' => $request->cardCredToken,
                        'noInterestInstallmentQuantity' => $request->maxParcel,
                        'installmentQuantity' => $installmentQuantity,
                        'installmentValue' => $installmentValue,
                    ]);
            }else{
                switch($freight['type']){
                    case 'PAC': $freightType = 1; break;
                    case 'SEDEX': $freightType = 2; break;
                    default: $freightType = 3; break;
                }

                $pagseguro = PagSeguro::setReference($idOrder)
                    ->setSenderInfo([
                        'senderName' => $customer->name,
                        'senderPhone' => $customer->phone,
                        'senderEmail' => $customer->email,
                        'senderHash' => $request->senderHash,
                        'senderCPF' => $customer->cpf
                    ])
                    ->setCreditCardHolder([
                        'creditCardHolderName' => $request->cardholder_name, //Deve conter nome e sobrenome
                        'creditCardHolderPhone' => $customer->phone, //Código de área enviado junto com o telefone
                        'creditCardHolderCPF' => $request->cpf, //Ou CNPJ se for Pessoa Júridica
                        'creditCardHolderBirthDate' => $request->birth_date,
                    ])
                    ->setShippingAddress([ // OPCIONAL
                        'shippingAddressStreet' => $address->public_place,
                        'shippingAddressNumber' => $address->number,
                        'shippingAddressDistrict' => $address->region,
                        'shippingAddressPostalCode' => $address->zip_code,
                        'shippingAddressCity' => $address->city,
                        'shippingAddressState' => $address->state
                    ])
                    ->setShippingInfo([
                        'shippingType' => $freightType, //: 1 – PAC, 2 – SEDEX, 3 - Desconhecido
                        'shippingCost' => $freight['amount'],
                    ])
                    ->setExtraAmount(-$discount)
                    ->setBillingAddress([
                        'billingAddressStreet' => $address->public_place,
                        'billingAddressNumber' => $address->number,
                        'billingAddressDistrict' => $address->region,
                        'billingAddressPostalCode' => $address->zip_code,
                        'billingAddressCity' => $address->city,
                        'billingAddressState' => $address->state
                    ])

                    ->setItems($items)
                    ->send([
                        'paymentMethod' => 'creditCard',
                        'creditCardToken' => $request->cardCredToken,
                        'noInterestInstallmentQuantity' => $request->maxParcel,
                        'installmentQuantity' => $installmentQuantity,
                        'installmentValue' => $installmentValue,
                    ]);
            }

            return $pagseguro;
        }
        catch(\Artistas\PagSeguro\PagSeguroException $e) {
            $e->getCode(); //codigo do erro
            $e->getMessage(); //mensagem do erro

            return $e;
        }

    }

    public static function getSaleOrder($reference)
    {

        $integration = Integration::first();

        // Env::get('PAGSEGURO_EMAIL');
        $email = env('PAGSEGURO_EMAIL', $integration->email_pagseguro);
        $token = env('PAGSEGURO_TOKEN', $integration->token_pagseguro);

        // $url = "https://ws.pagseguro.uol.com.br/v3/transactions/{$reference}?email={$email}&token={$token}";
        $url = "https://ws.pagseguro.uol.com.br/v3/transactions/{$reference}?email={$email}&token={$token}";



        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response   = curl_exec($curl);

        if (curl_errno($curl)) {
            $message = sprintf('cURL error[%s]: %s', curl_errno($curl), curl_error($curl));
            return $message;
        }

        curl_close($curl);

        return simplexml_load_string($response);
    }

    public function notification(Request $request)
    {
        $response = PagSeguro::notification($request->notificationCode, $request->notificationType);
        // $response = PagSeguro::notification("3B4E1D8787D287D265DCC4618F8BB341EDB1", "transaction");
        $order = Order::where('order_integration_id', $response->reference)->first();
        // $response->code.' | '.$response->reference.' | '.$response->status;

        switch($response->status){
            case 1:
                $menssage = "O pedido <b>{$response->reference}</b> está aguardando pagamento";
                $order->status = 0;
            break;
            case 2:
                $menssage = "O pedido <b>{$response->reference}</b> está em análise";
                $order->status = 0;
            break;
            case 3:
                $menssage = "O pagamento do pedido <b>{$response->reference}</b> foi autorizado";
                $order->status = 5;
            break;
            case 4:
                $menssage = "O pedido <b>{$response->reference}</b> está disponível";
                $order->status = 5;
            break;
            case 5:
                $menssage = "A disputa do pedido <b>{$response->reference}</b> está em andamento";
                $order->status = 0;
            break;
            case 6:
                $menssage = "O pagamento do pedido <b>{$response->reference}</b> foi estornado";
                $order->status = 6;
            break;
            case 7:
                $menssage = "O pedido <b>{$response->reference}</b> foi cancelado";
                $order->status = 6;
            break;
            case 8:
                $menssage = "O pagamento do pedido <b>{$response->reference}</b> foi debitado";
                $order->status = 5;
            break;
            case 9:
                $menssage = "O pedido <b>{$response->reference}</b> entrou em retenção temporária";
                $order->status = 0;
            break;
        }

        $order->autorization = $response->status;

        if($order->save()){
            $notification = new NotificationPush();
            $notification->title = "Status de Pagamento";
            $notification->menssage = $menssage;
            $notification->type = $response->status;
            $notification->save();

            SendEmailController::NotificationPagseguro($order->id);
        }
    }
}
