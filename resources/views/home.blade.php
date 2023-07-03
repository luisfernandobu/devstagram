@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen de post {{ $post->title }}">
                    </a>
                    <p class="mt-1">
                        <a href="{{ route('posts.index', $post->user) }}" class="font-bold">{{ $post->user->username }}</a>
                         {{ $post->title }}
                    </p>
                    <p class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        </div>

        <div class="m-5">
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center">Sin publicaciones para mostrar</p>
    @endif
@endsection
