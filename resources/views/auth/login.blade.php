@extends('layouts.app')

@section('title')
    Ingresa a DevStragram
@endsection

@section('content')
    <div class="md:flex md:gap-10 md:items-center md:justify-center mb-3">
        <div class="md:w-6/12 p-5">
            {{-- asset let go to the public folder and use a source located here --}}
            <img src="{{ asset('img/login.jpg') }}" alt="Login image">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            {{-- with route we can navigate to named route --}}
            {{-- With post method we indicate that we are sending info --}}
            <form  action="{{ route('login') }}" method="POST" novalidate>
                @csrf

                {{-- Validate if the session includes a message session and print it --}}
                @if (session('message'))
                    <p class="bg-red-600 rounded text-sm text-white text-center mb-2">{{ session('message') }}</p>   
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">
                        Email
                    </label>
                    <input id="email" type="email" name="email" placeholder="correo@correo.com" value="{{ old('email') }}"
                        class="border p-3 w-full rounded-lg @error('email') border-red-800 @enderror" />
                    @error('email')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                        Contraseña
                    </label>
                    <input id="password" type="password" name="password" placeholder="Contraseña" 
                        class="border p-2 w-full rounded-lg @error('password') border-red-800 @enderror" />
                    @error('password')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="text-gray-500 text-sm"> Recuerdame</label>
                </div>
                <div class="mb-3">

                    <input type="submit" value="Iniciar sesion"
                        class="bg-gradient-to-r from-purple-400 to-blue-300 hover:from-pink-500 hover:to-yellow-500 transition-colors cursor-pointer uppercase font-bold p-2 w-full text-white rounded-lg">
                </div>
            </form>
        </div>
    </div>
@endsection