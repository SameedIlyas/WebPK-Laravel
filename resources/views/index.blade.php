@extends('layouts.master')

@section('title', 'Web PK - Professional Web Design & Development')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="container text-center">
            <h1>Welcome to Web PK</h1>
            <p>Professional Web Design & Development Solutions</p>
            <a href="{{ url('/services') }}" class="btn primary-btn">Explore Our Services</a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services-preview" class="services">
        <div class="container">
            <h2 class="text-center">Our Services</h2>
            <div class="service-grid">
                <div class="service-item">
                    <div class="icon">💻</div>
                    <h5>Website Design & Development</h5>
                </div>
                <div class="service-item">
                    <div class="icon">🎨</div>
                    <h5>Logo Creation</h5>
                </div>
                <div class="service-item">
                    <div class="icon">🌐</div>
                    <h5>Domain Setup</h5>
                </div>
                <div class="service-item">
                    <div class="icon">🎓</div>
                    <h5>Web Design Courses</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Coffee Feature Section -->
    <section id="coffee-feature" class="coffee-feature">
        <div class="container text-center">
            <div class="icon">☕</div>
            <h2>Enjoy a Coffee While We Discuss Your Project</h2>
            <p>Visit our relaxing meeting room and let's chat about your web design needs over a cup of coffee!</p>
            <a href="{{ url('/contact') }}" class="btn primary-btn">Book a meeting</a>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2 class="text-center">What Our Clients Say</h2>
            <div class="testimonials-grid">
                <blockquote>
                    "The teaching and instruction are absolutely dynamic; they have the ability to break down and teach at a level suited to the student."
                </blockquote>
                <blockquote>
                    "The idea of having a coffee in a lovely relaxing setting was exciting, but the manner and professionalism of their work made me want to tell all my friends."
                </blockquote>
            </div>
        </div>
    </section>
@endsection
