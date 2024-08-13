<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\Stock;
use App\Coupon;
use App\Region;
use App\Product;
use App\Integration;
use App\ProductModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use EscapeWork\Frete\Correios\Data;
use EscapeWork\Frete\FreteException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use EscapeWork\Frete\Correios\PrecoPrazo;
use Gloudemans\Shoppingcart\Facades\Cart;
use phpDocumentor\Reflection\Types\Boolean;

class CartController extends Controller
{

    public function add(Request $request, Product $product)
    {

        $cartCount = false;
        if(Cart::content()->count()){
            $cartCount = true;
        }

        Cart::setGlobalTax(0);

        $product->promotinal_value = str_replace(',','.',$product->promotinal_value);
        $product->amount = str_replace(',','.',$product->amount);

        $valor = $product->promotion == 1? (float) $product->promotinal_value: (float) $product->amount;

        $stock = Stock::join('product_sizes', 'product_sizes.id', 'stocks.productSize_id')
                ->join('product_colors', 'product_colors.id', 'stocks.productColor_id')
                ->select('product_sizes.title', 'product_colors.name', 'product_colors.color', 'product_colors.path_image', 'stocks.*')
                ->where('stocks.id', $request->stock_id)->first();

        $productModel = ProductModel::where('id', $request->product_model)->first();

        // dd($stock);

        $valor = $stock->promotion_value?:$stock->amount;

        if(Session::has('productOptions')){
            $sessionOptions = Session::get('productOptions');

            $arrOptions = array();
            $valueTotal=0;
            foreach($sessionOptions as $value){
                $valueTotal = ($valueTotal+$value[0]['amount']);
                array_push($arrOptions, $value[0]);
            }

            $valor = ($valueTotal+$valor);
        }

        // dd($valueRefresh);

        $cartItem = Cart::add([
             'id'=>$product->id
            ,'name'=>$product->title
            ,'qty'=>$request->quantity_input
            ,'price'=> $valor
            ,'weight'=>$product->weigth
            ,'options' => [
                'color'=>$stock->color,
                'nameColor'=>$stock->name,
                'pathImage'=>$stock->path_image,
                'size'=>$stock->title,
                'stock_id'=>$stock->id,
            ]
        ]);

        //ASSOCIA O ID DO PRODUTO COM O ROWID
        Cart::associate($cartItem->rowId,'App\Product');

        if($cartCount){
            if(Session::has('cart_options.coupon')){
                $request->cupom = Session::get('cart_options.coupon');

                Cart::setGlobalDiscount(0);
                $cupom = Coupon::all()
                    ->where('coupon','=',$request->cupom)
                    ->where('active','=','1')->first();

                $totalCart = str_replace(',', '', Cart::total());;

                if($cupom->percentage == 0){
                    $cupom->amount =  number_format($cupom->amount * 100 / $totalCart, 2, '.', '.');
                }
                Cart::setGlobalDiscount($cupom->amount);
            }
        }

        $response['response'] = 'success';
        $response['qtdCart'] = Cart::content()->count();

        return Response::json($response);
    }

    public function delete($id){

        // $removed = Storage::delete('admin/uploads/fotos/'.Cart::remove($id));

        Cart::remove($id);

        Session::flash('success', 'Item removido!');
        return redirect()->back();

    }

