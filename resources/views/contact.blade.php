<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>

    <h3 class="text-center my-5">Hello, world!</h3>



    <div class="container">
        <form action="" method="post" class="row">

          
          @if( Session::get('message') )
          <span class="alert alert-success text-center"> {{Session::get('message')}} </span>
          @endif
        
            <div clas="col-6 mx-auto">
            <div class="row">
                <div class="col-6 mb-3">
                  <input type="text" class="form-control @error('f_name') is-invalid @enderror" placeholder="First name" value="{{old('f_name')}}" aria-label="First name" name="f_name" >

                  @error('f_name')
                      <span class="invalid-feedback"> {{$message}} </span>
                  @enderror

                </div>
                <div class="col-6 mb-3">
                  <input type="text" class="form-control @error('l_name') is-invalid @enderror" placeholder="Last name" value="{{old('l_name')}}" aria-label="Last name" name="l_name" >

                  @error('l_name')
                      <span class="invalid-feedback"> {{$message}} </span>
                  @enderror

                </div>

                <div class="col-6 mb-3">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{old('password')}}" aria-label="Password" name="password" >

                  @error('password')
                      <span class="invalid-feedback"> {{$message}} </span>
                  @enderror

                </div>

                <div class="col-6 mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}" aria-label="Email" name="email" >

                  @error('email')
                      <span class="invalid-feedback"> {{$message}} </span>
                  @enderror

                </div>

                <div class="col-6 mx-auto">
                    <button class="btn btn-primary d-grid mx-auto">Küldés</button>
                </div>
              </div>
            </div>

            @csrf
            {{-- aláírókulcs --}}

        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>