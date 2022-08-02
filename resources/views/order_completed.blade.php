@extends('layouts/main')

@section('title', 'Order completed')
    

@section('content')
        <h3 class="mb-3 mt-3 text-center">Sikeres vásárlás!</h3>

        @if (Session::get('message'))
        <div class="alert alert-success text-center fs-5" role="alert">
          {{Session::get('message')}}
        </div>
        @endif
@endsection