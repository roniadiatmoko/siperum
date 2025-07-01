<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            <a href="{{route('nomor-rumah.show', $rumah)}}"><i class="fas fa-arrow-left"></i></a> Tambah Penghuni - Rumah {{ request('rumah') }}
        </h2>
    </x-slot>
    
    <div class="p-6 bg-gray-700 rounded shadow">
        @include('riwayat-penghuni._form', [
                'warga' => null,
                'wargaList' => $wargaList,
                'method'    => 'POST',
                'action'    => route('riwayat-penghuni.store')
            ])
    </div>
</x-app-layout>