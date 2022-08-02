
    <div class="card" style="">
      <img src="/images/{{$product->image}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <div class="row">
            <span class="col-6 text-center fs-3">{!!$product->formatted_price!!}</span>

            <form action="/put_into_cart" method="post">
            <button class="btn  col-4  {{ Session::get('cart.'.$product->id) ? 'btn-secondary' : 'btn-primary' }}">Kosárba</button>
            <input type="hidden" name="id" value="{{$product->id}}">
            <input type="hidden" name="qtty" value="1">
          @csrf
          </form>
          </div>
      </div>
    </div>
