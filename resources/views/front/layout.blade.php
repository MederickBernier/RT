<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/front.css', 'resources/js/front.js'])
    <!--Link-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>
<body>
    <!-- Navbar -->
    <header>
        @include('front.navbar')
    </header>

    <!-- Content Section -->
    <main role="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        @include('front.footer')
    </footer>
</body>
</html>
