<!-- Creating a layout -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Destagram - @yield('title')</title>

        {{-- connect the tailwind styles used in the project with vite server --}}
        @vite('resources/css/app.css')

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
                    <a class="font-semibold uppercase text-sm" href="#">Iniciar sesion</a>
                    <a class="font-semibold uppercase text-sm" href="/register">Crear cuenta</a>
                </nav>
            </div>
        </header>   
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">@yield('title')</h2>
            @yield('content')
        </main>
        <footer class="text-center p-10 font-bold uppercase shadow bg-gradient-to-r from-purple-400 to-blue-300">
            {{-- To use helpers of blade we use {{ helper()}} --}}
            DevStagram - Todos los derecho reservados {{ now()->year }}
        </footer>
    </body>
</html>