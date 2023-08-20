@extends('layouts.app')

@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6-12 flex flex-col items-center md:flex-row">

            <div class="w-8/12 lg:w-6/12 px-5 rounded-full">
                <img class="rounded-full"
                    src="{{ $user->image ? asset('profiles') . '/' . $user->image : asset('img/usuario.svg') }}"
                    alt="Imagen usuario" />
            </div>
            <div class="md:w-8/12 flex flex-col items-center md:justify-center md:items-start md:py-0 lg:w-6/12 px-5 py-10">
                <div class="flex gap-2 items-center">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('profile.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <i class="bi bi-pen"></i>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    {{ $user->followers->count() }}
                    <span class="font-normal"> {{ $user->followers->count() === 1 ? 'Seguidor' : 'Seguidores' }}</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followings->count() }}
                    <span class="font-normal">siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $posts->count() }}
                    <span class="font-normal"> {{ $posts->count() === 1 ? 'post' : 'posts' }}</span>
                </p>
                @auth
                    @if (auth()->user()->id !== $user->id)
                        @if (!$user->checkFollower(auth()->user()))
                            @component('_components.followButton')
                                @slot('route', 'users.follow')
                                @slot('user', $user)
                                @slot('method', false)
                                @slot('value', 'Seguir')
                            @endcomponent
                        @else
                            @component('_components.followButton')
                                @slot('route', 'users.unfollow')
                                @slot('user', $user)
                                @slot('method', true)
                                @slot('value', 'Dejar de seguir')
                            @endcomponent
                        @endif
                    @endif

                @endauth
            </div>
        </div>
    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black m-10">Publicaciones</h2>
        <x-show-post :posts=$posts/>
    </section>
@endsection
