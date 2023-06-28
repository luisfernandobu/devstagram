@extends('layouts.app')

@section('titulo')
Perfil: {{ $user->username }}
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5">
            <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario">
        </div>
        <div class="md:w-4/12 lg:w-6/12 px-5 flex flex-col items-center py-10 md:justify-center md:items-start md:py-10">
            <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

            <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                0
                <span class="font-normal"> Seguidores</span>
            </p>

            <p class="text-gray-800 text-sm mb-3 font-bold">
                0
                <span class="font-normal"> Siguiendo</span>
            </p>

            <p class="text-gray-800 text-sm mb-3 font-bold">
                0
                <span class="font-normal"> Publicaciones</span>
            </p>
        </div>
    </div>
</div>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

    @if($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="">
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen de post {{ $post->title }}">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="m-5">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center text-gray-600 text-sm">Sin publicaciones para mostrar</p>
    @endif

</section>
@endsection
