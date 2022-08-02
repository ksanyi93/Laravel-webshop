@extends('layouts/main')

@section('title', 'Welcome')
    

@section('content')

@if (Session::get('message'))
        <div class="alert alert-danger text-center fs-5" role="alert">
        {{Session::get('message')}}
        </div>
@endif
<h2 class="mb-3 mt-3">Üdvözöllek!</h2>

<p class="lh-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nisi, eum a placeat, repellendus animi, ut perferendis molestias aliquid atque non id accusamus sint suscipit deleniti recusandae fuga vero reprehenderit.</p>


@endsection
