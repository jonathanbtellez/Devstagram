@extends('layouts.app')

@section('title')
    Registrate en DevStragram
@endsection

@section('content')
    <div class="md:flex md:gap-10 md:items-center md:justify-center mb-3">
        <div class="md:w-6/12 p-5">
            {{-- asset let go to the public folder and use a source located here --}}
            <img src="{{ asset('img/registrar.jpg') }}" alt="Regis5ter imagess">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            {{-- with route we can navigate to named route --}}
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">
                        Nombre
                    </label>
                    {{-- We can use the directive @error to add class conditionaly --}}
                    <input id="name" type="text" name="name" {{-- The helper old return the value sended before --}} value="{{ old('name') }}"
                        placeholder="Tu nombre"
                        class="border p-2 w-full rounded-lg  @error('name') border-red-800 @enderror" />
                    {{-- If the field validation have a error the message below will be show --}}
                    @error('name')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Username
                    </label>
                    <input id="username" type="text" name="username" placeholder="Username" value="{{ old('username') }}"
                        class="border p-2 w-full rounded-lg @error('username') border-red-800 @enderror" />
                    @error('username')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
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
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold">
                        Repetir contraseña
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Contraseña"
                        class="border p-2 w-full rounded-lg @error('password_confirmation') border-red-800 @enderror" />
                    @error('password_confirmation')
                        {{-- $message variable contain a message give for the error --}}
                        <span class="text-red-800 text-sm text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">

                    <input type="submit" value="Crear cuenta"
                        class="bg-gradient-to-r from-purple-400 to-blue-300 hover:from-pink-500 hover:to-yellow-500 transition-colors cursor-pointer uppercase font-bold p-2 w-full text-white rounded-lg">
                </div>
            </form>
        </div>
    </div>
@endsection
