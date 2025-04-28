<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-900">
    <div class="flex h-screen">
        <!-- Botão de toggle para mobile -->
        <button id="menu-toggle" class="fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Menu Lateral -->
        <aside id="sidebar" class="fixed h-full w-64 bg-gray-800 text-white transition-all duration-300 transform -translate-x-full md:translate-x-0">
            <!-- Área do Usuário Logado -->
            <div class="flex flex-col items-center py-6 border-b border-gray-700">
                <div class="w-16 h-16 rounded-full bg-gray-600 flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold">{{ auth()->user()->name }}</h3>
                <p class="text-sm text-gray-400">{{ auth()->user()->email }}</p>
            </div>

            <nav class="mt-6">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                    <a href="{{route('dashboard')}}" class="block">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        Dashboard
                    </a>
                </div>
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">
                    <a href="{{route('invitations.index')}}" class="block">
                        <i class="fa fa-address-card" aria-hidden="true"></i> Convites
                    </a>
                </div>
            </nav>
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700 bg-gray-800">
                <button class="">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </button>
            </div>
        </aside>

        <!-- Conteúdo Principal com overlay quando menu aberto -->
        <main id="main-content" class="flex-1 transition-all duration-300 ml-0 md:ml-64 p-2">
            <!-- Mensagens de Status -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-300">
                    <div class="flex items-center">
                        <i class="fa fa-check" aria-hidden="true"></i> &nbsp; {{ session('success') }}
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300">
                    <div class="flex items-center">
                        <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; {{session('error')}}</strong>
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300">
                    <div class="flex items-center">
                        <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; Ops!</strong>
                    </div>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (isset($header))
                <header class="bg-transparent dark:bg-transparent-800">
{{--                    <div class="max-w-7xl mx-auto py-2 px-2 sm:px-2 lg:px-8">--}}
                        {{ $header }}
{{--                    </div>--}}
                </header>
            @endif
            <!-- Conteúdo principal -->
            {{ $slot }}
        </main>
    </div>

{{--    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">--}}
{{--        <livewire:layout.navigation />--}}


{{--        <!-- Page Content -->--}}
{{--        <main class="bg-gray-100 dark:bg-gray-900">--}}
{{--            {{ $slot }}--}}
{{--        </main>--}}
{{--    </div>--}}

    <script>

        // Controle do menu mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Controle do menu desktop (opcional)
        // document.getElementById('menu-toggle').addEventListener('click', function() {
        //     const sidebar = document.getElementById('sidebar');
        //     const mainContent = document.getElementById('main-content');
        //
        //     sidebar.classList.toggle('md:w-64');
        //     sidebar.classList.toggle('md:w-0');
        //     sidebar.classList.toggle('md:overflow-hidden');
        //
        //     mainContent.classList.toggle('md:ml-64');
        //     mainContent.classList.toggle('md:ml-0');
        // });


        // Verifica preferência do usuário
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }

        // Opcional: Função para alternar manualmente
        function toggleDarkMode() {
            const isDark = document.documentElement.classList.toggle('dark')
            localStorage.theme = isDark ? 'dark' : 'light'
        }
    </script>
    </body>
</html>
