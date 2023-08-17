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
    <header class="p-5 border-b shadow bg-gradient-to-r from-purple-400 to-blue-300">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>

            <nav class="flex items-center gap-2">
                {{-- Validate if there is an authenticated user --}}

                {{-- @if (auth()->user())
                    <p>Authenticated</p>
                    @else
                    <p>No Authenticated</p>
                    @endif --}}

                {{-- use the auth directive to check if there is an authenticated  user  --}}
                @auth
                    <a href="{{ route('posts.create') }}"
                        class="flex items-center gap-2 text-sm uppercase font-semibold cursor-pointer">
                        Crear <i class="bi bi-image"></i>
                    </a>
                    |
                    <a class="font-semibold text-sm" href="{{ route('posts.index', auth()->user()->username) }}">
                        {{-- Get data of user object: auth()->user()->username --}}
                        Hola: <span class="font-normal">{{ auth()->user()->username }}</span>
                    </a>
                    {{-- Closing session implemetents security require use a post method --}}
                    |
                    <form action="{{ route('logout') }}" method="POST">
                        {{-- This directive avoid attacks of crsf --}}
                        @csrf
                        <button type="submit" class="font-semibold uppercase text-sm">Cerrar sesion <i
                                class="bi bi-door-open"></i>
                        </button>
                    </form>
                @endauth

                {{-- guest -> invitado, huesped --}}
                {{-- Use the guest directive to show information if there isn´t an autheticated user --}}
                @guest
                    <a class="font-semibold uppercase text-sm" href="{{ route('login') }}">Iniciar sesion</a>
                    |
                    <a class="font-semibold uppercase text-sm" href="{{ route('register') }}">Crear cuenta</a>
                @endguest


            </nav>

        </div>
    </header>
    <main class="container mx-auto mt-10">
        <h2 class="font-semibold text-center text-3xl mb-10"> @yield('title') </h2>
        @yield('content')
    </main>
    <footer class="text-center p-10 font-bold uppercase shadow bg-gradient-to-r from-purple-400 to-blue-300">
        {{-- To use helpers of blade we use {{ helper()}} --}}
        DevStagram - Todos los derecho reservados {{ now()->year }}
    </footer>
</body>

</html>
