<?php

namespace App\Http\Controllers;

use App\Integration;
use Illuminate\Http\Request;
use FlyingLuscas\Correios\Client;
use EscapeWork\Frete\Correios\Data;
use EscapeWork\Frete\FreteException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use EscapeWork\Frete\Correios\PrecoPrazo;
use Gloudemans\Shoppingcart\Facades\Cart;

class CorreioController extends Controller
{
    public function calc(Request $request){

        $peso = Cart::weight();

        $sedex = new PrecoPrazo();
        $sedex->setCodigoServico(Data::SEDEX)
            ->setCepOrigem('08090284')
            ->setCepDestino($request->zip_code)
            ->setComprimento(30)
            ->setAltura(30)
            ->setLargura(30)
            ->setDiametro(30)
            ->setPeso($peso);

        $pac = new PrecoPrazo();
        $pac->setCodigoServico(Data::PAC)
            ->setCepOrigem('08090284')
            ->setCepDestino($request->zip_code)
            ->setComprimento(30)
            ->setAltura(30)
            ->setLargura(30)
            ->setDiametro(30)
            ->setPeso($peso);

        try {
            $deploySedex = $sedex->calculate();
            $deployPac = $pac->calculate();
            $integrations = Integration::first();
            $cartTotal = str_replace(',', '', Cart::total());

            $html =
            '
                <div id="inputOpcaoFrete" class="viewOpcoesFrete">
                    <div class="form-group">
                        <label for="pac">PAC - R$ '.$deployPac['cServico']['Valor'].' <i>('.$deployPac['cServico']['PrazoEntrega'].' dias)</i></label>
                    </div>
                    <div class="form-group">
                        <label for="sedex">SEDEX - R$ '.$deploySedex['cServico']['Valor'].' <i>('.$deploySedex['cServico']['PrazoEntrega'].' dias)</i></label>
                    </div>
                    <div class="form-group">
                        <label for="sedex">Retirar na loja GRÁTIS <i>(1 dia)</i></label>
                    </div>
                </div>
            ';

            if($cartTotal >= $integrations->min_price_freight_free && $integrations->min_price_freight_free <> ''){
                $html =
                    '
                    <div id="inputOpcaoFrete" class="viewOpcoesFrete">
                        <div class="form-group">
                            <label for="gratis">Grátis <i>('.$deployPac['cServico']['PrazoEntrega'].' dias)</i></label>
                        </div>
                        <div class="form-group">
                            <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
                        </div>
                    </div>
                ';
            }

            $response['status'] = 'success';
            $response['html'] = $html;

            return Response::json($response);
        }
        catch (FreteException $e) {
            $response['status'] = 'error';
            $response['mensage'] =  $e->getMessage();
            $response['codigo'] =   $e->getCode();

            return Response::json($response);
        }
    }
}
