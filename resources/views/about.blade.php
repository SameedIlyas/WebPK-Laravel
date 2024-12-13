@extends('layouts.master')

@section('title', 'Courses - Web PK')

@section('content')
    <!-- About Hero Section -->
    <section id="hero" class="hero about-hero">
        <div class="container text-center">
            <h1>About Us</h1>
            <p>Discover the story behind Web PK and our commitment to web development excellence.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
        <!-- Our Mission Section -->
        <section id="mission" class="section">
            <h2 class="section-title">Our Mission</h2>
            <p>
                At Web PK, we are passionate about empowering businesses and individuals with
                top-notch web design and development solutions. We prioritize accessibility,
                innovation, and customer satisfaction.
            </p>
        </section>

        <!-- Website Templates Section -->
        <section id="templates" class="section">
            <h2 class="section-title">Website Templates Available</h2>
            <div class="buttons">
                <button id="showDetailsBtn" class="btn primary-btn">Show Details</button>
                <button id="hideDetailsBtn" class="btn secondary-btn">Hide Details</button>
            </div>
            <div id="detailsSection" class="details hidden">
                <p>Here are the website templates we have:</p>
                <ul>
                    <li>Portfolio Template</li>
                    <li>E-commerce Template</li>
                    <li>Blog Template</li>
                    <li>Business Template</li>
                </ul>
            </div>
        </section>

        <!-- Meet Our Founder Section -->
        <section id="founder" class="section">
            <h2 class="section-title">Meet Our Founder</h2>
            <div class="founder-info">
                <img src="founder.jpg" alt="Ali Sher" class="founder-photo">
                <p id="dynamicText">
                    Ali Sher is the visionary founder behind Web PK, dedicated to providing
                    exceptional templates and solutions tailored to your needs.
                </p>
            </div>
        </section>
        
        <!-- Interactive Section -->
        <section id="interactive" class="section text-center">
            <h2 class="section-title">Interactive Features</h2>
            <p>Experiment with our dynamic elements below!</p>
            <button id="changeTextStyleBtn" class="btn primary-btn">Change Text Style</button>
            <button id="resetTextStyleBtn" class="btn secondary-btn">Reset Text Style</button>
        </section>
    </main>
@endsection
