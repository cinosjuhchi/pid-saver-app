<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap');

        /* Menyembunyikan scrollbar */
        ::-webkit-scrollbar {
            width: 0;  /* Width of the entire scrollbar */
            height: 0; /* Height of the entire scrollbar */
        }
        /* Optional: menambahkan style lain pada track scrollbar */
        ::-webkit-scrollbar-track {
            background: transparent; /* Make the scrollbar transparent */
        }
    </style>
</head>
<body class="bg-putihneut2 font-jakarta overflow-hidden">
    <div class="flex">
    <div class="sticky top-0 h-screen bg-gray-200 overflow-y-auto">
    @include('component.sidebar.sidebar')
    </div>
    <div class="flex-1 overflow-y-scroll m-6 main-content"">
        <div class="nav sticky top-0">
            @include('component.search-home')
        </div>
        @yield('content')
    </div>
    </div>
</body>
</html>