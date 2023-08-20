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
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-5 p-5">
                {{-- Iterate an array --}}
                @foreach ($posts as $post)
                    {{-- <div>
                        <a href='#'> --}}
                    {{-- Construct the URL --}}
                    {{-- <img src={{ |asset('uploads').'/'.$post->image }} alt='Imagen del post {{ $post->title }}'>

                        </a>
                    </div> --}}
                    {{-- Replace html for a component that can be use in others views --}}
                    @component('_components.imageCard')
                        {{-- Puth a condition to use or not ancor tag --}}
                        @slot('useUrl', true)

                        {{-- Redirect to post/{id} view --}}
                        @slot('path', 'posts.show')
                        @slot('params', ['post' => $post, 'user' => $user])

                        {{-- Show info of the image in our view --}}
                        @slot('image', $post->image)
                        @slot('title', $post->title)
                    @endcomponent
                @endforeach
            </div>
            <div class="p-5">
                {{-- Show the pagination in the template --}}
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold my-7">No hay posts</p>
        @endif
    </section>
@endsection
