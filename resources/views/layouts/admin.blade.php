<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css'])
</head>
<body>
    <div class="container container--wide">
        <header class="admin-header">
            <div class="admin-header__title">// admin panel</div>
            <nav class="admin-header__nav">
                <a href="{{ route('home') }}" target="_blank">view site</a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn--danger btn--sm">logout</button>
                </form>
            </nav>
        </header>

        @if(session('success'))
            <div class="alert alert--success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
