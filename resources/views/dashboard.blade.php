@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                @if ($user->profileImage)
                    <img src="{{ asset('profiles') . '/' . $user->profileImage }}" alt="Imagen de usuario" class="rounded-full">
                @else
                    <img src="{{ asset('img/usuario.svg') }}" alt="Imagen de usuario" class="rounded-full">
                @endif
            </div>
            <div class="md:w-4/12 lg:w-6/12 px-5 flex flex-col items-center py-10 md:justify-center md:items-start md:py-10">
                <div class="flex gap-2 items-center">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('profile.index', $user) }}" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                    0
                    <span class="font-normal"> Seguidores</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class="font-normal"> Siguiendo</span>
                </p>

                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }}
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
                        <a href="{{ route('posts.show', ['user' => $user, 'post' => $post]) }}">
                            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen de post {{ $post->title }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="m-5">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-center text-gray-600">Sin publicaciones para mostrar</p>
        @endif
    </section>
@endsection
