<x-guest-layout>
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

    <!-- Error Message -->
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300">
            <div class="flex items-center">
                {{--                        <x-heroicon-o-exclamation-circle class="h-5 w-5 mr-2" />--}}
                <strong>{{session('error')}}</strong>
            </div>
        </div>
    @endif
    <form
        method="POST" action="{{ route('register.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="role" value="{{ $role }}">

        <div>
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="'Nome'" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="'Email'" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="'Senha'" />

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirme a senha')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                    Já é cadastrado?
                </a>

                <x-primary-button class="ms-4">
                    REGISTRAR
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>

