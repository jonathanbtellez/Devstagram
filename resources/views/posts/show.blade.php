@extends('layouts.app')

@section('title', $post->title)
@section('content')
    <div class="container mx-auto flex">
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
                <p class="mt-5 text-gray-700">{{ $post->description }}</p>
                <p class="font-bold">{{ $post->user->username }}</p>
                {{-- Method to do format to dates diffForHumans() by Carbon --}}
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
        <div class="md:w-1/2 p-3">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-2xl font-bold text-center mb-4">
                    Agrega un nuevo comentario
                </p>
                <form>
                    <div class="mb-5">
                        <label for="comment" class="mb-2 block uppercase text-gray-600 font-bold">
                            Comentario
                        </label>
                        {{-- We can use the directive @error to add class conditionaly --}}
                        <textarea
                        id="comment"
                          name="comment"
                          placeholder="Escribe tu opinion sobre esta publicacion"
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
            </div>
        </div>
    </div>
@endsection