    public function discount(Request $request)
    {

        $cupom = Coupon::all()
            ->where('coupon','=',$request->cupom)
            ->where('active','=','1')->first();

        $totalCart = str_replace(',', '', Cart::total());

        if($cupom <> null) {

            if($cupom->percentage == 0){
                $cupom->amount =  number_format($cupom->amount * 100 / $totalCart, 2, '.', '.');
            }
            // dd($cupom->amount);

            if($cupom->use_limit !== null){

                if($cupom->use_limit < 1){
                    Session::flash('error', 'Este cupom expirou, tente novamente com outro cupom!');
                    return redirect()->back();
                }
            }

            if ($cupom->first_order_only) {

                if (!Auth::guard('customer')->check()) {
                    Session::flash('error', 'Este cupom é valido apenas para primeira compra, faça login para validar.');
                    return redirect()->back();
                }

                $orders = Order::where('status', '<>', 0)->where('status', '<>', 6)
                    ->where('customer_id', '=', Auth::guard('customer')->user()->id)
                    ->exists();

                if($orders) {
                    Session::flash('error', 'Este cupom é valido apenas para primeira compra');
                    return redirect()->back();
                } else {
                    $discount = $cupom->amount;
                }

            } else {

                if(Auth::guard('customer')->check()){

                    $orders = Order::where('status', '<>', 0)
                            ->where('customer_id', '=', Auth::guard('customer')->user()->id)
                            ->where('coupon', '=', $request->cupom)
                            ->exists();

                    if ($orders) {
                        Session::flash('error', 'Você já usou este cupom');
                        return redirect()->back();
                    }else{
                        $discount = $cupom->amount;
                    }

                }else{
                    $discount = $cupom->amount;
                }

            }

            Cart::setGlobalDiscount($discount);

            Session::put('cart_options.coupon', $request->cupom);

            Session::flash('success', 'Desconto adicionado!');
            return redirect()->back();

        }else{
            Session::flash('error', 'Cupom invalido');
            return redirect()->back();
        }

    }

    public function removeDiscount()
    {

        Cart::setGlobalDiscount(0);
        Session::put('cart_options.coupon', null);

        foreach (Cart::content() as $row) {
            Cart::update($row->rowId, [['options.cupom' => null]]);
        }

        Session::flash('success', 'Cupom removido!');
        return redirect()->back();

    }

    public function clean(){

        Cart::destroy();

        Session::forget('cart_options');

        Session::flash('success', 'Carrinho vazio!');
        return redirect()->back();
    }

    public function changeQty(Request $request){

        Cart::update($request->cart_item, $request->quantity_input);

        if(Session::get('cart_options.coupon')){
            $request->cupom = Session::get('cart_options.coupon');

            Cart::setGlobalDiscount(0);
            $cupom = Coupon::all()
                ->where('coupon','=',$request->cupom)
                ->where('active','=','1')->first();

            $totalCart = str_replace(',', '', Cart::total());

            if($cupom->percentage == 0){
                $cupom->amount =  number_format($cupom->amount * 100 / $totalCart, 2, '.', '.');
            }

            Cart::setGlobalDiscount($cupom->amount);
        }

        $totalCart = str_replace(',','',Cart::total());

        if(Session::has('cart_options.freight')){
            $totalCart = $totalCart + Session::get('cart_options.freight.amount');
        }

        $response = [
            'status' => 'success'
           ,'subtotal'=>number_format(str_replace(',','',Cart::priceTotal()),2,',','.')
           ,'desconto'=>number_format(str_replace(',','',Cart::discount()),2,',','.')
           ,'total'=> number_format($totalCart,2,',','.')
        ];

        return Response::json($response);

    }

    // $carrinho = Cart::content();
    // $integrations = Integration::first();
    // $cartTotal = str_replace(',', '', Cart::total());

    // $freteGratis = '';
    // $html = '';

    // $address =  Session::get('cart_options.delivery') ? (object) Session::get('cart_options.delivery') : null;
    // // dd($cartTotal);
    // if($address){
    //     Session::forget('cart_options.freight');
    //     Session::save();

    //     $peso = Cart::weight();
    //     $sedex = new PrecoPrazo();
    //     $sedex->setCodigoServico(Data::SEDEX)
    //         ->setCepOrigem('08090284')
    //         ->setCepDestino($address->zip_code)
    //         ->setComprimento(30)
    //         ->setAltura(30)
    //         ->setLargura(30)
    //         ->setDiametro(30)
    //         ->setPeso($peso);

    //     $pac = new PrecoPrazo();
    //     $pac->setCodigoServico(Data::PAC)
    //         ->setCepOrigem('08090284')
    //         ->setCepDestino($address->zip_code)
    //         ->setComprimento(30)
    //         ->setAltura(30)
    //         ->setLargura(30)
    //         ->setDiametro(30)
    //         ->setPeso($peso);

    //     try {
    //         $deploySedex = $sedex->calculate();
    //         $deployPac = $pac->calculate();

