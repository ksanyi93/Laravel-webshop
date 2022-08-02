@extends('layouts/main')

@section('title', 'Checkout')
    

@section('content')
        <h2 class="mb-5 mt-3">Számlázási adatok</h2>

        <form action="" method="post">
          
          <div class="col-6 mb-3">
            <label for="billing_name" class="form-label">Név</label>
            <input type="text" class="form-control" id="billing_name" placeholder="Add meg a neved" aria-describedby="emailHelp" name="billing_name" value="{{old('billing_name', Auth::user()->name)}}">
            @error('billing_name')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="billing_tax" class="form-label">Adószám</label>
            <input type="text" class="form-control" id="billing_tax" placeholder="Add meg az adószámodat" name="billing_tax" value="{{old('billing_tax', Auth::user()->billing_tax)}}">
            @error('billing_tax')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="billing_zipcode" class="form-label">Irányítószám</label>
            <input type="text" class="form-control" id="billing_zipcode" name="billing_zipcode" value="{{old('billing_zipcode', Auth::user()->billing_zipcode)}}">
            @error('billing_zipcode')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="billing_city" class="form-label">Város</label>
            <input type="text" class="form-control" id="billing_city"  name="billing_city" value="{{old('billing_city', Auth::user()->billing_city)}}">
            @error('billing_city')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="billing_street" class="form-label">Közterület</label>
            <input type="text" class="form-control" id="billing_street" placeholder="utca,út stb." name="billing_street" value="{{old('billing_street', Auth::user()->billing_street)}}">
            @error('billing_street')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-5">
            <label for="billing_house_number" class="form-label">Házszám</label>
            <input type="text" class="form-control" id="billing_house_number" name="billing_house_number" value="{{old('billing_house_number', Auth::user()->billing_house_number)}}">
            @error('billing_house_number')<span class="text-danger">{{$message}}</span> @enderror
          </div>


          <h2 class="mb-5 mt-3">Szállítási adatok</h2>

        
          
          <div class="col-6 mb-3">
            <label for="shipping_name" class="form-label">Név</label>
            <input type="text" class="form-control" id="shipping_name" placeholder="Add meg a neved" aria-describedby="emailHelp" name="shipping_name" value="{{old('shipping_name', Auth::user()->shipping_name)}}">
            @error('shipping_name')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="shipping_zipcode" class="form-label">Irányítószám</label>
            <input type="text" class="form-control" id="shipping_zipcode" name="shipping_zipcode" value="{{old('shipping_zipcode', Auth::user()->shipping_zipcode)}}">
            @error('shipping_zipcode')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="shipping_city" class="form-label">Város</label>
            <input type="text" class="form-control" id="shipping_city"  name="shipping_city" value="{{old('shipping_city', Auth::user()->shipping_city)}}">
            @error('shipping_city')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="shipping_street" class="form-label">Közterület</label>
            <input type="text" class="form-control" id="shipping_street" placeholder="utca,út stb." name="shipping_street" value="{{old('shipping_street', Auth::user()->shipping_street)}}">
            @error('shipping_street')<span class="text-danger">{{$message}}</span> @enderror
          </div>

          <div class="col-6 mb-3">
            <label for="shipping_house_number" class="form-label">Házszám</label>
            <input type="text" class="form-control" id="shipping_house_number" name="shipping_house_number" value="{{old('shipping_house_number', Auth::user()->shipping_house_number)}}">
            @error('shipping_house_number')<span class="text-danger">{{$message}}</span> @enderror
          </div>
          <div class="col-12 mb-5 form-check">
            <input type="checkbox" class="form-check-input" id="datas_check" name="datas_check" value="1">
            <label for="datas_check" class="form-check-label">Adatkezelési tájékoztatási útmutatót elolvastam,elfogadom.</label>
            @error('datas_check')<span class="text-danger">{{$message}}</span> @enderror
          </div>



        <h2 class="mb-3 mt-5">Fizetési lehetőségek</h2>
        @foreach ($payment_methods as $payment_method)
        <div class="form-check">
          <input class="form-check-input" type="radio" @if(Session::get('payment_method')==$payment_method->id) checked @endif name="payment_method" id="payment{{$payment_method->id}}" value="{{$payment_method->id}}">
          <label class="form-check-label" for="payment{{$payment_method->id}}">
            {{$payment_method->name}}  {!!$payment_method->formatted_price!!}
          </label>
        </div>
        @endforeach
        


          <h2 class="mb-3 mt-3">Szállítási lehetőségek</h2>
          @foreach ($shipping_methods as $shipping_method)
          <div class="form-check">
            <input class="form-check-input" type="radio" @if(Session::get('shipping_method')==$shipping_method->id) checked @endif name="shipping_method" id="shipping{{$shipping_method->id}}" value="{{$shipping_method->id}}">
            <label class="form-check-label" for="shipping{{$shipping_method->id}}">
              {{$shipping_method->name}}  {!!$shipping_method->formatted_price!!}
            </label>
          </div>
          @endforeach
          

      
          
          


          <button type="submit" class="btn btn-success mt-3 mb-3">Küldés</button>
          @csrf
        </form>
@endsection