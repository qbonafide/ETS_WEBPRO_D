@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif !important;
        background-color: #FFF8F3;
        color: #5B2C0C;
    }

    .map-section {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 60px;
        flex-wrap: wrap;
        padding: 60px 0;
    }

    .map-text {
        max-width: 400px;
        text-align: left;
    }

    .map-text h1 {
        font-size: 60px; 
        font-weight: 800;
        color: #5B2C0C;
        margin-bottom: 8px;
    }

    .map-text hr {
        border: 2px solid #5B2C0C;
        width: 60px;
        margin: 10px 0 20px;
    }

    .map-text p {
        margin: 6px 0;
        font-weight: 600;
        color: #8B4513; 
        line-height: 1.6;
        font-size: 17px;
    }

    .btn-direction {
        display: inline-block;
        background-color: #5B2C0C;
        color: #fff;
        font-weight: 600;
        border: none;
        padding: 14px 40px;
        border-radius: 50px;
        margin-top: 25px;
        text-decoration: none;
        transition: 0.3s ease;
        font-size: 18px;
    }

    .btn-direction:hover {
        background-color: #7a3c15;
        text-decoration: none;
        color: #fff;
        transform: scale(1.05);
    }

    iframe {
        border: none;
        border-radius: 15px;
        width: 600px;
        height: 400px;
    }

    @media (max-width: 992px) {
        .map-section {
            flex-direction: column;
        }

        iframe {
            width: 100%;
        }

        .map-text {
            text-align: center;
        }

        .map-text h1 {
            font-size: 48px;
        }
    }
</style>

<div class="container map-section">
    <div class="map-text">
        <h1>ITStudy</h1>
        <hr>
        <p>Teknik Kimia Street</p>
        <p>Teknik Informatika Department</p>
        <p>Institut Teknologi Sepuluh Nopember</p>
        <p>Sukolilo</p>
        <p>Surabaya</p>

        <a href="https://www.google.com/maps/dir/?api=1&destination=-7.282801,112.794243"
           target="_blank"
           class="btn-direction">
           Get Direction
        </a>
    </div>

    <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.3276592173123!2d112.79329557496422!3d-7.282536292733045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb0b4b10d10f%3A0x1bb5442b9dc66f7a!2sDepartemen%20Teknik%20Informatika%20ITS!5e0!3m2!1sid!2sid!4v1739922936439!5m2!1sid!2sid" 
    width="600" 
    height="450" 
    style="border:0; border-radius:15px;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
    </iframe>

</div>
@endsection
