<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        
        <title>DevStagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto">
                <nav class="">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                        <a href="{{ route('home') }}">
                            <h1 class="text-3xl font-black">DevStagram</h1>
                        </a>

                        <button id="btnNavegacion" data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </button>

                        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                            <ul class="flex flex-col gap-1 md:gap-0 font-medium items-center p-4 border border-gray-300 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-5 md:mt-0 md:border-0">
                                @auth
                                    <li>
                                        <a
                                            href="{{ route('posts.create') }}"
                                            class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold cursor-pointer hover:bg-gray-50"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                            </svg>
                                            Crear
                                        </a>
                                    </li>
                                    <li>
                                        <p class="font-bold text-gray-600 text-sm p-2">Hola:
                                            <a class="font-normal hover:underline" href="{{ route('posts.index', Auth::user()->username) }}">
                                                {{ Auth::user()->username }}
                                            </a>
                                        </p>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm p-2">Cerrar Sesión</button>
                                        </form>
                                    </li>
                                @endauth
                                @guest
                                    <li>
                                        <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm p-2">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm p-2">Crear cuenta</a>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </header>

        <main class="container lg:px-6 mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Derechos reservados {{ now()->year }}
        </footer>

        @vite('resources/js/app.js')
        @livewireScripts
    </body>
</html>
