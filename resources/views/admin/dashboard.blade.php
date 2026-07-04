<x-layouts.sidebar-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard Admin</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                Selamat datang, {{ auth()->user()->name }} (Admin Pool Kendaraan)
            </div>
        </div>
    </div>
</x-layouts.sidebar-layout>
