<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="{{ asset('resources/app/app.css') }}"> --}}
    {{-- @vite('resources/js/app.js') --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <div class="bg-gray-600">
        @include('layouts.components.header')
        <main class="py-4">
            <div class="bg-red font-bold color-red">asjkd;lasjkd;l</div>
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
