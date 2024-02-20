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
</head>
<body class="bg-neutral-100">
    <div class="flex">
    @include('component.sidebar.sidebar')
    <div class="w-full mt-7">
        @yield('content')
    </div>
    </div>
</body>
</html>