<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css'])
</head>
<body class="login">
    <div class="login__box">
        <h1 class="login__title">// admin login</h1>

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group">
                <label for="login">login</label>
                <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus>
                @error('login')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label class="checkbox">
                    <input type="checkbox" name="remember">
                    remember me
                </label>
            </div>

            <button type="submit" class="btn" style="width: 100%;">login</button>
        </form>

        <div class="login__back">
            <a href="{{ route('home') }}">&larr; back to site</a>
        </div>
    </div>
</body>
</html>
