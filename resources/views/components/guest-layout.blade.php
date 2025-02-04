<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/toastr-style.css') }}">

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/toastr-script.min.js') }}"></script>

    <!-- Google Fonts - Inter -->
    @googlefonts

</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-between px-10 py-4">
        <a class="text-2xl font-semibold" href="{{ route('home') }}">JWT Auth</a>
        <div class="flex space-x-2 mt-1">
            <a href="{{ route('login') }}" type="button" class="{{ request()->routeIs('login') ? 'hidden' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700' }}">Login</a>
            <a href="{{ route('register') }}" type="button" class="{{ request()->routeIs('register') ? 'hidden' : 'text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800' }} ">Register</a>
        </div>
    </div>
    <hr>

    <div class="flex items-center justify-center px-10 py-4">
        <h2 class="text-2xl font-semibold">Welcome JWT Auth Application</h2>
    </div>

    <div>
        {{ $slot }}
    </div>

</body>

</html>