@extends('layouts.app')

@section('titulo')
Reg&iacute;strate en DevStagram
@endsection
<!--
    Acentos
    &ntilde; ñ
    &aacute; á
    &eacute; é
    &iacute; í
    &oacute; ó
    &uacute; ú
-->
@section('contenido')
<div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen registro de usuarios">
    </div>
    <div class="md:w-4/12 bg-white rounded-lg shadow-xl p-6">
        <form action="{{ route('register') }}" method="POST" autocomplete="off" >
            @csrf
            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Tu Nombre"
                    class="border p-2 w-full rounded-lg @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}"
                />
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Usuario</label>
                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Tu Nombre de Usuario"
                    class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror"
                    value="{{ old('username') }}"
                />
                @error('username')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Tu Email de Registro"
                    class="border p-2 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contrase&ntilde;a</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Contrase&ntilde;a de Registro"
                    class="border p-2 w-full rounded-lg @error('password') border-red-500 @enderror"
                />
                @error('password')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contrase&ntilde;a</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Repite tu Contrase&ntilde;a"
                    class="border p-2 w-full rounded-lg"
                />
            </div>
            
            <input
                type="submit"
                value="Crear Cuenta"
                class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg hover:cursor-pointer"
            />
        </form>
    </div>
</div>
@endsection