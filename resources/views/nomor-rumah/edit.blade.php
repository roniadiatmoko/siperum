<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            <a href="{{url('/nomor-rumah')}}"><i class="fas fa-arrow-left"></i></a>
            Update Nomor Rumah 
        </h2>
    </x-slot>
    
    <div class="py-4">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-700 p-6 shadow-sm sm:rounded:lg">
                <form action="{{route('nomor-rumah.update', $rumah->nomor_rumah)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="block text-sm text-white font-medium">Nomor Rumah</label>
                        <input type="text" name="nomor_rumah" class="mt-1 block w-full border rounded px-3 py-2"
                            value="{{old('nomor_rumah', $rumah->nomor_rumah)}}" placeholder="Masukkan Nomor Rumah" required
                        />
                        @error('nomor_rumah') <p class="text-red-500 text-sm">{{$message}}</p> @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm text-white font-medium">Status Aktif/Menetap</label>
                        <select name="is_aktif" class="mt-1 block w-full border rounded px-3 py-2">
                            <option value="" disabled selected hidden>Pilih Status</option>
                            <option value="1" {{old('is_aktif', $rumah->is_aktif) == '1' ? 'selected' : ''}}>Aktif(Menetap)</option>
                            <option value="0" {{old('is_aktif', $rumah->is_aktif) == '0' ? 'selected' : ''}}>Non Aktif (Belum Menetap)</option>
                        </select>
                        @error('is_aktif')
                        <p class="text-red-400 text-sm mt-1">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-between">
                        <a href="{{route('nomor-rumah.index')}}" class="ml=2 text-red-500 border border-red-500 px-4 py-2 rounded hover:bg-red-200">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</x-app-layout>