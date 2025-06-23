<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Detail Rumah Nomor {{$rumah->nomor_rumah}}
        </h2>
    </x-slot>
    
    <div class="py-4">
        <div class="max-w-7xl mx-auto p-6  bg-gray-700 text-white rounded shadow">
            <h3 class="text-lg text-gray-500 font-bold">Status Rumah</h3>
            
            <p class="mb-4"> {{$rumah->is_aktif ? 'Menetap' : 'Belum Menetap'}}</p>
            
            <h3 class="text-lg text-center font-bold mb-2">Riwayat Penghuni</h3>
            
            <a href="{{route('riwayat-penghuni.create', ['rumah' => $rumah->nomor_rumah])}}"
                class="bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-green-700">
                + Tambah Penghuni
            </a>
            
            <table class="w-full table-auto border">
                <thead>
                    <tr class="bg-gray-900">
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Status dalam keluarga</th>
                        <th class="border px-4 py-2">Tanggal Menetap</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat as $item)
                    <tr>
                        <td class="border px-4 py-2">{{$item->nama}}</td>
                        <td class="border px-4 py-2">{{$item->shdk_label}}</td>
                        <td class="border px-4 py-2">{{$item->tanggal_menetap}}</td>
                        <td class="border px-4 py-2 text-center">
                            @if($item->is_aktif)
                                <span class="text-white bg-blue-600 py-2 px-3 rounded font-bold">Kepala Rumah</span>
                            @else
                                Anggota
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2 text-center">
                            <a href="{{route('riwayat-penghuni.edit', $item->id)}}"
                                class="bg-blue-600 py-2 px-2 rounded hover:bg-blue-900">
                                Edit
                            </a>
                            <form action="{{route('riwayat-penghuni.destroy', $item->id)}}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin Hapus?')" class="bg-red-600 text-white py-2 px-2 rounded hover:bg-red-900">
                                    Hapus
                                </button>
                            </form>
                            @if(!$item->is_aktif)
                            <form action="{{route('riwayat-penghuni.jadikan-kepala', $item->id)}}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button 
                                    type="submit" 
                                    class="bg-green-700 font-semibold py-2 px-2 rounded hover:bg-green-900">Jadikan Kepala Rumah</button>
                            </form>
                            @else
                            <span class="inline-block bg-blue-600 text-white text-sm font-semibold px-3 py-1 rounded">
                                Kepala Rumah
                            </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>