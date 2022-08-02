<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>
    @hasSection ('title')
        @yield('title')
    @else
        Nincsen címe az oldalamnak
    @endif    
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    @hasSection ('style')
        
    @yield('style')
        
    @endif
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active navbar-brand" aria-current="page" href="{{route('home')}}">Kezdőoldal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('products_home')}}">Termékek</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('enter')}}">Belépés</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('cart')}}">Kosár</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('payment_info') }}">Fizetési információk</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{ route('shipping_info') }}">Szállítási információk</a>
              </li>
              
            </ul>
            <form action="/products" class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_input" value="{{ Request::get('search_input') }}">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      
      

      <div class="container">


        
        @yield('content')




      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>