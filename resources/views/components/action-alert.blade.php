@props([
    'identity' => null,
    'route' => '',
    'type' => 'PUT',
    'texto' => 'Tem certeza que deseja realizar esta ação?',
    'icon' => '<i class="fa fa-ban" aria-hidden="true"></i>'
])

<button type="button" id="open-alert-sidebar-{{$identity}}" class="text-purple-600 dark:text-purple-400 hover:purple-red-800 dark:purple:text-purple-300 p-2 rounded-full hover:purple-red-50 dark:hover:bg-purple-900/50">
    {!! $icon !!}
</button>

<!-- Aside que será aberto -->
<aside id="right-alert-sidebar-{{$identity}}" class="fixed inset-y-0 right-0 w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="p-6 h-full flex flex-col">
        <!-- Cabeçalho do aside -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Atenção</h2>
            <button id="close-alert-sidebar-{{$identity}}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form method="POST" id="{{$identity}}" action="{{$route}}">
            <div class="mb-6 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300 p-2">
                <div class="flex items-left">
                    {{$texto}}
                </div>
            </div>
            @csrf
            @method($type)
            <!-- Botão Danger Submit -->
            <input
                type="submit"
                value="Confirmar"
                class="mt-auto cursor-pointer px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-colors" />
        </form>
    </div>
</aside>

<!-- Overlay (opcional) -->
<div id="overlay-{{$identity}}" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

<script>
    // Abrir aside
    document.getElementById('open-alert-sidebar-{{$identity}}').addEventListener('click', function() {
        document.getElementById('right-alert-sidebar-{{$identity}}').classList.remove('translate-x-full');
        document.getElementById('overlay-{{$identity}}').classList.remove('hidden');
    });

    // Fechar aside
    document.getElementById('close-alert-sidebar-{{$identity}}').addEventListener('click', function() {
        document.getElementById('right-alert-sidebar-{{$identity}}').classList.add('translate-x-full');
        document.getElementById('overlay-{{$identity}}').classList.add('hidden');
    });

    // Fechar ao clicar no overlay
    document.getElementById('overlay-{{$identity}}').addEventListener('click', function() {
        document.getElementById('right-alert-sidebar-{{$identity}}').classList.add('translate-x-full');
        this.classList.add('hidden');
    });
</script>
