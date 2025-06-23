<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl text-white font-semibold">Daftar Nomor Rumah</h2> 
  </x-slot>
  
  <div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <a href="{{route('nomor-rumah.create')}}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            + Tambah Nomor Rumah
          </a>
          
          <table class="mt-4 w-full border">
            <thead>
              <tr class="bg-gray-700 text-white">
                <th class="border px-4 py-2 w-5">Nomor Rumah</th>
                <th class="border px-4 py-2">Penghuni</th>
                <th class="border px-4 py-2">Aksi</th>
              </tr>
            </thead>
            <tbody class="text-white">
              @forelse ($rumah as $item)
                <tr>
                  <td class="border px-4 py-2 text-center">{{$item->nomor_rumah}}</td>
                  <td class="border px-4 py-2">{{\App\Models\RiwayatPenghuni::getPenghuni($item->nomor_rumah)}}</td>
                  <td class="border px-4 py-2 text-center">
                    <a href="{{route('nomor-rumah.show', $item->nomor_rumah)}}"
                        class="bg-blue-500 text-white px-2 py-2 rounded hover:bg-blue-700"    
                    >
                        Lihat
                    </a>
                    &nbsp;
                    <a href="{{route('nomor-rumah.edit', $item->nomor_rumah)}}" 
                        class="bg-orange-500 text-white px-2 py-2 rounded hover:bg-orange-700">
                        Edit  
                    </a>
                    &nbsp;
                    <form action="{{route('nomor-rumah.destroy', $item->nomor_rumah)}}"
                        method="POST" class="inline">
                        @csrf
                        @method('DELETE')  
                        <button onclick="return confirm('Yakin Hapus?')"
                          class="bg-red-500 text-white px-2 py-2 rounded hover:bg-red-700"
                        >
                          Hapus
                        </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="border text-center py-4">Belum ada Data.</td>
                </tr>
              @endforelse
          </table>
        </div>
        
      </div>
    </div>
  </div>
</x-app-layout>