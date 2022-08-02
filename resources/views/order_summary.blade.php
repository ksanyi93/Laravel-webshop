@extends('layouts/main')

@section('title', 'Order summary')
    

@section('content')
        <h3 class="mb-3 mt-3">Számlázási adatok</h3>

        <form action="/order" method="post">

          <div class="col-6 mb-3">
            <p>{{Auth::user()->name}}</p>
            <p>{{Auth::user()->billing_zipcode}}</p>
            <p>{{Auth::user()->billing_city}}</p>
            <p>{{Auth::user()->billing_street}} {{Auth::user()->billing_house_number}}</p>
            <p>{{Auth::user()->billing_tax}}</p>
          </div>
          
          

        <h3 class="mb-3 mt-5">Szállítási adatok</h3>

        <div class="col-6 mb-3">
          <p>{{Auth::user()->shipping_name}}</p>
          <p>{{Auth::user()->shipping_zipcode}}</p>
          <p>{{Auth::user()->shipping_city}}</p>
          <p>{{Auth::user()->shipping_street}} {{Auth::user()->shipping_house_number}}</p>
        </div>
          
          
        <h3 class="mb-3 mt-5">Termékek</h3>
        
        @foreach (Session::get('cart') as $termek_id=>$mennyiseg)

        <?php $product = get_product_by_id($termek_id); ?>
            

        
        <div class="col-6 mb-3">
          <p><img style="width: 25%" src="/images/{{ $product->image }}" alt=""> {{$product->name}} {{$product->formatted_price}} X {{ $mennyiseg }}db </p>
        </div>
        @endforeach



        <h3 class="mb-3 mt-5">Kiválasztott fizetési mód</h3>
        
        <div class="col-6 mb-3">
          <p>{{$payment_method->name}} {!!$payment_method->formatted_price!!}</p>
        </div>



        <h3 class="mb-3 mt-5">Kiválasztott szállítási mód</h3>
        
        <div class="col-6 mb-3">
          <p>{{$shipping_method->name}} {!!$shipping_method->formatted_price!!}</p>
        </div>


        <h3 class="mb-3 mt-5">Végösszeg</h3>
        
        <div class="col-6 mb-3">
          <p>{{ prices(total($payment_method->price, $shipping_method->price)) }}</p>
        </div>


        

      
          
          


          <button type="submit" class="btn btn-success mt-3 mb-3">Küldés</button>
          <a href="checkout" class="btn btn-warning mt-3 mb-3">Szerkesztés</a>
          @csrf
        </form>

        {{-- $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);

          echo json_encode($arr);  JSON fájlba való konvertálás--}}
@endsection