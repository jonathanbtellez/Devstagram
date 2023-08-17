@extends('layouts.app')

@section('title')
    Crea una nueva publicacion
@endsection

@push('styles')
    {{-- Send a list of styles or scripts to the stack directive using push directive --}}
    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@endpush

@section('content')
    <div class="md:flex md:items-center mb-5">
        <div class="md:w-1/2 px-10">

            {{-- Dropzone always need a endpoint to save the image --}}
            <form
              action="{{route('images.store')}}"
              method="POST"
            {{-- the attr enctype is required when we are send multimedia files  --}}
              enctype="multipart/form-data"
              id='dropzone'
              class="dropzone border-dashed border-2 w-full h-96 rounded flex bg-purple-200
                flex-col justify-center items-center">

                {{-- @csrf Sure manage of forms --}}
                @csrf
            </form>
            @error('image')
            {{-- $message variable contain a message give for the error --}}
            <span class="text-red-800 text-sm text-center">{{ $message }}</span>
        @enderror
        </div>
        <div class="md:w-1/2 p-10  mt-10 md:mt-0  bg-white rounded-lg shadow-xl">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-600 font-bold">
                        Titulo
                    </label>
                    {{-- We can use the directive @error to add class conditionaly --}}
                    <input id="title" type="text" name="title" {{-- The helper old return the value sended before --}} value="{{ old('name') }}"
                        placeholder="Titulo"
                        class="border p-2 w-full rounded-lg  @error('title') border-red-800 @enderror" 
                        value="{{old('title')}}"/>
                    {{-- If the field validation have a error the message below will be show --}}
                    @error('title')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-600 font-bold">
                        Descripcion
                    </label>
                    {{-- We can use the directive @error to add class conditionaly --}}
                    <textarea id="description" name="description" {{-- The helper old return the value sended before --}} value="{{ old('name') }}"
                        placeholder="Descripcion"
                        class="border p-2 w-full rounded-lg  @error('description') border-red-800 @enderror" 
                        >{{old('description')}}</textarea>
                    {{-- If the field validation have a error the message below will be show --}}
                    @error('description')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <input
                      name="image"
                      type="hidden"
                      value="{{old('image')}}">
                </div>
                <div class="mb-3">

                    <input type="submit" value="Crear publicacion"
                        class="bg-gradient-to-r from-purple-400 to-blue-300 hover:from-pink-500 hover:to-yellow-500 transition-colors cursor-pointer uppercase font-bold p-2 w-full text-white rounded-lg">
                </div>
            </form>
        </div>

    </div>
@endsection