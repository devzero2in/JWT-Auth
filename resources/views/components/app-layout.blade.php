<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/toastr-style.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/toastr-script.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
</head>

<body>

    <div class="navbar">
        @include('components.navbar')
    </div>
    <div class="drawer">
        @include('components.sidebar')
    </div>

    <div id="mainContent" class="transition-all duration-300 px-3 py-4 sm:ml-64">
        <div class="mt-14">
            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('js/myScript.js') }}"></script>

</body>

</html>