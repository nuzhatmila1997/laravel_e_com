<table class="table table-striped">
    <thead>

      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Qty</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1 ; @endphp

      <tr>
        <th scope="row">{{$i++}}</th>
        <td>{{$update_product->name}}</td>
        <td>{{$update_product->amount}}</td>
        <td>{{$update_product->status}}</td>
      </tr>

          <br>
          Total Price:{{$cart->totalPrice}}
          Plese click the link to view your purchase.<a href="{{url('/orders')}}"> click here</a>


    </tbody>
  </table>
