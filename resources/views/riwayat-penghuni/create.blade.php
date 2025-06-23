<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Tambah Penghuni - Rumah {{ request('rumah') }}
        </h2>
    </x-slot>
    
    <div class="p-6 bg-gray-700 rounded shadow">
        <form action="{{route('riwayat-penghuni.store')}}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="nomor_rumah" value="{{request('rumah')}}">
            
            <div>
                <label for="nama" class="block text-sm text-white font-medium">Nama Penghuni</label>
                <input type="text" name="nama" id="nama" 
                    class="w-full border rounded px-3 py-2" placeholder="Masukkan Nama" required>
                @error('nomor_rumah') <p class="text-red-500 text-sm">{{$message}}</p>@enderror    
            </div>
            
            <div>
                <label for="shdk" class="block text-sm text-white font-medium">Status Hubungan Dalam Keluarga(SHDK)</label>
                <select name="shdk" class="w-full border rounded px-3 py-2">
                    <option value="" disabled selected>-Pilih Salah Satu-</option>
                    <option value="1">Ayah</option>
                    <option value="2">Ibu</option>
                    <option value="3">Anak</option>
                    <option value="4">Cucu</option>
                    <option value="5">Lainnya</option>
                </select>
                @error('shdk')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            
            <div>
                <label for="tanggal_masuk" class="block text-sm text-white font-medium">Tanggal Menetap (Kosongi jika belum menetap)</label>
                <input type="date" name="tanggal_masuk" id="tanggal_masuk" 
                    class="w-full border rounded px-3 py-2">
                @error('tanggal_masuk')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>