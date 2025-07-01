<form action="{{$action}}" method="{{$method}}" class="space-y-4">
    @csrf

    @if($warga)
    @method('PUT')
    @endif

    <input type="hidden" name="nomor_rumah" value="{{request('rumah')}}">

    <div>
        <label for="id_warga" class="block text-sm text-white font-medium">Nama Penghuni</label>
        <select name="id_warga" id="id_warga" class="w-full border rounded px-3 py-2 mt-2 bg-gray-800 text-white">
            <option value="" disabled hidden selected>Pilih Warga</option>
            @foreach($wargaList as $key => $w)
            <option value="{{$key}}"
                {{old('id_warga', $warga->id_warga ?? '') == $key ? 'selected' : ''}}>
                {{$w}}
            </option>
            @endforeach
        </select>
        @error('id_warga') <p class="text-red-500 text-sm">{{$message}}</p>@enderror
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

<script>
    $(function() {
        $('#id_warga').select2({
            placeholder: 'Cari nama warga…',
            allowClear: true,
            // multiple:true,
            width: '100%' // penting kalau pakai Tailwind/Bootstrap
        });
    });
</script>