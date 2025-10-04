<nav x-data="{ open: false }" 
     class="backdrop-blur-md bg-gray-900/70 border-b border-gray-800 fixed w-full z-50 shadow-lg">
    <!-- Contenedor principal -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Logo + Nombre -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 group">
                    <img src="{{ asset('imagenes/Logo_Gosport.jpeg') }}" 
                         alt="GoSport Logo" 
                         class="h-10 w-10 rounded-full object-cover shadow-md transition 
                                group-hover:scale-110 group-hover:shadow-[0_0_15px_rgba(99,102,241,0.7)]">
                    <span class="text-white font-bold text-xl tracking-wide">GoSport</span>
                </a>
            </div>

            <!-- Links + Buscador (solo escritorio) -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8">
                <x-nav-link :href="route('dashboard')" 
                            :active="request()->routeIs('dashboard')" 
                            class="text-gray-200 hover:text-white font-medium transition">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('usuarios.index')" 
                            :active="request()->routeIs('usuarios.index')" 
                            class="text-gray-200 hover:text-white font-medium transition">
                    {{ __('Usuarios') }}
                </x-nav-link>
                
                <!-- Buscador -->
                <div class="relative">
                    <input type="text" 
                           placeholder="Buscar canchas o eventos..." 
                           class="w-64 bg-gray-800/60 text-gray-200 rounded-full px-4 py-2 pl-10
                                  focus:outline-none focus:ring-2 focus:ring-indigo-500 placeholder-gray-400
                                  border border-gray-700/50 shadow-inner">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M21 21l-4.35-4.35M9 17a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Dropdown Usuario -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-200 hover:text-white transition">
                            <div>{{ Auth::user()->name ?? 'Invitado' }}</div>
                            <div class="ml-2">
                                <svg class="fill-current h-4 w-4 text-gray-400" 
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" 
                                          d="M5.293 7.293a1 1 0 011.414 0L10 
                                             10.586l3.293-3.293a1 1 0 111.414 
                                             1.414l-4 4a1 1 0 01-1.414 
                                             0l-4-4a1 1 0 010-1.414z" 
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.show')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Botón móvil -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" 
                        class="p-2 rounded-md text-gray-300 hover:text-white hover:bg-gray-800/60 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" 
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

