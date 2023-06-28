@extends('layouts.app')

@section('titulo')
Crea una nueva publicación
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        {{-- form para subir imagenes --}}
        @error('image')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
        @enderror
        <form
            id="dropzone"
            action="{{ route('images.store') }}"
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center @error('image') border-red-500 @enderror"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
        </form>
    </div>

    <div class="md:w-1/2 bg-white p-10 rounded-lg shadow-xl mt-10 md:mt-0">
        <form action="{{ route('posts.store') }}" method="POST" autocomplete="off" >
            @csrf
            <div class="mb-5">
                <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="Título de la publicación"
                    class="border p-2 w-full rounded-lg @error('title') border-red-500 @enderror"
                    value="{{ old('title') }}"
                />
                @error('title')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                <textarea
                    name="description"
                    id="description"
                    placeholder="Decripción de la publicación"
                    class="border p-2 w-full rounded-lg @error('description') border-red-500 @enderror"
                >
                    {{ old('description') }}
                </textarea>
                @error('description')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>

            <input type="hidden" name="image" id="image" value="{{ old('image') }}">

            <input
                type="submit"
                value="Publicar"
                class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg hover:cursor-pointer"
             />
        </form>
    </div>
</div>
@endsection