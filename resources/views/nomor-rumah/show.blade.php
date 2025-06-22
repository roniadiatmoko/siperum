<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Detail Rumah Nomor {{$rumah->nomor_rumah}}
        </h2>
    </x-slot>
    
    <div class="p-6 bg-white rounded shadow">
        <h3 class="text-lg font-bold">Status Rumah</h3>
        
        <p class="mb-4"> {{$rumah->is_aktif ? 'Menetap' : 'Belum Menetap'}}</p>
        
        <h3 class="text-lg font-bold mb-2">Riwayat Penghuni</h3>
        
        <a href="{{route('riwayat-penghuni.create', ['rumah' => $rumah->nomor_rumah])}}"
            class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-700">
            + Tambah Penghuni
        </a>
        
        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Tanggal Masuk</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($riwayat as $item)
                <tr>
                    <td class="border px-4 py-2">{{$item->nama}}</td>
                    <td class="border px-4 py-2">{{$item->tanggal_masuk}}</td>
                    <td class="border px-4 py-2">
                        @if($item->is_aktif)
                            <span class="text-green-600 font-bold">Aktif</span>
                        @else
                            Tidak Aktif
                        @endif
                    </td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{route('riwayat-penghuni.edit', $item->id)}}"
                            class="text-blue-600">
                            Edit
                        </a>
                        <form action="{{route('riwayat-penghuni.destroy', $item->id)}}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin Hapus?')" class="text-red-600">
                                Hapus
                            </button>
                        </form>
                        @if(!$item->is_aktif)
                        <form action="{{route('riwayat-penghuni.setAktif', $item->id)}}" method="POST" class="inline">
                            @csrf
                            <button class="text-green-700 font-semibold">Jadikan Kepala Rumah</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>