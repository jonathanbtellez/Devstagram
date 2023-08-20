<!-- Creating a layout -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Destagram - @yield('title')</title>


    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"); --}}

    {{-- Receiving a list of styles that going to be use for the children component that use push directive --}}
    @stack('styles')
    

    {{-- connect the tailwind styles used in the project with vite server --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


    <!-- Fonts
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->

</head>

<body class="bg-slate-100">
    {{-- use a partial of html --}}
    @include('layouts._partials.header')
    <main class="container mx-auto mt-10">
        <h2 class="font-semibold text-center text-3xl mb-5 md:mb-5"> @yield('title') </h2>
        @yield('content')
    </main>
    <footer class="text-center p-10 font-bold uppercase">
        {{-- To use helpers of blade we use {{ helper()}} --}}
        DevStagram - Todos los derecho reservados {{ now()->year }}
    </footer>
</body>

</html>
