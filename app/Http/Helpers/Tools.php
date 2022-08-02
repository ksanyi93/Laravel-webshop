<?php

use App\Models\Product;
use Illuminate\Support\Facades\Session;

function prices($szam){
    return number_format($szam, 0, '', ' ').' Ft';
}
//számok formázása

function get_product_by_id($id){
    return Product::find($id);
}
//kiolvassa a termék id alapján

function sub_total($ar, $darab){
    //mennyiség * egységár
    
    return $ar*$darab;
}


function getProductsTotal(){

    $total = 0;

    foreach(Session::get('cart') as $product_id =>$qtty){

        $product = Product::find($product_id);

        $product_price = $product->price;

        $st = sub_total($product_price, $qtty);

        $total += $st;
    }

    return $total;
}

function total($fizetesimod, $szallitasimod){

    return getProductsTotal()+$fizetesimod+$szallitasimod;
}