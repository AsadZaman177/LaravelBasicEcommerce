@extends('master')
@section('content')

<section style="backkground: grey;">
<div class=" bg-dark pt-5 pb-5" >

  <!-- Full-width images with number and caption text -->
  @foreach ($product as $data)
  <div class="mySlides">
    <div class="text-center"> 
    <img src="{{ $data['Gallery'] }}" style="width:20%;">
    <div class="text">{{ $data['Description'] }}</div>
    </div>
  </div>
@endforeach

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
</section>

<div class="container">
  <div class="row mt-3 mb-5">
    <div class="text-center"><h3>Trending Products</h3></div>
      @foreach ($product as $data) 
          <div class="col-md-4">
            <img class="trending-image" src="{{ $data['Gallery'] }}">
            <div class=""><h4>{{ $data['ProductName'] }}</h4></div> 
            <a href="detail/{{ $data['id'] }}" class="btn btn-primary">View</a>
          </div>
      @endforeach
  </div>
</div>


  

@endsection



