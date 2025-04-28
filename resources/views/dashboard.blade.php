<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Bem vindo, {{ auth()->user()->name}}
            </h2>
        </div>
    </x-slot>
</x-app-layout>
