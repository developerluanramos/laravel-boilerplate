{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--        <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--        <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--        <!-- Fonts -->--}}
{{--        <link rel="preconnect" href="https://fonts.bunny.net">--}}
{{--        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}

{{--        <!-- Scripts -->--}}
{{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
{{--    </head>--}}
{{--    <body class="font-sans antialiased text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-900">--}}
{{--    <div class="flex h-screen w-full">--}}
{{--        <!-- Botão de toggle para mobile -->--}}
{{--        <button id="menu-toggle" class="fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--            </svg>--}}
{{--        </button>--}}

{{--        <button id="menu-desktop-toggle" class="fixed top-4 left-4 z-50 p-2 bg-gray-800 text-white rounded">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--            </svg>--}}
{{--            aqui--}}
{{--        </button>--}}
{{--        <!-- Menu Lateral -->--}}
{{--        <aside id="sidebar" class="fixed h-full w-64 bg-gray-800 text-white transition-all duration-300 transform -translate-x-full md:translate-x-0">--}}
{{--            <!-- Área do Usuário Logado -->--}}
{{--            <div class="flex flex-col items-center py-6 border-b border-gray-700">--}}
{{--                <div class="w-16 h-16 rounded-full bg-gray-600 flex items-center justify-center mb-3">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <h3 class="text-lg font-semibold">{{ auth()->user()->name }}</h3>--}}
{{--                <p class="text-sm text-gray-400">{{ auth()->user()->email }}</p>--}}
{{--            </div>--}}

{{--            <nav class="mt-6">--}}
{{--                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">--}}
{{--                    <a href="{{route('dashboard')}}" class="block">--}}
{{--                        <i class="fa fa-tachometer" aria-hidden="true"></i>--}}
{{--                        Dashboard--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer">--}}
{{--                    <a href="{{route('invitations.index')}}" class="block">--}}
{{--                        <i class="fa fa-address-card" aria-hidden="true"></i> Convites--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-700 bg-gray-800">--}}
{{--                <button class="">--}}
{{--                    <i class="fa fa-sign-out" aria-hidden="true"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </aside>--}}

{{--        <!-- Conteúdo Principal com overlay quando menu aberto -->--}}
{{--        <main id="main-content" class="w-full flex-1 transition-all duration-300 ml-0 md:ml-64 p-2">--}}
{{--            <!-- Mensagens de Status -->--}}
{{--            @if (session('success'))--}}
{{--                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-300">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <i class="fa fa-check" aria-hidden="true"></i> &nbsp; {{ session('success') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if (session('error'))--}}
{{--                <div class="mb-6 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; {{session('error')}}</strong>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if ($errors->any())--}}
{{--                <div class="mb-6 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300">--}}
{{--                    <div class="flex items-center">--}}
{{--                        <strong><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; Ops!</strong>--}}
{{--                    </div>--}}
{{--                    <ul class="mt-2 list-disc list-inside text-sm">--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if (isset($header))--}}
{{--                <header class="bg-transparent dark:bg-transparent-800">--}}
{{--                    {{ $header }}--}}
{{--                </header>--}}
{{--            @endif--}}
{{--            <!-- Conteúdo principal -->--}}
{{--            {{ $slot }}--}}
{{--        </main>--}}
{{--    </div>--}}

{{--    <script>--}}

{{--        // Controle do menu mobile--}}
{{--        document.getElementById('menu-toggle').addEventListener('click', function() {--}}
{{--            const sidebar = document.getElementById('sidebar');--}}
{{--            sidebar.classList.toggle('-translate-x-full');--}}
{{--        });--}}

{{--        // Controle do menu desktop (opcional)--}}
{{--        document.getElementById('menu-desktop-toggle').addEventListener('click', function() {--}}
{{--            const sidebar = document.getElementById('sidebar');--}}
{{--            const mainContent = document.getElementById('main-content');--}}

{{--            sidebar.classList.toggle('md:w-64');--}}
{{--            sidebar.classList.toggle('md:w-0');--}}
{{--            sidebar.classList.toggle('md:overflow-hidden');--}}

{{--            mainContent.classList.toggle('md:ml-64');--}}
{{--            mainContent.classList.toggle('md:ml-0');--}}
{{--        });--}}


{{--        // Verifica preferência do usuário--}}
{{--        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
{{--            document.documentElement.classList.add('dark')--}}
{{--        } else {--}}
{{--            document.documentElement.classList.remove('dark')--}}
{{--        }--}}

{{--        // Opcional: Função para alternar manualmente--}}
{{--        function toggleDarkMode() {--}}
{{--            const isDark = document.documentElement.classList.toggle('dark')--}}
{{--            localStorage.theme = isDark ? 'dark' : 'light'--}}
{{--        }--}}
{{--    </script>--}}
{{--    </body>--}}
{{--</html>--}}


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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .sidebar-transition {
            transition: transform 0.3s ease, margin-left 0.3s ease;
        }
        #menu-toggle-floating {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 40;
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }
        .sidebar-closed #menu-toggle-floating {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 dark:text-gray-200 bg-gray-100 dark:bg-gray-900">
<div class="flex h-screen w-full">
    <!-- Menu Lateral -->
    <aside id="sidebar" class="fixed h-full w-64 bg-gray-800 text-white sidebar-transition z-30 shadow-xl">
        <!-- Botão de toggle único (sempre visível quando menu aberto) -->
        <button id="menu-toggle" class="absolute top-4 right-0 transform translate-x-1/2 bg-gray-700 hover:bg-gray-600 text-white rounded-full p-2 z-50 transition-colors shadow-md">
            <svg id="toggle-icon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Conteúdo do Menu -->
        <div class="flex flex-col h-full">
            <div class="flex flex-col items-center py-6 border-b border-gray-700 px-4">
                <div class="w-16 h-16 rounded-full bg-gray-600 flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-center">
                    <a href="{{route('profile')}}" class="block flex items-center">
                        {{ auth()->user()->name }}
                    </a>
                </h3>
                <p class="text-sm text-gray-400 text-center">{{ auth()->user()->email }}</p>
            </div>

            <nav class="mt-6 flex-1 overflow-y-auto">
                <div class="px-4 py-3 hover:bg-gray-700 cursor-pointer transition-colors">
                    <a href="{{route('dashboard')}}" class="block flex items-center">
                        <i class="fas fa-tachometer-alt w-5 mr-3 text-center"></i>
                        Dashboard
                    </a>
                </div>
                <div class="px-4 py-3 hover:bg-gray-700 cursor-pointer transition-colors">
                    <a href="{{route('invitations.index')}}" class="block flex items-center">
                        <i class="fas fa-address-card w-5 mr-3 text-center"></i>
                        Convites
                    </a>
                </div>
            </nav>

            <!-- Botão de Logout -->
            <div class="p-4 border-t border-gray-700 bg-gray-800">
                <form method="POST" action="">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700 cursor-pointer flex items-center transition-colors rounded">
                        <i class="fas fa-sign-out-alt w-5 mr-3 text-center"></i>
                        Sair
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Botão flutuante (aparece suavemente quando menu fechado) -->
    <button id="menu-toggle-floating" class="p-2 bg-gray-800 hover:bg-gray-700 text-white rounded-full shadow-lg transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Conteúdo Principal -->
    <main id="main-content" class="w-full flex-1 sidebar-transition ml-0 p-4">
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
                {{ $header }}
            </header>
        @endif
        {{ $slot }}
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const toggleIcon = document.getElementById('toggle-icon');
        const menuToggle = document.getElementById('menu-toggle');
        const floatingToggle = document.getElementById('menu-toggle-floating');

        // Verifica preferência do usuário ou usa padrão
        const menuState = localStorage.getItem('menuState');
        const isMobile = window.innerWidth < 768;

        function openMenu() {
            sidebar.classList.remove('-translate-x-full', 'sidebar-closed');
            mainContent.classList.add('md:ml-64');
            toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />';
            localStorage.setItem('menuState', 'open');
        }

        function closeMenu() {
            sidebar.classList.add('-translate-x-full', 'sidebar-closed');
            mainContent.classList.remove('md:ml-64');
            toggleIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />';
            localStorage.setItem('menuState', 'closed');
        }

        // Inicialização
        if (menuState === 'closed') {
            closeMenu();
        } else if (menuState === 'open') {
            openMenu();
        } else {
            // Comportamento padrão
            isMobile ? closeMenu() : openMenu();
        }

        // Controle único do menu
        function toggleMenu() {
            sidebar.classList.contains('-translate-x-full') ? openMenu() : closeMenu();
        }

        // Event listeners
        menuToggle.addEventListener('click', toggleMenu);
        floatingToggle.addEventListener('click', toggleMenu);

        // Atualização responsiva
        window.addEventListener('resize', function() {
            if (!localStorage.getItem('menuState')) {
                window.innerWidth < 768 ? closeMenu() : openMenu();
            }
        });
    });
</script>
</body>
</html>
