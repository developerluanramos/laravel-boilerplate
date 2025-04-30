<!-- resources/views/invitations/index.blade.php -->
<x-app-layout>
    <div class="mx-auto">
        {{ Breadcrumbs::render('users') }}
    </div>

    <div class="mx-auto mt-2">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4">
            @forelse($users as $user)
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
                                    {{$user->name}}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{$user->email}}
                                </p>
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="md:text-right lg:text-left lg:col-span-2">
                            <x-badge-role :role="$user->role"></x-badge-role>
                        </div>

                        <!-- Data -->
{{--                        <div class="text-gray-600 dark:text-gray-300 lg:col-span-2">--}}
{{--                            <div class="lg:hidden text-sm mb-1 text-gray-500 dark:text-gray-400">Data</div>--}}
{{--                            15/05/2023--}}
{{--                            @if(!$invitation->isExpired())--}}
{{--                                <div>--}}
{{--                                    <p class="text-sm text-gray-500 dark:text-gray-400">Expira em {{\Carbon\Carbon::create($invitation->expires_at)->diffForHumans()}}</p>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if($invitation->isUsed())--}}
{{--                                <div>--}}
{{--                                    <p class="text-sm text-gray-500 dark:text-gray-400">Usado</p>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}

                        <!-- Ações -->
                        <div class="md:text-right lg:col-span-2 flex justify-end gap-2">
                            <x-action-delete
                                :route="route('users.destroy', ['id' => $user->id])"
                                :identity="$user->id"></x-action-delete>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-gray-600 dark:text-gray-400">Nenhum convite encontrado</div>
            @endforelse
        </div>
    </div>
</x-app-layout>
