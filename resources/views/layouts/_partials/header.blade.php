<header class="p-5 border-b shadow bg-gradient-to-r from-purple-400 to-blue-300">
    <div class="container mx-auto flex justify-between items-center flex-col md:flex-row ">
        <a href="{{route('home')}}">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>
        </a>
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
                    class="flex items-center gap-2 text-sm uppercase shadow border-lg font-semibold cursor-pointer px-2 py-1">
                    Crear <i class="bi bi-image"></i>
                </a>
                <a class="font-semibold text-sm" href="{{ route('posts.index', auth()->user()->username) }}">
                    {{-- Get data of user object: auth()->user()->username --}}
                    Hola: <span class="font-normal">{{ auth()->user()->username }}</span>
                </a>
                {{-- Closing session implemetents security require use a post method --}}
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
