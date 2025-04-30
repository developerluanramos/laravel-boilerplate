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
</body>
</html>
