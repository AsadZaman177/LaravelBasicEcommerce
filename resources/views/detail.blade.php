@extends('master')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <img class="img-thumbnail" src="{{ $product->Gallery }}">
    </div>
    <div class="col-sm-6">
      <div class="text-center">
        <a href="/"><h3>Go Back</h3></a>
      </div>
      <table class="table mt-5">
          <tr>
            <th>Product Name:</th>
            <td>{{ $product->ProductName }}</td>
          </tr>
          <tr>
            <th>Category:</th>
            <td>{{ $product->Category }}</td>
          </tr>
          <tr>
            <th>Price:</th>
            <td>RS. {{ $product->Price }}</td>
          </tr>
           <tr>
            <th>Description:</th>
            <td> {{ $product->Description }}</td>
          </tr>
          <tr>
            <td><button type="button" class="btn btn-primary">Add To Cart</button></td>
            <td><button type="button" class="btn btn-success">Buy Now</button></td>
          </tr>
      </table>
    </div>
  </div>
</div>

@endsection



