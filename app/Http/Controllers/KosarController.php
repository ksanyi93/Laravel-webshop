<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\ShippingMethod;

class KosarController extends Controller
{

    function put_into_cart(Request $request){

       //Session::forget('cart');

       if($request->qtty < 1 || $request->qtty > 5)
        //ha a mennyiségem kisebb,mint 1 vagy nagyobb,mint 5,akkor exit!
        return exit;

    

        Session::put('cart.'.$request->id, $request->qtty);
        //beleteszem a termék ID-t+mennyiségét a kosárba és visszaküldöm a "cart" oldalra

        return redirect('cart');
    }



    function show_cart(){
        return view('cart');
    }

    function show_payment_info(){
        return view('payment_info');
    }

    function show_shipping_info(){
        return view('shipping_info');
    }



    function delete_item(Request $request){
        Session::forget('cart.'.$request->id);

        return redirect()->back();
    }
    //törlöm a terméket a kuka gombbal ID alapján,majd vissza erre az oldalra




    

    function update_shoppingcart_qtty(Request $request){

        if($request->qtty < 1 || $request->qtty > 5)

        return redirect()->route('home');

        Session::put('cart.'.$request->id, $request->qtty);


        return redirect()->back();
    }
    //fölülírom az új mennyiségi adattal,az adott terméket


    function checkout(Request $request){
        $request->validate([
            'billing_name'=>"bail|min:4|max:30|required",
            'billing_tax'=>'min:11|max:13|nullable',
            'billing_zipcode'=>'min:4|max:10|required',
            'billing_city'=>'min:2|max:40|required',
            'billing_street'=>'min:2|max:50|required',
            'billing_house_number'=>'min:1|max:20|nullable',

            'shipping_name'=>"min:4|max:30|required",
            'shipping_zipcode'=>'min:4|max:10|required',
            'shipping_city'=>'min:2|max:40|required',
            'shipping_street'=>'min:2|max:50|required',
            'shipping_house_number'=>'min:1|max:20|nullable',
            'datas_check'=>'required'
        ], [
            'billing_name.min'=>'hibás kitöltési név'
        ]);
        //amikor nincs hiba,akkor ez a kód fog lefutni
        User::find(Auth::user()->id)->update([
            'name'=>$request->billing_name,
            'billing_tax'=>$request->billing_tax,
            'billing_zipcode'=>$request->billing_zipcode,
            'billing_city'=>$request->billing_city,
            'billing_street'=>$request->billing_street,
            'billing_house_number'=>$request->billing_house_number,

            'shipping_name'=>$request->shipping_name,
            'shipping_zipcode'=>$request->shipping_zipcode,
            'shipping_city'=>$request->shipping_city,
            'shipping_street'=>$request->shipping_street,
            'shipping_house_number'=>$request->shipping_house_number,

        
        ]);

        Session::put('payment_method', $request->payment_method);
        Session::put('shipping_method', $request->shipping_method);

        return redirect('order_summary');
    }

    function ordered(Request $request){
        $payment_json = json_encode(PaymentMethod::find(Session::get('payment_method')));
        $shipping_json = json_encode(ShippingMethod::find(Session::get('shipping_method')));

        $ordered_products = [];

        foreach (Session::get('cart') as $termek_id=>$mennyiseg){
            $product = get_product_by_id($termek_id);
            $product->quantity = $mennyiseg;
            $product->subtotal = $mennyiseg*$product->price;
            $product->formatted_subtotal = prices($mennyiseg*$product->price);

            $ordered_products[] = $product;
        }


        $products_json = json_encode($ordered_products);

        
        $order = Order::create([
            'user_id'=>Auth::user()->id,
            'products'=>$products_json,
            'shipping'=>$shipping_json,
            'payment'=>$payment_json,
            'total'=>total(PaymentMethod::find(Session::get('payment_method'))->price, ShippingMethod::find(Session::get('shipping_method'))->price)
        ]);


        Session::forget('cart');
        Session::forget('payment_method');
        Session::forget('shipping_method');

        return redirect('order_completed')->with('message', 'Köszönjük a vásárlást! A fizetendő végösszeg '.prices($order->total).' lesz.');
    }

    


}

