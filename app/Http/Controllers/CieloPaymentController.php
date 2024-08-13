<?php

namespace App\Http\Controllers;

use App\Address;
use App\Customer;
use Cielo\API30\Merchant;

use Illuminate\Http\Request;

use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cielo\API30\Ecommerce\CreditCard;

use Cielo\API30\Ecommerce\Environment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cielo\API30\Ecommerce\Request\CieloRequestException;

class CieloPaymentController extends Controller
{
    // ============================================ Status transacional ======================================================
    //
    // CODIGO |    STATUS          | MEIO DE PAGAMENTO | DESCRIÇÃO
    //   0	     NotFinished                ALL	          Aguardando atualização de status
    //   1	     Authorized	                ALL	          Pagamento apto a ser capturado ou definido como pago
    //   2	     PaymentConfirmed	         ALL	      Pagamento confirmado e finalizado
    //   3	     Denied	                CC + CD + TF      Pagamento negado por Autorizador
    //   10	     Voided	                    ALL	          Pagamento cancelado
    //   11	     Refunded	              CC + CD	      Pagamento cancelado após 23:59 do dia de autorização
    //   12	     Pending	                ALL	          Aguardando Status de instituição financeira
    //   13	     Aborted	                ALL	          Pagamento cancelado por falha no processamento ou por ação do AF
    //   20	     Scheduled	                CC	          Recorrência agendada
    // ========================================== Fim Status transacional =====================================================

    public static function mensageReturn($returnCode){
        switch ($returnCode) {
            case 05:
                $rponse = ['status' => 'NotFinished','returnCode' => $returnCode, 'returnMessage' => "Não Autorizada"];
                return $rponse;
            break;
            case 57:
                $rponse = ['status' => 'NotFinished','returnCode' => $returnCode, 'returnMessage' => "Cartão Expirado"];
                return $rponse;
            break;
            case 78:
                $rponse = ['status' => 'NotFinished','returnCode' => $returnCode, 'returnMessage' => "Cartão Bloqueado"];
                return $rponse;
            break;
            case 99:
                $rponse = ['status' => 'NotFinished','returnCode' => $returnCode, 'returnMessage' => "Limite de tempo expirado"];
                return $rponse;
            break;
            case 77:
                $rponse = ['status' => 'NotFinished','returnCode' => $returnCode, 'returnMessage' => "Cartão Cancelado"];
                return $rponse;
            break;
            case 70:
                $rponse = ['status' => 'NotFinished','returnCode' => $returnCode, 'returnMessage' => "Problemas com o Cartão de Crédito"];
                return $rponse;
            break;
            default:
                $rponse = ['status' => 'NotFinished','returnCode' => $returnCode, 'returnMessage' => "Operação realizada com sucesso"];
                return $rponse;
            break;
        }
    }

    public static function getSaleOrder($url, $MerchantId, $MerchantKey)
    {
        $headers = [
            'Accept: application/json',
            'Accept-Encoding: gzip',
            'User-Agent: CieloEcommerce/3.0 PHP SDK',
            'MerchantId: ' . $MerchantId,
            'MerchantKey: ' . $MerchantKey,
            'RequestId: ' . uniqid(),
            'Content-Length: 0'
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response   = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if (curl_errno($curl)) {
            $message = sprintf('cURL error[%s]: %s', curl_errno($curl), curl_error($curl));
            return $message;
        }

        curl_close($curl);

        return json_decode($response);
    }

    public static function paymentCard($request, $MerchantId, $MerchantKey, $environment = 'sandbox', $serviceTaxAmount = 0)
    {

        $idOrder = date('dmYHis').rand(10, 99);

        $customerCurrent = Customer::where('id', Auth::guard('customer')->user()->id)->first();
        $address = Address::where('id', Session::get('cart_options.delivery.id'))->first();
        $totalCart = str_replace(',','',Cart::total())+str_replace(',','.',Session::get('cart_options.freight.amount'));
        $amount = number_format($totalCart,2,'','');

        // Configure o ambiente
        if($environment == 'sandbox'){
            $environment = $environment = Environment::sandbox();
        }else if($environment == 'production'){
            $environment = $environment = Environment::production();
        }

        // Configure seu merchant
        $merchant = new Merchant($MerchantId, $MerchantKey);

        // Crie uma instância de Sale informando o ID do pedido na loja
        $sale = new Sale($idOrder);

        // Crie uma instância de Customer informando o nome do cliente
        $customer = $sale->customer($customerCurrent->name)
            ->setEmail($customerCurrent->email)
            ->setIdentity($customerCurrent->cpf)
            ->setIdentityType('CPF')
            ->address()
                ->setZipCode($address->zip_code)
                ->setCountry('BRA')
                ->setState($address->state)
                ->setCity($address->city)
                ->setDistrict($address->region)
                ->setStreet($address->public_place)
                ->setNumber($address->number);

        // Crie uma instância de Payment informando o valor do pagamento
        $payment = $sale->payment($amount, $request->parcel);

        switch($request->flag_card){
            case 'VISA':
                $flagCard = CreditCard::VISA;
            break;
            case 'MASTERCARD':
                $flagCard = CreditCard::MASTERCARD;
            break;
            case 'AMEX':
                $flagCard = CreditCard::AMEX;
            break;
            case 'ELO':
                $flagCard = CreditCard::ELO;
            break;
            case 'DINERS':
                $flagCard = CreditCard::DINERS;
            break;
            case 'HIPERCARD':
                $flagCard = CreditCard::HIPERCARD;
            break;
        }

        // Crie uma instância de Credit Card utilizando os dados de teste
        // esses dados estão disponíveis no manual de integração
        $payment->setType(Payment::PAYMENTTYPE_CREDITCARD)
                ->creditCard("123", $flagCard)
                ->setExpirationDate($request->expiration_date)
                ->setCardNumber($request->card_number)
                ->setHolder($request->cardholder_name);

        // Crie o pagamento na Cielo
        try {
            // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
            $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

            // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
            // dados retornados pela Cielo
            $paymentId = $sale->getPayment()->getPaymentId();

            $statusReturn = CieloPaymentController::mensageReturn($sale->jsonSerialize()['payment']->jsonSerialize()['returnCode']);

            if($statusReturn['returnCode'] <> 4 && $statusReturn['returnCode'] <> 6 ){
                return $statusReturn;
            }

            // Com o ID do pagamento, podemos fazer sua captura, se ela não tiver sido capturada ainda
            $sale = (new CieloEcommerce($merchant, $environment))->captureSale($paymentId, $amount, $serviceTaxAmount);

            $rponse = [
                'status' => 'success',
                'returnMensage' => 'Pagamento autorizado com sucesso',
                "sale" => $sale->jsonSerialize()
            ];

            return $rponse;
            // E também podemos fazer seu cancelamento, se for o caso
            // $sale = (new CieloEcommerce($merchant, $environment))->cancelSale($paymentId, 15700);


        } catch (CieloRequestException $e) {
            // Em caso de erros de integração, podemos tratar o erro aqui.
            // os códigos de erro estão todos disponíveis no manual de integração.

            $rponse = [
                "status" => 'error',
                "error" => $e->getCieloError()
            ];

            return $rponse;
        }
        // ...
    }
    public static function paymentBillet($request)
    {
        //
    }
}
