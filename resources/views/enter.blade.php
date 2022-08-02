@extends('layouts/main')

@section('title', 'Login')
    

@section('content')

        @if (Session::get('false_message'))
        <div class="alert alert-danger text-center fs-5" role="alert">
          {{Session::get('false_message')}}
        </div>
        @endif

        <h2>Belépés</h2>

        <form action="" method="post">
          
          <div class="col-6 mb-3">
            <label for="email" class="form-label">E-mail cím</label>
            <input type="email" class="form-control" id="email" placeholder="Add meg az e-mail címedet" aria-describedby="emailHelp" name="email">
          </div>

          <div class="col-6 mb-3">
            <label for="password" class="form-label">Jelszó</label>
            <input type="password" class="form-control" id="password" placeholder="Add meg a jelszavad" name="password">
          </div>
          
          <button type="submit" class="btn btn-success">Belépés</button>
          @csrf
        </form>
@endsection