@extends('layouts.app')

@section('title')
    Editar perfil: {{ auth()->user()->username }}
@endsection
@section('content')
    <div class="md:flex md:justify-center p-3 md:p-0">
        <div class="md:1/2 bg-white shadow p-6 mb-5 md:m-12">
            <form class="mt-10 md:mt-0" action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Username
                    </label>
                    {{-- We can use the directive @error to add class conditionaly --}}
                    <input id="username" type="text" name="username" {{-- The helper old return the value sended before --}}
                        value="{{ auth()->user()->username }}" placeholder="Escribe tu username"
                        class="border p-2 w-full rounded-lg  @error('username') border-red-800 @enderror" />
                    {{-- If the field validation have a error the message below will be show --}}
                    @error('username')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">
                        Email
                    </label>
                    {{-- We can use the directive @error to add class conditionaly --}}
                    <input id="email" type="text" name="email" {{-- The helper old return the value sended before --}}
                        value="{{ auth()->user()->email }}" placeholder="Escribe tu email"
                        class="border p-2 w-full rounded-lg  @error('email') border-red-800 @enderror" />
                    {{-- If the field validation have a error the message below will be show --}}
                    @error('email')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="image" class="mb-2 block uppercase text-gray-600 font-bold">
                        Imagen perfile
                    </label>
                    {{-- We can use the directive @error to add class conditionaly --}}
                    <input id="image" type="file" name="image" accept=".jpg, jpeg, .png"
                        class="border p-2 w-full rounded-lg" />
                    {{-- If the field validation have a error the message below will be show --}}
                </div>
                <div class="mb-5">
                    <label for="newPassword" class="mb-2 block uppercase text-gray-600 font-bold">
                        Nueva contraseña
                    </label>
                    <input id="newPassword" type="password" name="newPassword" placeholder="Nueva contraseña"
                        class="border p-2 w-full rounded-lg @error('newPassword') border-red-800 @enderror" />
                    @error('newPassword')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                        Contraseña actual
                    </label>
                    <input id="password" type="password" name="password" placeholder="Contraseña actual"
                        class="border p-2 w-full rounded-lg @error('password') border-red-800 @enderror" />
                    @error('password')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                @if (session('message'))
                    <p class="bg-red-600 rounded text-sm text-white text-center my-2">{{ session('message') }}
                    </p>
                @endif
                @if (session('failChangePassword'))
                    <p class="bg-red-600 rounded text-sm text-white text-center my-2">{{ session('failChangePassword') }}
                    </p>
                @endif
                <div class="mb-3">
                    <input type="submit" value="Editar perfile"
                        class="bg-gradient-to-r from-purple-400 to-blue-300 hover:from-pink-500 hover:to-yellow-500 transition-colors cursor-pointer uppercase font-bold p-2 w-full text-white rounded-lg">
                </div>
            </form>
        </div>
    </div>
@endsection
