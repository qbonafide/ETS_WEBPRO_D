{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('content')
<section class="about-hero d-flex align-items-center justify-content-center text-center">
  <div class="hero-overlay">
    <h1 class="hero-title fw-bold text-white">ITStudy</h1>
    <p class="hero-subtitle text-white">We're here for you 24/7</p>
  </div>
</section>

<section class="d-flex justify-content-center mt-5" style="background-color: #403830; padding: 50px 0;">
  <div style="background-color: #4a3f36; border-radius: 20px; padding: 50px; max-width: 1200px; text-align: center;">
    <h2 class="fw-bold mb-4" style="color: #fadbb7; font-size: 3.5rem;">About Us</h2>
    <p style="color: #f6f0ea; font-size: 1.15rem; line-height: 1.8;">
      At ITStudy, we provide the perfect environment for students and professionals alike to study, collaborate, 
      and grow. Whether you're preparing for exams, working on a project, or simply need a quiet corner to focus.<br><br>
      <b>ITStudy is here 24/7 for your productivity journey!</b>
    </p>

    <div class="text-center mt-4">
      <img src="{{ asset('img/about-us/about-us-page.jpg') }}" 
           alt="About ITStudy" 
           class="img-fluid rounded-3 shadow-sm" 
           style="max-width: 600px; height: auto;">
    </div>
  </div>
</section>

<section class="container mt-5" style="font-family: 'Poppins', sans-serif;">
  <div style="background-color: #ebe3de; padding: 30px; border-radius: 15px;">
    <h2 class="fw-bold text-center mb-4" style="color: #4a2c2a; font-size: 2.8rem;">Our Facilities</h2>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <ul class="list-unstyled fs-5" style="line-height: 1.9;">
          <li class="d-flex align-items-start mb-3">
            <i class="bi bi-wifi text-primary me-3 fs-3"></i>
            <span><strong>High-Speed Wi-Fi</strong> — Stay connected with reliable and fast internet for all your study needs.</span>
          </li>
          <li class="d-flex align-items-start mb-3">
            <i class="bi bi-cup-hot text-warning me-3 fs-3"></i>
            <span><strong>Café Corner</strong> — Refresh yourself with coffee and snacks to keep your focus sharp.</span>
          </li>
          <li class="d-flex align-items-start mb-3">
            <i class="bi bi-lightning-charge text-danger me-3 fs-3"></i>
            <span><strong>Charging Ports</strong> — Power up your devices without interrupting your study flow.</span>
          </li>
          <li class="d-flex align-items-start mb-3">
            <i class="bi bi-people text-success me-3 fs-3"></i>
            <span><strong>Group & Solo Spaces</strong> — Choose between private booths or group study rooms to suit your needs.</span>
          </li>
          <li class="d-flex align-items-start mb-3">
            <i class="bi bi-calendar-check text-info me-3 fs-3"></i>
            <span><strong>Flexible Booking</strong> — Book your study space by the hour or for a full day — it’s up to you!</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="contact-section py-5">
  <div class="container text-center">
    <div class="d-flex justify-content-center gap-3 flex-wrap">
      <a href="https://instagram.com/itstudy" target="_blank" class="contact-pill d-flex align-items-center">
        <i class="bi bi-instagram contact-icon me-1"></i>
        <div class="pill-left fw-bold">INSTAGRAM</div>
        <div class="pill-right">@itstudy</div>
      </a>

      <a href="https://x.com/itstudyy" target="_blank" class="contact-pill d-flex align-items-center">
        <i class="bi bi-twitter contact-icon me-1"></i>
        <div class="pill-left fw-bold">TWITTER</div>
        <div class="pill-right">@itstudyy</div>
      </a>

      <a href="https://wa.me/" target="_blank" class="contact-pill d-flex align-items-center">
        <i class="bi bi-whatsapp contact-icon me-1"></i>
        <div class="pill-left fw-bold">CONTACT</div>
        <div class="pill-right">+62812345678</div>
      </a>
    </div>
  </div>
</section>

<section class="text-center py-5 final-cta">
  <h2 class="fw-bold display-5 mb-3">CONTACT ✦ US</h2>
  <p class="mb-0 fs-5">Find your perfect study spot at ITStudy today</p>
</section>
@endsection

@push('styles')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

  * {
    font-family: 'Poppins', sans-serif !important;
  }

  .about-hero {
    background-image: url("{{ asset('img/about-us/ITStusy-bg.jpg') }}");
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 430px;
    margin-top: 100px;
    margin-bottom: 160px;
    position: relative;
  }

  .hero-overlay {
    background-color: rgba(0, 0, 0, 0.4);
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .hero-title {
    font-size: 7rem;
    font-weight: 800;
    letter-spacing: 1px;
    animation: fadeInDown 1.2s ease-in-out;
  }

  .hero-subtitle {
    font-size: 1.5rem;
    font-weight: 400;
    opacity: 0.9;
    animation: fadeInUp 1.4s ease-in-out;
  }

  @keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .contact-section {
    background-color: #f6f0ea;
    padding: 80px 0;
  }

  .contact-pill {
    display: flex;
    width: 300px;
    border-radius: 30px;
    overflow: hidden;
    text-decoration: none;
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    background-color: #e8ddd1;
    color: #4a2c2a;
    font-weight: 600;
  }

  .contact-pill:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
  }

  .pill-left {
    flex: 1;
    text-align: center;
    padding: 12px 15px;
  }

  .pill-right {
    flex: 1;
    text-align: center;
    padding: 12px 15px;
    background-color: #8c6b5a;
    color: white;
  }

  .contact-icon {
    font-size: 1.4rem;
    margin-left: 20px;
  }

  @media (max-width: 768px) {
    .d-flex.justify-content-center {
      flex-direction: column;
      gap: 15px;
      align-items: center;
    }

    .contact-pill {
      width: 100%;
      max-width: 300px;
    }
  }
</style>
@endpush
