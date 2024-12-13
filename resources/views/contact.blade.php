@extends('layouts.master')

@section('title', 'Contact Us - Web PK')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Contact Us</h1>
            <p>We’d love to hear from you! Reach out with any questions or project inquiries.</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section id="contact-form-section" class="section-padding">
        <div class="container">
            <h2 class="section-title">Get in Touch</h2>
            <form id="contactForm" method="POST" action="{{ route('contact.submit') }}">
                @csrf <!-- Include CSRF token -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="service">Select Service:</label>
                    <select id="service" name="service" required>
                        <option value="" disabled selected>Select a service</option>
                        <option value="website">Website Design & Development</option>
                        <option value="logo">Logo Design</option>
                        <option value="domain">Domain Setup</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" placeholder="Write your message" required></textarea>
                </div>
                <button type="submit" class="btn-primary">Submit</button>
            </form>
            @if ($errors->any())
                <div id="errors" class="error-messages">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div id="success" class="success-messages">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </section>

    <!-- Contact Info Section -->
    <section id="contact-info-section" class="section-padding">
        <div class="container">
            <h2 class="section-title">Contact Information</h2>
            <p><strong>Email:</strong> info@webpk.com</p>
            <p><strong>Phone:</strong> +92 123 456 7890</p>
            <p><strong>Address:</strong> 123 Web Street, Tech City, Pakistan</p>
        </div>
    </section>
@endsection
