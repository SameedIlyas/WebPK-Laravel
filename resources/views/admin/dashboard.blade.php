@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <h1>Admin Dashboard</h1>
    <div>
        <a href="{{ route('services.index') }}">Manage Services</a>
        <a href="{{ route('courses.index') }}">Manage Courses</a>
    </div>
@endsection
