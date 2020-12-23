@extends('admin.layouts.main')

@section('content')

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Tables</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Order Tables</li>
            </ol>
          </div>

           	<div class="row justify-content-center">
 		<div class="col-md-8">
 			@foreach($carts as $cart)

 			<div class="card mb-3">
 				<div class="card-body">
 					@foreach($cart->items as $item)
 					<span class="float-right">
 						<img src="{{Storage::url($item['image'])}}" width="100">
 					</span>

 					<p>Name:{{$item['name']}}</p>
 					<p>Price:{{$item['price']}}</p>
 					<p>Qty:{{$item['qty']}}</p>


 					@endforeach

 				</div>

 			</div>

 			<p>
 				<button type="button" class="btm btn-success">
 					<span class="">
 						Total price:${{$cart->totalPrice}}
 					</span>
 				</button>
 			</p>

 			@endforeach
 		</div>
 	</div>



 @endsection
