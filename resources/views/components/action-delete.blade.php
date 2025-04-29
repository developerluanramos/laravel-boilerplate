@props([
    'identity' => null,
    'route' => '',
    'type' => 'DELETE'
])

<button type="button" id="open-sidebar-{{$identity}}" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-900/50">
    <i class="fas fa-trash"></i>
</button>

<!-- Aside que será aberto -->
<aside id="right-sidebar-{{$identity}}" class="fixed inset-y-0 right-0 w-80 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50">
    <div class="p-6 h-full flex flex-col">
        <!-- Cabeçalho do aside -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Atenção</h2>
            <button id="close-sidebar-{{$identity}}" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <form method="POST" id="{{$identity}}" action="{{$route}}">
            <div class="mb-6 bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-300 p-2">
                <div class="flex items-left">
                    Você irá DELETAR este registro permanentemente e esta ação é irreversível.
                </div>
            </div>
            @csrf
            @method('DELETE')
            <!-- Botão Danger Submit -->
            <input
                type="submit"
                value="Confirmar"
                class="mt-auto cursor-pointer px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors" />
        </form>
    </div>
</aside>

<!-- Overlay (opcional) -->
<div id="overlay-{{$identity}}" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

<script>
    // Abrir aside
    document.getElementById('open-sidebar-{{$identity}}').addEventListener('click', function() {
        document.getElementById('right-sidebar-{{$identity}}').classList.remove('translate-x-full');
        document.getElementById('overlay-{{$identity}}').classList.remove('hidden');
    });

    // Fechar aside
    document.getElementById('close-sidebar-{{$identity}}').addEventListener('click', function() {
        document.getElementById('right-sidebar-{{$identity}}').classList.add('translate-x-full');
        document.getElementById('overlay-{{$identity}}').classList.add('hidden');
    });

    // Fechar ao clicar no overlay
    document.getElementById('overlay-{{$identity}}').addEventListener('click', function() {
        document.getElementById('right-sidebar-{{$identity}}').classList.add('translate-x-full');
        this.classList.add('hidden');
    });
</script>
