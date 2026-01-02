<script src="https://unpkg.com/feather-icons"></script>

<nav x-data="{ open: false }" class="bg-white sticky top-0 z-50 shadow-sm border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="transition transform hover:scale-105">
                        <x-application-logo class="block h-10 w-auto fill-current text-blue-600" />
                    </a>
                </div>

                <div class="hidden space-x-4 lg:space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @php
                        // Helper untuk menentukan menu berdasarkan role
                        $role = auth()->user()->role;
                        $menus = [];
                        if($role == 'admin') {
                            $menus = [
                                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'grid'],
                                ['route' => 'karyawan', 'label' => 'Karyawan', 'icon' => 'users'],
                                ['route' => 'project', 'label' => 'Project', 'icon' => 'briefcase'],
                                ['route' => 'products.index', 'label' => 'Produk', 'icon' => 'package'],
                                ['route' => 'pesanan', 'label' => 'Pesanan', 'icon' => 'shopping-bag'],
                                ['route' => 'datapelanggan', 'label' => 'User', 'icon' => 'user-plus'],
                            ];
                        } elseif($role == 'kasir') {
                            $menus = [
                                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'grid'],
                                ['route' => 'project', 'label' => 'Project', 'icon' => 'briefcase'],
                                ['route' => 'products.index', 'label' => 'Produk', 'icon' => 'package'],
                                ['route' => 'pesanan', 'label' => 'Pesanan', 'icon' => 'shopping-bag'],
                            ];
                        } else {
                            $menus = [
                                ['route' => 'dashboard', 'label' => 'Dashboard', 'icon' => 'grid'],
                                ['route' => 'produk', 'label' => 'Belanja', 'icon' => 'shopping-cart'],
                                ['route' => 'pesanan', 'label' => 'Pesanan Saya', 'icon' => 'file-text'],
                            ];
                        }
                    @endphp

                    @foreach($menus as $menu)
                        <x-nav-link :href="route($menu['route'])" :active="request()->routeIs($menu['route'])" 
                            class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            <i data-feather="{{ $menu['icon'] }}" class="w-4 h-4 me-2"></i>
                            {{ __($menu['label']) }}
                        </x-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                
                <a href="/cart" class="relative p-2 text-gray-500 hover:text-blue-600 transition-colors duration-200 group">
                    <i data-feather="shopping-cart" class="w-6 h-6"></i>
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full shadow-sm group-hover:bg-red-600">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out bg-gray-50 px-3 py-2 rounded-lg">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 me-2">
                                    <i data-feather="user" class="w-4 h-4"></i>
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-xs text-gray-400 border-b border-gray-100">
                            Manage Account (Role: {{ ucfirst(Auth::user()->role) }})
                        </div>
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <i data-feather="settings" class="w-4 h-4 me-2"></i> {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center text-red-600 hover:bg-red-50">
                                <i data-feather="log-out" class="w-4 h-4 me-2"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-blue-600 hover:bg-blue-50 focus:outline-none transition duration-150">
                    <i :class="{'hidden': open, 'block': ! open }" data-feather="menu"></i>
                    <i :class="{'hidden': ! open, 'block': open }" data-feather="x"></i>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            @foreach($menus as $menu)
                <x-responsive-nav-link :href="route($menu['route'])" :active="request()->routeIs($menu['route'])">
                    <div class="flex items-center">
                        <i data-feather="{{ $menu['icon'] }}" class="w-5 h-5 me-3"></i>
                        {{ $menu['label'] }}
                    </div>
                </x-responsive-nav-link>
            @endforeach
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 bg-gray-50">
            <div class="px-4 flex items-center">
                <div class="flex-shrink-0">
                    <i data-feather="user" class="w-8 h-8 p-1.5 bg-blue-100 text-blue-600 rounded-full"></i>
                </div>
                <div class="ms-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    // Inisialisasi Feather Icons
    feather.replace();
    
    // Pastikan Feather Icons di-render ulang jika Alpine.js melakukan update DOM
    document.addEventListener('alpine:initialized', () => {
        feather.replace();
    });
</script>