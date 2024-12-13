<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Web PK - Professional Web Design & Development')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar">
            <div class="container navbar-container">
                <a class="brand" href="{{ url('/') }}">Web PK</a>
                <!-- Toggle Button for Mobile Menu -->
                <button class="toggle-button" aria-label="Toggle Navigation">
                    ☰
                </button>
                <!-- Navbar Links -->
                <div class="navbar-links">
                    <ul>
                        <li><a href="{{ url('/') }}" class="nav-link @if(Request::is('/')) active @endif">Home</a></li>
                        <li><a href="{{ url('/about') }}" class="nav-link @if(Request::is('about')) active @endif">About</a></li>
                        <li><a href="{{ url('/services') }}" class="nav-link @if(Request::is('services')) active @endif">Services</a></li>
                        <li><a href="{{ url('/courses') }}" class="nav-link @if(Request::is('courses')) active @endif">Courses</a></li>
                        <li><a href="{{ url('/contact') }}" class="nav-link @if(Request::is('contact')) active @endif">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-left">
                <a href="{{ url('/') }}" class="brand">Web PK</a>
                <p>&copy; 2024 Web PK. All rights reserved.</p>
            </div>
            <div class="footer-middle">
                <ul class="footer-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            <div class="footer-right">
                <a href="#" class="social-link">Facebook</a>
                <a href="#" class="social-link">Twitter</a>
                <a href="#" class="social-link">Instagram</a>
            </div>
        </div>
    </footer>

    <!-- Floating Change Background Button -->
    <button id="changeBgBtn" class="floating-btn" onclick="toggleBackground()">☰</button>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
