@extends('layouts.master')

@section('title', 'Services - Web PK')

@section('content')

    <!-- Success Message -->
    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    <!-- Services Section -->
    <section id="services" class="section-padding">
        <h2 class="section-title">Our Services</h2>
        <div class="grid services-grid">
            <div class="card service-card">
                <h5>Website Design & Development</h5>
                <p>Custom-built websites tailored to your specific needs and brand identity.</p>
            </div>
            <div class="card service-card">
                <h5>Logo Creation</h5>
                <p>Professional logo design to represent your brand effectively.</p>
            </div>
            <div class="card service-card">
                <h5>Domain Setup</h5>
                <p>Assistance in selecting and configuring the perfect domain for your business.</p>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="section-padding">
        <h2 class="section-title">Service Pricing</h2>
        <table id="pricingTable" class="pricing-table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Turnaround Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr id="service-row-{{ $service->id }}">
                    <td>{{ $service->name }}</td>
                    <td>${{ number_format($service->price, 2) }}</td>
                    <td>{{ $service->turnaround_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

@endsection
