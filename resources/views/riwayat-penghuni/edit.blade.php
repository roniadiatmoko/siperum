<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Penghuni - Rumah {{$riwayat->nomor_rumah}}
        </h2>
    </x-slot>
    
    <div class="p-6 bg-white rounded shadow">
        <form action="{{route('riwayat-penghuni.update', $riwayat->id)}}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label for="nama" class="block text-sm text-white font-medium">Nama Penghuni</label>
                <input type="text" name="nama" id="nama"
                    class="w-full border rounded px-3 py-2"
                    value="{{$riwayat->nama}}" required>
                >
                
                <div>
                    <label for="shdk" class="block text-sm text-white font-medium">Status Hubungan Dalam Keluarga(SHDK)</label>
                    <select name="shdk" class="w-full border rounded px-3 py-2">
                        <option>-Pilih Salah Satu-</option>
                        <option value="1" {{old('shdk') == '1' ? 'selected' : ''}}>Ayah</option>
                        <option value="2" {{old('shdk') == '2' ? 'selected' : ''}}>Ibu</option>
                        <option value="3" {{old('shdk') == '3' ? 'selected' : ''}}>Anak</option>
                        <option value="4" {{old('shdk') == '4' ? 'selected' : ''}}>Cucu</option>
                        <option value="5" {{old('shdk') == '5' ? 'selected' : ''}}>Lainnya</option>
                    </select>
                </div>
                
                <div>
                    <label for="tanggal_masuk" class="block text-sm text-white font-medium">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                        class="w-full border rounded px-3 py-2"
                        value="{{$riwayat->tanggal_masuk}}">
                </div>
                
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>