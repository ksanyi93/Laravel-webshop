@extends('layouts/main')

@section('title', 'Cart')
    

@section('content')

<div class="row g-3">

      <table class="shop_cart">

        <tr>
          <th></th>
          <th>
            Termék
          </th>
          <th>
            Egységár
          </th>
          <th>
            Mennyiség
          </th>
          <th>
            Összeg
          </th>
        </tr>


       @foreach (Session::get('cart') as $termek_id=>$mennyiseg)
           
       <?php $product = get_product_by_id($termek_id); ?>
       
        


       <form action="/update/shoppingcart/qtty" method="POST">
        <input type="hidden" name="id" value="{{$product->id}}">
         <tr>
          <td class="product_image">
            <img style="width: 100%" src="/images/{{ $product->image }}" alt=""> 
           </td>
           <td class="product_name">
            {{ $product->name }}
            <button class="btn btn-link text-danger" formaction="/delete/shoppingcart"><i class="fa fa-trash" aria-hidden="true"></i></button>
           </td>
           <td>
            {!!$product->formatted_price!!}
           </td>
           <td class="product_db">
           <input type="number" name="qtty" value="{{$mennyiseg}}" min="1" max="5"> 
           <button class="btn btn-link text-primary"><i class="fa-solid fa-rotate"></i></button>
           </td>
           <td>
             {!!prices(sub_total($product->price, $mennyiseg))!!}
           </td>
         </tr>
         @csrf
        </form>
       
       @endforeach

       <tr>
         <td colspan="5">
           <h2> {!!prices(getProductsTotal())!!}</h2>
         </td>
       </tr>
      </table>

      

      
    


      </div>
      <div class="row mt-3">
        <a href="/check_user_status" class="btn btn-primary col-md-2">Megrendelés</a> 
        <a href="/products" class="btn btn-success col-md-2 offset-md-8">Vásárlás folytatása</a>
      </div>

      {{-- <button class="btn btn-primary col-md">Megrendelés</button>
      <button class="btn btn-success ">Vásárlás folytatása</button> --}}
@endsection

@section('style')
<style>
  .card-img-top{
    height: 200px;
    object-fit: cover;
  }
  .product_image{
    width: 100px;
  }

  table{
    width: 100%;
  }
  table,td, th{
    border: 1px solid black;
  }
  .shop_cart{
    margin-top: 5%;
  }
  tr{
    text-align: center;
  }
</style>
@endsection