<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto px-4">
        <header class="flex justify-between items-center py-6">
            <h1 class="text-3xl font-bold">Welcome to Laravel with Tailwind CSS!</h1>
        </header>

        <main class="mt-8">
            <p class="text-xl">
                If you see this page, Tailwind CSS is working correctly.
            </p>
        </main>

        <footer class="mt-16">
            <p class="text-center text-gray-600 text-sm">
                &copy; {{ date('Y') }} Your Application's Name. All Rights Reserved.
            </p>
        </footer>
    </div>
</body>
</html>
