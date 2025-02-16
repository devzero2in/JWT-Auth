<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/toastr-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.tailwindcss.css') }}">

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/toastr-script.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/list.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.tailwindcss.js') }}"></script>
</head>

<body>

    <div class="navbar">
        @include('components.admin-navbar')
    </div>
    <div class="drawer">
        @include('components.admin-sidebar')
    </div>

    <div id="mainContent" class="transition-all duration-300 px-3 py-4 sm:ml-64">
        <div class="mt-14">
            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('js/myScript.js') }}"></script>

</body>

</html>