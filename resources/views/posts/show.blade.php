@extends('layouts.app')

@section('title', $post->title)
@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2 p-3">
            @component('_components.imageCard')
                @slot('useUrl', false)

                {{-- Redirect to post/{id} view --}}
                @slot('path', 'posts.show')
                @slot('params', ['post' => $post, 'user' => $user])

                {{-- Show info of the image in our view --}}
                @slot('image', $post->image)
                @slot('title', $post->title)
            @endcomponent
            <div class="p-3">
                0 likes
            </div>
            <div>
                <p class="text-gray-700">{{ $post->description }}</p>
                <p class="font-bold">{{ $post->user->username }}</p>
                {{-- Method to do format to dates diffForHumans() by Carbon --}}
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            {{-- Check if the are auth user --}}
            @auth
                @if($post->user_id === auth()->user()->id)
                <form action="{{route('posts.destroy', $post)}}" method="POST" >
                    {{-- Method Spoofing allow use other type of method differents to get and post ex. delete, patch, put--}}
                    @method('DELETE')
                    @csrf
                    <div class="mb-3 mt-2">
                        <input type="submit" value="Eliminar post"
                            class="bg-gradient-to-r hover:from-pink-600 hover:to-yellow-600 from-pink-500 to-yellow-500 transition-colors cursor-pointer uppercase font-bold p-2 text-white rounded-lg" />
                    </div>
                </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-3">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-2xl font-bold text-center mb-4">
                        Agrega un nuevo comentario
                    </p>

                    @if (session('message'))
                        <div class="bg-purple-300 p-2 text-sm rounded-lg mb-4 text-white text-center font-semibold uppercase">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comment" class="mb-2 block uppercase text-gray-600 font-bold">
                                Comentario
                            </label>
                            {{-- We can use the directive @error to add class conditionaly --}}
                            <textarea id="comment" name="comment" placeholder="Escribe tu opinion sobre esta publicacion"
                                class="border p-2 w-full rounded-lg  @error('comment') border-red-800 @enderror"></textarea>
                            {{-- If the field validation have a error the message below will be show --}}
                            @error('comment')
                                {{-- $message variable contain a message give for the error --}}
                                <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Comentar"
                                class="bg-gradient-to-r from-purple-400 to-blue-300 hover:from-pink-500 hover:to-yellow-500 transition-colors cursor-pointer uppercase font-bold p-2 w-full text-white rounded-lg">
                        </div>
                    </form>
                @endauth
                @if ($post->comments->count())
                    <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-5">
                        @foreach ($post->comments as $comment)
                            @component('posts._components.commentCard')
                                @slot('comment', $comment->comment)
                                @slot('user', $comment->user->username)
                                @slot('dateComment', $comment->created_at)
                            @endcomponent
                        @endforeach
                    @else
                        <p class="text-center p-10">No hay comentarios</p>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
