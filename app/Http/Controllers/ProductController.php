<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Request as UrlInput;

class ProductController extends Controller
{
    function products(){


        // $products = Product::where('name', 'like', '%'.UrlInput::get('search_input').'%')->paginate(3);

        $products = Product::where(  function($query){
            if( UrlInput::get('search_input') ){
                $query->where( 'name', 'like', '%'.UrlInput::get('search_input').'%');
            }}) ->paginate(3);

        return view('products', [
            'products'=>$products
        ]);
    }
}

/* $products = Product::where(  function($query){
    if( UrlInput::get('search_input') ){
        $query->where( 'name', 'like', '%'.UrlInput::get('search_input').'%'); 
    }
}) ->paginate(3); 



$query = ebben van az eddig összegyűjtött SQL lekérdezés(select from products where etc.)

if( UrlInput::get('search_input') ) => ha van beleírva valami

és a $query-hez adom hozzá a "where" metódust


function($query){
    if( UrlInput::get('search_input') ){
        $query->where( 'name', 'like', '%'.UrlInput::get('search_input').'%');  ======>>>> ez maga a feltét,enélkül csak egy lekérés lenne!!!
    }
} 
*/