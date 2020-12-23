@extends('layouts.app')

@section('content')

 <div class="container">

 	<div class="row justify-content-center">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your Order</span>
                <span class="badge badge-secondary badge-pill"></span>
            </h4>
            <ul class="list-group mb-3">
                <table id="cart" class="table table-hover ">


                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($cart)
                        @php $i=1 @endphp
                        @foreach($cart->items as $product)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td><img src="{{Storage::url($product['image'])}}" width="100"></td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['price']}}</td>
                        <td>{{ $product['qty'] }}</td>

                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{ $amount }}</strong>
                </li>
            </ul>
        </div>
 	</div>



 </div>

 @endsection
