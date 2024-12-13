@extends('layouts.master')

@section('title', 'Courses - Web PK')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <h1>Explore Our Courses</h1>
        <p>Unlock your potential with our expertly designed courses.</p>
        <a href="#courses-list" class="btn">Browse Courses</a>
    </section>

    <!-- Courses Section -->
    <section id="courses-list" class="section-padding">
        <h2 class="section-title">Available Courses</h2>
        <div class="services-grid">
            <!-- Use a loop to dynamically display courses -->
            @foreach($courses as $course)
            <div class="card">
                <h3>{{ $course->name }}</h3>
                <p>{{ $course->description }}</p>
                <button class="btn-secondary">Enroll Now</button>
            </div>
            @endforeach
        </div>
    </section>
@endsection
