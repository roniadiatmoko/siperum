<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            <a href="{{route('nomor-rumah.show', $riwayat->nomor_rumah)}}"><i class="fas fa-arrow-left"></i></a> Edit Penghuni - Rumah {{$riwayat->nomor_rumah}}
        </h2>
    </x-slot>
    
    <div class="p-6 bg-gray-800 rounded shadow">
        @include('riwayat-penghuni._form', [
                'warga' => $riwayat,
                'wargaList' => $wargaList,
                'method'    => 'POST',
                'action'    => route('riwayat-penghuni.update', $riwayat)
            ])
    </div>
</x-app-layout>