@extends('layouts.app')

@section('content')
<div class="hero-section d-flex align-items-center" 
     style="background: url('{{ asset('img/landing-page/building.png') }}') no-repeat center center/cover; height: 100vh;">

  <div class="container text-end">
    <div class="row justify-content-end">
      <div class="col-md-6">
        <h1 class="fw-bold hero-title">
          Your Productive<br>
          Space, Anytime<br>
          You Need
        </h1>
        <p class="hero-subtitle mt-3">
          Find, book, and focus — all in one platform for <br> modern learners.
        </p>
      </div>
    </div>
  </div>
</div>

<section class="container mt-5">
  <h2 class="fw-bold text-center mb-4 section-title">Why Choose ITStudy?</h2>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="{{ asset('img/landing-page/grid-flexiblehour.jpg') }}" alt="Flexible Booking" class="feature-img mb-3">
        </div>
        <h5 class="fw-bold">Flexible Hourly Booking</h5>
        <p>Book your study space for exactly how long you need.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="{{ asset('img/landing-page/grid-comfortmeets.jpg') }}" alt="Comfort Meets Productivity" class="feature-img mb-3">
        </div>
        <h5 class="fw-bold">Comfort Meets Productivity</h5>
        <p>Designed for focus — private booths or group tables ready for you.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="{{ asset('img/landing-page/grid-easyonline.jpg') }}" alt="Easy Online Reservation" class="feature-img mb-3">
        </div>
        <h5 class="fw-bold">Easy Online Reservation</h5>
        <p>Book anytime, anywhere, directly through our website.</p>
      </div>
    </div>
  </div>

  <div class="row g-4 mt-3">
    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="{{ asset('img/landing-page/grid-groupsolooption.jpg') }}" alt="Group & Solo Options" class="feature-img mb-3">
        </div>
        <h5 class="fw-bold">Group & Solo Options</h5>
        <p>From quiet zones to collaborative rooms — ITStudy fits your style.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="{{ asset('img/landing-page/grid-affordable.jpg') }}" alt="Affordable for Students" class="feature-img mb-3">
        </div>
        <h5 class="fw-bold">Affordable for Students</h5>
        <p>Transparent pricing with student-friendly rates.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="{{ asset('img/landing-page/grid-facilities.jpg') }}" alt="Facilities That Keep You Going" class="feature-img mb-3">
        </div>
        <h5 class="fw-bold">Facilities That Keep You Going</h5>
        <p>Wi-Fi, charging ports, and coffee corner — everything you need.</p>
      </div>
    </div>
  </div>
</section>

<section class="container mt-5 p-5 rounded-4 cta-section">
  <div class="row align-items-center">
    <div class="col-md-6 text-md-start text-center mb-4 mb-md-0">
      <h2 class="fw-bold cta-title">Ready to get things done?</h2>
      <p>Find your perfect spot today at ITStudy</p>
      <a href="/booking" class="btn btn-book mt-3">Book Now</a>
    </div>

    <div class="col-md-6 text-center">
      <img src="{{ asset('img/landing-page/read-book.png') }}" 
           alt="CTA Illustration" 
           class="img-fluid rounded-3" 
           style="max-width: 400px; height: auto;">
    </div>
  </div>
</section>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
  body {
    font-family: 'Poppins', sans-serif;
  }

  .hero-title {
    color: #4a2c2a;
    font-size: 3.5rem;
    line-height: 1.2;
  }
  .hero-subtitle {
    color: #6c757d;
    max-width: 500px;
    margin-left: auto;
    font-size: 1.2rem;
  }

  .section-title {
    color: #4a2c2a;
  }

  .feature-card {
    background-color: #ffece3;
    padding: 25px;
    border-radius: 20px;
    text-align: center;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15);
  }

  .feature-img-wrapper {
    overflow: hidden;
    border-radius: 10px;
  }

  .feature-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .feature-card:hover .feature-img {
    transform: scale(1.08);
  }

  .cta-section {
    background-color: #ffece3;
  }

  .cta-title {
    color: #4a2c2a;
  }

  .btn-book {
    background-color: #4a2c2a;
    color: white;
    padding: 10px 25px;
    border-radius: 8px;
    transition: 0.3s;
  }
  .btn-book:hover {
    background-color: #693b38;
  }
</style>

@endsection
