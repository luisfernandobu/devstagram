@extends('layouts.app')

@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6 mt-10 md:mt-0">
            <form action="{{ route('profile.store', auth()->user()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Usuario</label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        placeholder="Tu Nombre de Usuario"
                        class="border p-2 w-full rounded-lg @error('username') border-red-500 @enderror"
                        @if (old('username'))
                            value="{{ old('username') }}"
                        @else
                            value="{{ auth()->user()->username }}"
                        @endif
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="profileImage" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input
                        type="file"
                        name="profileImage"
                        id="profileImage"
                        class="border p-2 w-full rounded-lg @error('profileImage') border-red-500 @enderror"
                        value=""
                        accept=".jpg, .jpeg, .png"
                    />
                    @error('profileImage')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <input
                    type="submit"
                    value="Guardar"
                    class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg hover:cursor-pointer"
                />
            </form>
        </div>
    </div>
@endsection