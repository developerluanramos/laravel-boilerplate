<!-- resources/views/invitations/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Gerenciamento de Convites
            </h2>
            <a href="{{ route('invitations.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Novo Convite
            </a>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Mensagens de Status -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-300">
                    <div class="flex items-center">
{{--                        <x-heroicon-o-check-circle class="h-5 w-5 mr-2" />--}}
                        {{ session('success') }}
                    </div>
                </div>
            @endif

        @if($invitations->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900 dark:text-gray-100">Nenhum convite encontrado</h3>
                    <p class="mt-1 text-gray-500 dark:text-gray-400">Comece criando um novo convite.</p>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-1 lg:grid-cols-1">
                    @foreach($invitations as $invitation)
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden border-l-4
                                  @if($invitation->registered_at) border-green-500
                                  @elseif($invitation->isExpired()) border-red-500
                                  @else border-yellow-500 @endif">
                            <div class="p-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-indigo-100 dark:bg-indigo-900 rounded-md p-2">
                                        <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 truncate">
                                                {{ $invitation->email }}
                                            </h3>
                                            <span class="px-2 py-1 text-xs rounded-full
                                                      @if($invitation->role === 'secretario') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-100
                                                      @elseif($invitation->role === 'professor') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-100
                                                      @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100 @endif">
                                                {{ ucfirst($invitation->role) }}
                                            </span>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                            Criado {{ $invitation->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-4 grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</p>
                                        <p class="mt-1 text-sm font-medium
                                                  @if($invitation->registered_at) text-green-600 dark:text-green-400
                                                  @elseif($invitation->isExpired()) text-red-600 dark:text-red-400
                                                  @else text-yellow-600 dark:text-yellow-400 @endif">
                                            @if($invitation->registered_at)
                                                Registrado
                                            @elseif($invitation->isExpired())
                                                Expirado
                                            @else
                                                Pendente
                                            @endif
                                        </p>
                                        <small class="mt-1 text-sm text-gray-900 dark:text-gray-100">expira em
                                            {{ \Carbon\Carbon::create($invitation->expires_at)->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </div>

                            @if(!$invitation->registered_at && !$invitation->isExpired())
                                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 flex justify-end space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if($invitations->hasPages())
                    <div class="mt-6">
                        {{ $invitations->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-app-layout>
