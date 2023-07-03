<div>
    @if($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['user' => $post->user, 'post' => $post]) }}">
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
</div>
