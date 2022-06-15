@extends('dashboard.master')
@section('title', 'Home')

@section('content')
<section class="content">
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ URL::to('/images') }}/header-hero-banner-id.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ URL::to('/images') }}/ondesksurvey.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ URL::to('/images') }}/Ryan_Dahl.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
<br>
<br>
<br>
<h1 style="text-align:center">"We Plan It, We Execute It, We Improve It."</h1>
@endsection