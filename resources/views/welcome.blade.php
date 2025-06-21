<x-portal-layout>
    <div class="container mx-auto px-4 py-8">
{{--        <div class="sticky top-0 z-10 bg-white/80 backdrop-blur-md py-4 px-4 border-b border-gray-100">--}}
            <div class="w-full mx-auto">
                <div class="relative">
                    <!-- Input -->
                    <input
                        type="text"
                        placeholder="Criadores, posts ou categorias..."
                        class="w-full pl-12 pr-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:border-purple-400 focus:ring-2 focus:ring-purple-100 outline-none transition-all duration-200 text-gray-700 placeholder-gray-400"
                    >

                    <!-- Ícone de busca (Phosphor) -->
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="ph ph-magnifying-glass text-xl"></i>
                    </div>

                    <!-- Botão opcional (microfone) -->
                    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-purple-500 transition-colors">
                        <i class="ph ph-microphone text-xl"></i>
                    </button>
                </div>
            </div>
{{--        </div>--}}
        <!-- Seção 1: Novos Criadores (Carrossel Horizontal) -->
        <section class="mb-12 mt-4">
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center space-x-2">
                    <i class="ph ph-sparkle text-xl text-purple-500"></i>
                    <h2 class="title-section text-xl font-medium text-gray-900">Novos talentos</h2>
                </div>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-800 transition-colors flex items-center">
                    Explorar <i class="ph ph-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                <!-- Card 1 -->
                @foreach($novos_criadores as $novo_criador)
                    <div class="flex-shrink-0 w-48 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <img src="{{$novo_criador->avatar_url}}" alt="Criador" class="w-full h-48 object-cover rounded-t-lg">
                        <div class="p-3">
                            <h3 class="font-semibold text-gray-800">{{$novo_criador->nickname}}</h3>
                            <p class="text-sm text-gray-500">Fitness • {{$novo_criador->qtd_seguidores_formatado}} segs</p>
                            <button class="mt-2 w-full bg-purple-600 text-white py-1 rounded-md hover:bg-purple-700 transition-colors">Seguir</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Seção 2: Trending Now (Posts em Alta) -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center space-x-2">
                    <i class="ph ph-trend-up text-xl text-rose-500"></i>
                    <h2 class="title-section text-xl font-medium text-gray-900">Em alta esta semana</h2>
                </div>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-800 transition-colors flex items-center">
                    Ver tudo <i class="ph ph-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Post 1 -->
                @foreach($postagens_em_alta as $post_em_alta)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <img src="https://picsum.photos/400/300?random={{random_int(1,1000)}}" alt="Post" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <div class="flex items-center mb-2">
                                <!-- Avatar corrigido (usando unavatar.io) -->
                                <img src="{{$post_em_alta->criador->avatar_url}}" alt="Perfil" class="w-8 h-8 rounded-full mr-2">
                                <span class="font-medium text-gray-800">
                                    {{$post_em_alta->criador->nickname}}
                                </span>
                            </div>
                            <p class="text-gray-600 mb-3">
                                {{$post_em_alta->legenda}}
                            </p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span>{{ $post_em_alta->qtd_curtidas_formatada }} curtidas • {{$post_em_alta->qtd_visualizacoes_formatada}} views</span>
                                <span>{{ $post_em_alta->created_at_for_humans }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Seção 3: Recomendados com Base no Seu Histórico -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center space-x-2">
                    <i class="ph ph-heart-straight text-xl text-rose-500"></i>
                    <h2 class="text-xl font-medium text-gray-900">Feito para você</h2>
                </div>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-800 transition-colors flex items-center">
                    Ver mais <i class="ph ph-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/300/200?random=7" alt="Post" class="w-full h-40 object-cover">
                        <span class="absolute bottom-2 left-2 bg-purple-600 text-white text-xs px-2 py-1 rounded-full">Seu interesse: 92%</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <img src="https://unavatar.io/yoga_lover" alt="Perfil" class="w-8 h-8 rounded-full mr-2 border border-purple-100">
                            <span class="font-medium text-gray-800 text-sm">@YogaPro</span>
                        </div>
                        <p class="text-gray-600 text-sm">Rotina de yoga para iniciantes 🧘‍♀️</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/300/200?random=8" alt="Post" class="w-full h-40 object-cover">
                        <span class="absolute bottom-2 left-2 bg-purple-600 text-white text-xs px-2 py-1 rounded-full">Seu interesse: 85%</span>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <img src="https://unavatar.io/chef_master" alt="Perfil" class="w-8 h-8 rounded-full mr-2 border border-purple-100">
                            <span class="font-medium text-gray-800 text-sm">@ChefMaster</span>
                        </div>
                        <p class="text-gray-600 text-sm">Receitas low-carb 🥑</p>
                    </div>
                </div>
                <!-- ... (mais cards) ... -->
            </div>
        </section>

        <!-- Seção 4: Ao Vivo Agora -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center space-x-2">
                    <i class="ph ph-television-simple text-xl text-red-500"></i>
                    <h2 class="text-xl font-medium text-gray-900">Transmissões ao vivo</h2>
                </div>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-800 transition-colors flex items-center">
                    Todas as lives <i class="ph ph-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                <!-- Live 1 -->
                <div class="flex-shrink-0 w-64 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/225?random=9" alt="Live" class="w-full h-36 object-cover">
                        <span class="live-badge absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full flex items-center">
                            <span class="w-2 h-2 bg-white rounded-full mr-1"></span> AO VIVO
                        </span>
                        <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded-full">1.2K assistindo</span>
                    </div>
                    <div class="p-3">
                        <div class="flex items-center">
                            <img src="https://unavatar.io/dj_live" alt="Perfil" class="w-8 h-8 rounded-full mr-2 border border-red-100">
                            <div>
                                <h3 class="font-medium text-gray-800 text-sm">@DJ_Live</h3>
                                <p class="text-xs text-gray-500">Mixagem de verão 🎧</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live 2 -->
                <div class="flex-shrink-0 w-64 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/225?random=10" alt="Live" class="w-full h-36 object-cover">
                        <span class="live-badge absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full flex items-center">
                            <span class="w-2 h-2 bg-white rounded-full mr-1"></span> AO VIVO
                        </span>
                        <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded-full">845 assistindo</span>
                    </div>
                    <div class="p-3">
                        <div class="flex items-center">
                            <img src="https://unavatar.io/fitness_guru" alt="Perfil" class="w-8 h-8 rounded-full mr-2 border border-red-100">
                            <div>
                                <h3 class="font-medium text-gray-800 text-sm">@FitnessGuru</h3>
                                <p class="text-xs text-gray-500">Treino HIIT em casa 🔥</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ... (mais lives) ... -->
            </div>
        </section>

        <!-- Seção 5: Melhores Ofertas -->
        <section class="mb-12">
            <div class="flex justify-between items-center mb-5">
                <div class="flex items-center space-x-2">
                    <i class="ph ph-tag text-xl text-green-500"></i>
                    <h2 class="text-xl font-medium text-gray-900">Ofertas exclusivas</h2>
                </div>
                <a href="#" class="text-sm text-purple-600 hover:text-purple-800 transition-colors flex items-center">
                    Ver promoções <i class="ph ph-arrow-right ml-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Oferta 1 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/250?random=11" alt="Oferta" class="w-full h-40 object-cover">
                        <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">-30%</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-medium text-gray-800">@MakeupArtist</h3>
                                <p class="text-xs text-gray-500">Curso de automaquiagem</p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm line-through text-gray-400">R$ 120</span>
                                <span class="block text-green-600 font-medium">R$ 84</span>
                            </div>
                        </div>
                        <button class="w-full bg-green-500/10 text-green-600 py-2 rounded-lg text-sm font-medium hover:bg-green-500/20 transition-colors">
                            Aproveitar oferta
                        </button>
                    </div>
                </div>

                <!-- Oferta 2 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/400/250?random=12" alt="Oferta" class="w-full h-40 object-cover">
                        <span class="absolute top-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">1º MÊS GRÁTIS</span>
                    </div>
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <h3 class="font-medium text-gray-800">@FitCoach</h3>
                                <p class="text-xs text-gray-500">Assinatura Premium</p>
                            </div>
                            <div class="text-right">
                                <span class="text-sm line-through text-gray-400">R$ 80/mês</span>
                                <span class="block text-green-600 font-medium">R$ 0</span>
                            </div>
                        </div>
                        <button class="w-full bg-green-500/10 text-green-600 py-2 rounded-lg text-sm font-medium hover:bg-green-500/20 transition-colors">
                            Assinar agora
                        </button>
                    </div>
                </div>
                <!-- ... (mais ofertas) ... -->
            </div>
        </section>
    </div>
</x-portal-layout>
