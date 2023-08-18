@extends('layouts.app')

@section('title')
    Perfil: {{ $user->username }}
@endsection

@section('content')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6-12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Imagen usuario" />
            </div>
            <div class="md:w-8/12 flex flex-col items-center md:justify-center md:items-start md:py-0 lg:w-6/12 px-5 py-10">
                <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal"> Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $posts->count() }}
                    <span class="font-normal"> Posts</span>
                </p>
            </div>
        </div>
    </div>
    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black m-10">Publicaciones</h2>
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-5 p-5">
                {{-- Iterate an array --}}
                @foreach($posts as $post)
                    {{-- <div>
                        <a href='#'> --}}
                            {{-- Construct the URL --}}
                            {{-- <img src={{ asset('uploads').'/'.$post->image }} alt='Imagen del post {{ $post->title }}'>

                        </a>
                    </div> --}}
                    {{-- Replace html for a component that can be use in others views --}}
                    @component('_components.imageCard')
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