    //         $html =
    //         '
    //             <div id="inputOpcaoFrete" class="freteCarregadoAncora">
    //                 <div class="form-group">
    //                     <input type="radio" name="freight" id="pac" data-type="PAC" data-prazo="'.$deployPac['cServico']['PrazoEntrega'].'" value="'.$deployPac['cServico']['Valor'].'">
    //                     <label for="pac">PAC - R$ '.$deployPac['cServico']['Valor'].' <i>'.$deployPac['cServico']['PrazoEntrega'].' dias</i></label>
    //                 </div>
    //                 <div class="form-group">
    //                     <input type="radio" name="freight" id="sedex" data-type="SEDEX" data-prazo="'.$deploySedex['cServico']['PrazoEntrega'].'" value="'.$deploySedex['cServico']['Valor'].'">
    //                     <label for="sedex">SEDEX - R$ '.$deploySedex['cServico']['Valor'].' <i>'.$deploySedex['cServico']['PrazoEntrega'].' dias</i></label>
    //                 </div>
    //                 <div class="form-group">
    //                     <input type="radio" name="freight" id="retira_loja" data-type="inStore" data-prazo="" value="0,00">
    //                     <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
    //                 </div>
    //             </div>
    //         ';

    //         if($cartTotal >= $integrations->min_price_freight_free && $integrations->min_price_freight_free <> ''){
    //             $html =
    //                 '
    //                 <div id="inputOpcaoFrete" class="freteCarregadoAncora">
    //                     <div class="form-group">
    //                         <input type="radio" name="freight" id="gratis" data-type="gratis" data-prazo="'.$deployPac['cServico']['PrazoEntrega'].'" value="0,00">
    //                         <label for="gratis">Grátis <i>('.$deployPac['cServico']['PrazoEntrega'].' dias)</i></label>
    //                     </div>
    //                     <div class="form-group">
    //                         <input type="radio" name="freight" id="retira_loja" data-type="inStore" data-prazo="" value="0,00">
    //                         <label for="retira_loja">Retirar na Loja GRÁTIS <i>(1 dia)</i></label>
    //                     </div>
    //                 </div>
    //             ';
    //         }
    //     }
    //     catch (FreteException $e) {
    //         $response['mensage'] =  $e->getMessage();
    //         $response['codigo'] =   $e->getCode();
    //     }
    // }


    // if($cartTotal >= $integrations->min_price_freight_free && $integrations->min_price_freight_free <> ''){
    //     $freteGratis = 'gratis';
    // }else{
    //     if(Session::has('cart_options.freight.amount')){
    //         $freteGratis = 'calculatedFreight';
    //     }
    // }

    // $freteValor = Session::get('cart_options.freight.type').' - R$ '.number_format(Session::get('cart_options.freight.amount'),2,',','.').' ('.Session::get('cart_options.freight.deadline').' dias)';

    // if(Session::get('cart_options.freight.type') == 'inStore'){
    //     $freteGratis = 'inStore';
    // }
    // if(!Session::has('cart_options.freight') && !Session::has('cart_options.delivery')){
    //     $freteGratis = '';
    // }
    // if(Session::get('cart_options.freight.type')  == 'gratis'){
    //     $freteGratis = '';
    // }

    // $response = [
    //     'status' => 'success'
    //    ,'subtotal'=>number_format(str_replace(',','',Cart::priceTotal()),2,',','.')
    //    ,'desconto'=>number_format(str_replace(',','',Cart::discount()),2,',','.')
    //    ,'total'=>number_format(str_replace(',','',Cart::total()),2,',','.')
    //    ,'freteGratis'=>$freteGratis
    //    ,'fretePrazo'=> Session::get('cart_options.freight.deadline')
    //    ,'freteValor'=> $freteValor
    //    ,'frefreights' => $html
    // ];

    // return Response::json($response);

