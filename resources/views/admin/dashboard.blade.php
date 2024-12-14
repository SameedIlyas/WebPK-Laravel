@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="admin-dashboard">
        <h1 class="dashboard-title">Admin Dashboard</h1>

        <div class="button-container">
            <a href="{{ route('admin.services') }}" class="btn">Manage Services</a>
            <a href="{{ route('admin.courses') }}" class="btn">Manage Courses</a>
        </div>
    </div>
@endsection
