@extends('layouts/main')

@section('title', 'Products')
    

@section('content')
      
      
      <div class="row g-3">

      <h2 class="col-12 pt-3 mb-3 text-center fw-bold">Termékek</h2>

      @foreach ($products as $p)
          
      
        <div class="col-12 col-md-6 col-lg-4">
        @include('includes/cards', [
          'product'=>$p
        ])
      </div>

      
      @endforeach
      
      {{ $products->appends($_GET)->links('vendor.pagination.bootstrap-4') }}
    


      </div>
@endsection

@section('style')
<style>
  .card-img-top{
    height: 200px;
    object-fit: cover;
  }
</style>
@endsection