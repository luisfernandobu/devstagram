@extends('layouts.app')

@section('titulo')
    {{ $post->title }}
@endsection

@section('contenido')
    <div class="md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads').'/'.$post->image }}" alt="Imagen de post {{$post->title}}">

            <div class="p-3 flex items-center gap-4">
                @auth

                    @if ($post->ckeckLike(Auth::user()))
                        <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="my-3">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('posts.likes.store', $post) }}" method="POST">
                            @csrf
                            <div class="my-3">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif

                @endauth
                <p><span class="font-bold">{{ $post->likes()->count() }}</span> Likes</p>
            </div>

            <div class="">
                <a href="{{ route('posts.index', $post->user) }}" class="font-bold">{{ $post->user->username }}</a>
                <p class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->description }}</p>
            </div>

            @auth
                @if (auth()->user()->id == $post->user_id)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            value="Eliminar publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold uppercase mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth

        </div>

        <div class="md:w-1/2 p-5">
            <div class="bg-white shadow p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                    @if(session('mensaje'))
                        <p class="bg-green-500 text-white my-3 rounded-lg font-bold p-2 text-center uppercase">{{ session('mensaje') }}</p>
                    @endif

                    <div class="mb-5">
                        <form action="{{ route('comments.store', ['user' => $user, 'post' => $post]) }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">Comentario</label>
                                <textarea
                                    name="comment"
                                    id="comment"
                                    placeholder="Agrea un nuevo comentario"
                                    class="border p-2 w-full rounded-lg @error('comment') border-red-500 @enderror"
                                ></textarea>

                                @error('comment')
                                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                                @enderror
                            </div>

                            <input
                                type="submit"
                                value="Comentar"
                                class="bg-sky-600 hover:bg-sky-700 uppercase font-bold w-full p-3 text-white rounded-lg hover:cursor-pointer"
                            />
                        </form>
                    </div>
                @endauth

                <p class="text-xl font-bold text-center">Comentarios</p>
                
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-5">
                    @if ($post->comments->count())
                        @foreach ($post->comments as $comment)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', ['user' => $comment->user]) }}" class="font-bold">{{ $comment->user->username }}</a>
                                <p>{{ $comment->comment }}</p>
                                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">Sin comentarios para mostrar</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection