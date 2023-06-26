@extends('layouts.app')

@section('titulo')
Inicia Sesión en DevStagram
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
        <img src="{{ asset('img/login.jpg') }}" alt="Imagen login de usuarios">
    </div>
    <div class="md:w-4/12 bg-white rounded-lg shadow-xl p-6">
        <form action="{{ route('login') }}" method="POST" autocomplete="off" >
            @csrf
            @if (session('mensaje'))
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
            @endif
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
                <input type="checkbox" name="remember" id="remember"/>
                <label for="remember" class="text-gray-500 text-md">Mantener mi sesión activa</label>
            </div>
            
            <input
                type="submit"
                value="Iniciar Sesión"
                class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg hover:cursor-pointer"
            />
        </form>
    </div>
</div>
@endsection