@extends('layout.master')
@section('monkey')

<style>
    /* GENERAL STYLING */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    section {
        position: relative;
    }

    h1, h2, h3, h4 {
        margin: 0;
        padding: 0;
    }

    p, li {
        margin: 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* HERO SECTION */
    .hero-image {
        background-image: url('{{ asset("image/room1.jpg") }}');
        background-size: cover;
        background-position: center;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        position: relative; /* Make sure overlay positions correctly */

    }

    .hero-overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4); /* Adjust opacity here */
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2; /* On top of overlay */
        max-width: 800px;
        padding: 0 20px;
    }

    .hero-content h1 {
        font-size: 50px;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .hero-content p {
        font-size: 18px;
        line-height: 1.6;
    }

    /* ROOM DESCRIPTION */
    .room-description {
        background-color: #f9fafb;
        padding: 100px 20px;
        text-align: center;
    }

    .room-description h2 {
        font-size: 48px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 40px;
    }

    .room-description p {
        font-size: 18px;
        color: #4b5563;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .highlight-blue { color: #2563eb; font-weight: 600; }
    .highlight-green { color: #16a34a; font-weight: 600; }

    /* VISION & MISSION */
    .vision-mission {
        background-color: #f3f4f6;
        padding: 100px 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
        justify-content: center;
    }

    .card {
        background-color: white;
        padding: 40px;
        border-radius: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: 1px solid #e5e7eb;
        flex: 1 1 400px;
        min-width: 300px;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }

    .card h3 {
        font-size: 32px;
        margin-bottom: 20px;
        color: #1f2937;
    }

    .card p, .card li {
        font-size: 18px;
        color: #4b5563;
        line-height: 1.8;
    }

    .card ul {
        padding-left: 20px;
    }

    /* DEVELOPERS */
    .developers {
        background-color: #f9fafb;
        padding: 100px 20px;
        text-align: center;
    }

    .developers h2 {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 60px;
    }

    .dev-container {
        display: flex;
        justify-content: center;
        gap: 80px;
        flex-wrap: wrap;
    }

    .developer {
        background-color: white;
        padding: 30px;
        border-radius: 25px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        width: 220px;
        transition: all 0.3s ease;
    }

    .developer:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }

    .developer img {
        width: 160px;
        height: 200px;
        object-fit: cover;
        border-radius: 50% / 60%;
        border: 3px solid #333;
        margin-bottom: 20px;
        transition: transform 0.3s ease;
    }

    .developer img:hover {
        transform: scale(1.05);
    }

    .developer h4 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .developer p {
        font-size: 14px;
        color: #4b5563;
    }

    /* FOOTER */
    footer {
        background-color: #1f2937;
        color: white;
        text-align: center;
        padding: 30px 20px;
    }

    @media(max-width: 768px) {
        .hero-content h1 { font-size: 36px; }
        .developers h2 { font-size: 32px; }
        .dev-container { gap: 40px; }
    }
</style>

{{-- HERO SECTION --}}
<section class="hero-image">
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <h1>Welcome to RoomCha</h1>
        <p>Your trusted platform to find, rent, and share rooms with ease. We make room renting simple, transparent, and stress-free.</p>
    </div>
</section>

{{-- ROOM DESCRIPTION --}}
<section class="room-description container">
    <h2>What We Do</h2>
    <p><span class="highlight-blue">RoomCha</span> connects room owners and seekers in a <span class="highlight-green">safe</span> and <span class="highlight-green">user-friendly</span> platform. Whether you are looking for a room, sharing your space, or renting out, RoomCha ensures <span class="highlight-blue">verified listings</span>, <span class="highlight-blue">transparency</span>, and <span class="highlight-blue">easy communication</span>.</p>
    <p>Our goal is to make the room renting journey <span class="highlight-green">smooth</span> — no brokers, no hidden charges, no confusion. Just <span class="highlight-blue">real people</span> and <span class="highlight-blue">real rooms</span>.</p>
</section>

{{-- VISION & MISSION --}}
<section class="vision-mission container">
    <div class="card">
        <h3>Our Vision</h3>
        <p>“To create a world where finding the <span class="highlight-blue">right room</span> feels <span class="highlight-green">effortless</span>, <span class="highlight-blue">transparent</span> and <span class="highlight-green">accessible</span> to everyone.”</p>
    </div>
    <div class="card">
        <h3>Our Mission</h3>
        <ul>
            <li>Provide a <span class="highlight-blue">simple</span> and <span class="highlight-green">user-friendly</span> platform for room renting.</li>
            <li>Build <span class="highlight-blue">trust</span> between owners and seekers with verified listings.</li>
            <li>Empower communities by making <span class="highlight-green">housing accessible</span>.</li>
        </ul>
    </div>
</section>

{{-- DEVELOPERS --}}
<section class="developers container">
    <h2>Meet Our Developers</h2>
    <div class="dev-container">
        <div class="developer">
            <img src="{{ asset('image/pradip.jpeg') }}" alt="Developer 1">
            <h4>Pradip Sharma</h4>
            <p>Backend Developer</p>
        </div>
        <div class="developer">
            <img src="{{ asset('image/aryan.jpeg') }}" alt="Developer 2">
            <h4>Aryan</h4>
            <p>Frontend Developer</p>
        </div>
    </div>
</section>

{{-- FOOTER --}}

@endsection
