<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white font-semibold">
            <a href="{{route('daftar-warga.index')}}" class="hover:text-gray-400"><i class="fas fa-arrow-left"></i></a> Tambah Warga
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
            <div class="bg-gray-700 overflow-hidden shadown-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('daftar-warga._form', [
                        'warga' => null,
                        'shdkList' => $shdkList,
                        'agamaList' => $agamaList,
                        'maritalList' => $maritalList,
                        'pekerjaanList' => $pekerjaanList,
                        'pendidikanList' => $pendidikanList,
                        'action' => route('daftar-warga.store'),
                        'method' => 'POST'
                    ])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>