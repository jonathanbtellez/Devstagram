{{-- Use directive @extends to get a main layout --}}
{{-- To use blade you don use end the sentences with semicolon --}}
{{-- To navigate in routes you dont use / you need use . --}}
@extends('layouts.app')

{{-- @section is use to populate the yield directive and this need have the same 'identifier' --}}
@section('title')
    inicio
    {{-- Ending the send of data to the yield --}}
@endsection

@section('content')

    {{-- :prop=variable sendind data to components--}}
    <x-show-post :posts="$posts" />
    {{-- For else directive do a conditional iteration when the array have content show the content if no show the content of empty directive --}}
    {{-- @forelse ($posts as $post)
        <h2>{{ $post->title }}</h2>
    @empty
        <h2>No hay posts</h2>
    @endforelse --}}
@endsection
