@extends('layouts')
@section('content')
<div class="container">
  <h2>From</h2>
  <form role="form" id="form" action="{{ URL::to('form/create')}}" method="post">
    <div class="form-group">
      <label for="product">Product name:</label>
      <input type="text" class="form-control" name="product_name" id="product_name">
    </div>
    <div class="form-group">
      <label for="quantity">Quantity in stock:</label>
      <input type="text" class="form-control" name="quantity" id="quantity">
    </div>
    <div class="form-group">
      <label for="price">Price per item:</label>
      <input type="text" class="form-control" name="price" id="price">
    </div>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<div class="container">
    <table class="table">
    <thead>
      <tr>
        <th>Product name</th>
        <th>Quantity in stock</th>
        <th>Price per item</th>
        <th>Date time submitted</th>
        <th>Total value number</th>
      </tr>
    </thead>
    <tbody>
    @php $total_val = 0; @endphp
      @foreach($array_data as $data)
        <tr>
          <td>{{$data['product_name']}}</td>
          <td>{{$data['quantity']}}</td>
          <td>{{$data['price']}}</td>
          <td>{{$data['created_at']}}</td>
          <td>{{$data['price']*$data['quantity']}}</td>
        </tr>
        @php $total_val+= $data['price']*$data['quantity']; @endphp
      @endforeach
      <tr>
      <td colspan="5" align="right">Total Sum: <span id="total_val">{{ $total_val }}</span></td>
      </tr>
    </tbody>
  </table>
</div>
@stop
@section('js')
<script src="{!! asset('js/index.js') !!}"></script>
@stop