<x-portal-layout>
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif
    </header>
</x-portal-layout>
