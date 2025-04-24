<!-- resources/views/invitations/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Criar Novo Convite
            </h2>
            <a href="{{ route('invitations.index') }}" class="btn-secondary">
{{--                <x-heroicon-o-arrow-left class="w-4 h-4 mr-1" />--}}
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Mensagens de Status -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-300">
                    <div class="flex items-center">
{{--                        <x-heroicon-o-check-circle class="h-5 w-5 mr-2" />--}}
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300">
                    <div class="flex items-center">
{{--                        <x-heroicon-o-exclamation-circle class="h-5 w-5 mr-2" />--}}
                        <strong>Ops!</strong>
                    </div>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulário -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('invitations.store') }}" class="p-6">
                    @csrf

                    <!-- Email -->
                    <div class="mb-6">
                        <x-input-label for="email" :value="__('Email do Convidado')" />
                        <x-text-input
                            id="email"
                            name="email"
                            type="email"
                            class="mt-1 block w-full"
                            :value="old('email')"
                            required
                            autofocus
                            placeholder="exemplo@dominio.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Perfil -->
                    <div class="mb-6">
                        <x-input-label for="role" :value="__('Perfil')" />
                        <select
                            id="role"
                            name="role"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            required>
                            <option value="" disabled selected>Selecione um perfil</option>
                            <option value="secretario" @selected(old('role') == 'secretario')>Secretário</option>
                            <option value="professor" @selected(old('role') == 'professor')>Professor</option>
                            <option value="auxiliar" @selected(old('role') == 'auxiliar')>Auxiliar</option>
                            <option value="superintendente" @selected(old('role') == 'superintendente')>Superintendente</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Validade -->
                    <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/30 rounded-lg">
                        <div class="flex items-center">
{{--                            <x-heroicon-o-information-circle class="h-5 w-5 text-blue-500 dark:text-blue-400 mr-2" />--}}
                            <span class="text-sm text-blue-700 dark:text-blue-300">
                                Este convite será válido por 24 horas após a criação
                            </span>
                        </div>
                    </div>

                    <!-- Ações -->
                    <div class="flex items-center justify-end">
                        <x-primary-button class="ml-4">
{{--                            <x-heroicon-o-paper-airplane class="w-4 h-4 mr-2" />--}}
                            {{ __('Enviar Convite') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
