<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        
        <!-- Display the error message if there is one -->
        @if (session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <!-- Form for admin login -->
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-primary">Login</button>

            <!-- Display the error message again (if any) after the form -->
            @if (session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif
        </form>
    </div>
</body>

</html>
