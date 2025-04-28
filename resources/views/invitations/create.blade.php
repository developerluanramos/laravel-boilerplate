<!-- resources/views/invitations/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('invitations.create') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto ">
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
                            @foreach(\App\Enums\ProfilesEnum::cases() as $profile)
                                <option value="{{$profile->value}}" @selected(old('role') == $profile->value)>
                                    {{$profile->name}}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
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
