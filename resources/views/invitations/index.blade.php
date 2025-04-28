<!-- resources/views/invitations/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('invitations') }}
    </x-slot>
    <div class="max-w-7xl mx-auto">
        <a href="{{ route('invitations.create') }}" class="inline-flex">
            <button class="mt-2 w-full text-center content-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 whitespace-nowrap">
                <i class="fas fa-plus"></i>
                <span>Novo Convite</span>
            </button>
        </a>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4">
                @forelse($invitations as $invitation)
                    <!-- Item de Convite -->
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm hover:shadow-md dark:hover:shadow-lg transition-shadow">
                        <div class="p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-4 items-center">
                            <!-- Convidado -->
                            <div class="lg:col-span-6 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-300">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <p class="text-gray-800 dark:text-gray-100">
                                        {{$invitation->email}}
                                    </p>
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="md:text-right lg:text-left lg:col-span-2">
                                @if($invitation->isExpired())
                                    <x-badge-danger :texto="'Expirado'"></x-badge-danger>
                                @else
                                    <x-badge-success :texto="'Ativo'"></x-badge-success>
                                @endif
                            </div>

                            <!-- Data -->
                            <div class="text-gray-600 dark:text-gray-300 lg:col-span-2">
                                <div class="lg:hidden text-sm mb-1 text-gray-500 dark:text-gray-400">Data</div>
                                15/05/2023
                                @if(!$invitation->isExpired())
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Expira em {{\Carbon\Carbon::create($invitation->expires_at)->diffForHumans()}}</p>
                                </div>
                                @endif
                            </div>

                            <!-- Ações -->
                            <div class="md:text-right lg:col-span-2 flex justify-end gap-2">
{{--                                <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 p-2 rounded-full hover:bg-blue-50 dark:hover:bg-blue-900/50">--}}
{{--                                    <i class="fas fa-edit"></i>--}}
{{--                                </button>--}}
                                <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-900/50">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-600 dark:text-gray-400">Nenhum convite encontrado</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
