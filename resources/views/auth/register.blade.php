@extends('layouts.app')

@section('title')
    Registrate en DevStragram
@endsection

@section('content')
    <div class="md:flex md:gap-10 md:items-center md:justify-center mb-3">
        <div class="md:w-6/12 p-5">
            {{-- asset let go to the public folder and use a source located here --}}
            <img src="{{ asset('img/registrar.jpg')}}" alt="Regis5ter imagess">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            {{-- with route we can navigate to named route --}}
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-600 font-bold">
                        Nombre
                    </label>
                    <input id="name" type="text" name="name" placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-600 font-bold">
                        Username
                    </label>
                    <input id="username" type="text" name="username" placeholder="Username"
                        class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-600 font-bold">
                        Email
                    </label>
                    <input id="email" type="email" name="email" placeholder="correo@correo.com"
                        class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-600 font-bold">
                        Contraseña
                    </label>
                    <input id="password" type="password" name="password" placeholder="Contraseña"
                        class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-600 font-bold">
                        Repetir contraseña
                    </label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Contraseña"
                        class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-3">

                    <input type="submit" value="Crear cuenta"
                        class="bg-gradient-to-r from-purple-400 to-blue-300 hover:from-pink-500 hover:to-yellow-500 transition-colors cursor-pointer uppercase font-bold p-3 w-full text-white rounded-lg">
                </div>

            </form>
        </div>
    </div>
@endsection
