@extends('layouts.app')

@section('title', $post->title)
@section('content')
    <div class="container mx-auto flex ">
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
                <p class="font-bold">{{ $post->user->username }}</p>
                {{-- Method to do format to dates diffForHumans() by Carbon --}}
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>
        </div>
        <div class="md:w-1/2 p-3">
            info
        </div>
    </div>
@endsection