    public function delivery(Request $request)
    {

        $chars = ['-','.'];
        $request->cep = str_replace($chars,'',$request->cep);
        $url = "http://viacep.com.br/ws/{$request->cep}/json/unicode/";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $retornoCurl = curl_exec($curl) or die(curl_error($curl));
        curl_close($curl);

        $retornoCurl = json_decode($retornoCurl,true);

        if(isset($retornoCurl['erro'])){

            $response = [
                'status' => 'error'
                ,'msg' => 'Desculpe, Não conseguimos encontrar esse endereço, tente novamente mais tarde!'
            ];

            return $response;

        }


        $region = Region::all()
            ->where('region','=', $retornoCurl['bairro'])
            ->where('active','=','1')
            ->first();

        if(!$region){
            $response = [
                'status' => 'error'
               ,'msg' => 'Desculpe, ainda não fazemos entrega para este endereço!'
            ];

            return Response::json($response);

        }else{

            $region->amount = str_replace(',','.', $region->amount);

            Session::put('cart_options.delivery.amount',(float) $region->amount);
            Session::put('cart_options.delivery.cep',$request->cep);
            Session::put('cart_options.delivery.endereco',$retornoCurl['logradouro']);
            Session::put('cart_options.delivery.bairro',$retornoCurl['bairro']);
        }

        $cartTotal = str_replace(',', '', Cart::total());

        $response = [
            'status' => 'success'
            ,'subtotal'=>Cart::priceTotal()
            ,'desconto'=>Cart::discount()
            ,'total'=>$cartTotal+number_format((float)$region->amount,2,'.','.')
            ,'delivery'=> number_format((float)$region->amount,2,'.','.')
            ,'logradouro'=>$retornoCurl['logradouro']
            ,'bairro'=>$retornoCurl['bairro']
        ];

        return Response::json($response);
    }

    public function changeAddress(Request $request)
    {

        $address  =  DB::table('adresses')
                    ->join('regions', 'region_id', '=', 'regions.id')
                    ->join('cities', 'city_id', '=', 'cities.id')
                    ->where('adresses.id','=',$request->address)
                    ->select('adresses.*', 'regions.*', 'cities.city')
                    ->first();

        if(!$address){

            $response = [
                'status'=>'error'
                ,'msg'=>'Endereço não encontrado'
            ];
            return Response::json($response);

        }else{

            Session::put('cart_options.delivery.amount',(float) $address->amount);
            Session::put('cart_options.delivery.cep',$address->zip_code);
            Session::put('cart_options.delivery.endereco',$address->public_place);
            Session::put('cart_options.delivery.reference',$address->reference);
            Session::put('cart_options.delivery.complement',$address->complement);
            Session::put('cart_options.delivery.bairro',$address->complement);
            $cartTotal = str_replace(',', '', Cart::total());

            $response = [
                'status'=>'success'
                ,'cep'=>$address->zip_code
                ,'logradouro'=>$address->public_place
                ,'complemento'=>$address->complement
                ,'numero'=>$address->number
                ,'bairro'=>$address->region
                ,'referencia'=>$address->reference
                ,'subtotal'=>Cart::priceTotal()
                ,'desconto'=>Cart::discount()
                ,'total'=>$cartTotal+number_format((float)$address->amount,2,'.','.')
                ,'delivery'=> number_format((float)$address->amount,2,'.','.')
            ];

            return Response::json($response);

        }
    }

    public function frete(Request $request)
    {
        Session::put('cart_options.freight.amount', str_replace(',', '.', $request->freight));
        Session::put('cart_options.freight.type', $request->type);
        Session::put('cart_options.freight.deadline', $request->deadline);

        if(Session::has('cart_options.freight.amount')){

            $amountFreight = Session::get('cart_options.freight.amount');
            $typeFreight = Session::get('cart_options.freight.type');
            $deadlineFreight = Session::get('cart_options.freight.deadline');

            $cartTotal = str_replace(',', '', Cart::total());
            $total = ($cartTotal+$amountFreight);

            // dd($cartTotal);
            if(Session::get('cart_options.freight.type') == 'gratis'){
                $total = ($cartTotal);
            }

            if(Session::get('cart_options.freight.type') == 'inStore'){
                $total = ($cartTotal);
            }

        }

        $freteReturn = $typeFreight.' - R$ '.number_format($amountFreight,2,',','.'). ' ('.$deadlineFreight.' dias)';

        if(Session::get('cart_options.freight.type') == 'gratis'){
            $freteReturn = "Grátis ({$deadlineFreight} dias)";
        }
        if(Session::get('cart_options.freight.type') == 'inStore'){
            $freteReturn = "Retirar na loja Grátis (1 dia)";
        }
        if(Session::get('cart_options.freight.type') == 'fixedFreight'){
            $freteReturn = "Frete Fixo R$ 15,00 (Motoboy)";
        }

        $response = [
            'status' => 'success',
            'frete' => $freteReturn,
            'total' => number_format($total,2,',','.'),
        ];

        return Response::json($response);
    }
}
