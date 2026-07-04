<div x-data="{ sidebarOpen: false }" class="flex min-h-screen bg-gray-100">

    <!-- Overlay untuk mobile -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
        class="fixed inset-0 z-20 bg-black/50 lg:hidden" x-cloak></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed inset-y-0 left-0 z-30 w-64 text-white transition-transform duration-200 ease-in-out transform bg-gray-900 lg:static">

        <div class="flex items-center justify-center h-16 border-b border-gray-800">
            <x-application-logo class="w-auto h-8 text-white fill-current" />
            <span class="ml-2 font-semibold">Vehicle Booking</span>
        </div>

        <nav class="px-3 mt-4 space-y-1">
            @if (auth()->user()->isAdmin())
                <p class="px-3 pt-2 pb-1 text-xs font-semibold text-gray-500 uppercase">Menu Admin</p>

                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Dashboard
                </a>

                <a href="{{ route('admin.bookings.index') }}"
                    class="{{ request()->routeIs('admin.bookings.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Pemesanan Kendaraan
                </a>

                <a href="{{ route('admin.vehicles.index') }}"
                    class="{{ request()->routeIs('admin.vehicles.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Data Kendaraan
                </a>

                <a href="{{ route('admin.drivers.index') }}"
                    class="{{ request()->routeIs('admin.drivers.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Data Driver
                </a>

                <a href="{{ route('admin.vendors.index') }}"
                    class="{{ request()->routeIs('admin.vendors.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Data Vendor Sewa
                </a>

                <a href="{{ route('admin.fuel-logs.index') }}"
                    class="{{ request()->routeIs('admin.fuel-logs.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Konsumsi BBM
                </a>

                <a href="{{ route('admin.service-schedules.index') }}"
                    class="{{ request()->routeIs('admin.service-schedules.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Jadwal Service
                </a>

                <a href="{{ route('admin.reports.index') }}"
                    class="{{ request()->routeIs('admin.reports.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Laporan
                </a>
            @endif

            @if (auth()->user()->isApprover())
                <p class="px-3 pt-2 pb-1 text-xs font-semibold text-gray-500 uppercase">Menu Approval</p>

                <a href="{{ route('approver.dashboard') }}"
                    class="{{ request()->routeIs('approver.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Dashboard
                </a>

                <a href="{{ route('approver.bookings.index') }}"
                    class="{{ request()->routeIs('approver.bookings.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Persetujuan Pemesanan
                </a>

                <a href="{{ route('approver.history') }}"
                    class="{{ request()->routeIs('approver.history') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} flex items-center gap-3 rounded-md px-3 py-2 text-sm">
                    Riwayat Persetujuan
                </a>
            @endif
        </nav>
    </aside>

    <!-- Main content -->
    <div class="flex flex-col flex-1 lg:pl-0">

        <!-- Topbar -->
        <header class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200 shadow-sm">
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 lg:hidden">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="text-lg font-semibold text-gray-800">
                {{ $header ?? '' }}
            </div>

            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center gap-2 text-sm text-gray-600 hover:text-gray-900">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </header>

        <!-- Page content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</div>
