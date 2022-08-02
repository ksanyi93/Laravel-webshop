@extends('layouts/main')

@section('title', 'Payment info')
    

@section('content')
        <h2 class="mb-5 mt-3 ">Fizetési módok</h2>
<p>
        <ul style="list-style-type: none">
          <li>
            <a href="#pay_by_cash">
              <p><i class="fa-solid fa-money-bill fs-3"></i></p>
              <p>Készpénz</p>
            </a>
          </li>

          <li>
            <a href="#pay_with_credit_card">
              <p><i class="fa-solid fa-credit-card fs-3"></i></p>
              <p>Bankkártya</p>
            </a>
          </li>

          <li>
            <a href="#pay_by_transfer">
              <p><i class="fa-solid fa-money-bill-transfer fs-3"></i></p>
              <p>Utalás</p>
            </a>
          </li>

          <li>
            <a href="#pay_after">
              <p><i class="fa-solid fa-wallet fs-3"></i></p>
              <p>Utánvét</p>
            </a>
          </li>
        </ul>
      </p>
@endsection


