<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white font-semibold">
            <a href="{{route('daftar-warga.index')}}"><i class="fas fa-arrow-left"></i></a> Tambah Warga
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
            <div class="bg-gray-700 overflow-hidden shadown-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('daftar-warga.store')}}" method="POST">
                        @csrf

                        <div class="text-center text-white mb-4">Isi form berikut</div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="mb-4">
                                    <label class="block text-white text-sm">Nama Sesuai KTP</label>
                                    <input type="text" name="nama" id="nama"
                                        placeholder="Masukkan Nama Lengkap"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" required />
                                    @error('nama')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">NIK Sesuai KTP</label>
                                    <input type="number" name="nik" id="nik"
                                        placeholder="Nomor Induk Kependudukan"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" maxlength="16" required />
                                    @error('nik')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Nomor KK (Kartu Keluarga)</label>
                                    <input type="number" name="no_kk" id="no_kk"
                                        placeholder="Masukkan Nomor KK"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" required />
                                    @error('no_kk')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="block text-white text-sm">Status Hubungan dalam Keluarga</label>
                                    <select name="shdk" id="shdk" class="w-full border rounded px-3 py-2 mt-2 bg-gray-800 text-white">
                                        <option value="" disabled hidden selected>Pilih Status</option>
                                        @foreach($shdkList as $key => $s)
                                        <option value="{{$key}}"
                                            {{old('shdk', $warga->shdk ?? '') == $key ? 'selected' : ''}}>
                                            {{$s}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('shdk')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" />
                                    @error('tempat_lahir')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        placeholder="Masukkan Tanggal Lahir"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" />
                                    @error('tanggal_lahir')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <span class="block text-sm text-white mb-1">Jenis Kelamin</span>
                                    <div class="flex items-center space-x-6">
                                        <label for="jk-l" class="inline-flex items-center cursor-pointer">
                                            <input type="radio"
                                                id="jk-l"
                                                name="jenis_kelamin"
                                                value="L"
                                                required
                                                class="text-blue-600 focus:ring-blue-500 border-gray-300 mx-2"
                                                {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'L' ? 'checked' : '' }}>
                                            <span class="ml-2 text-white">Laki-laki</span>
                                        </label>

                                        <label for="jk-p" class="inline-flex items-center cursor-pointer">
                                            <input type="radio"
                                                id="jk-p"
                                                name="jenis_kelamin"
                                                value="P"
                                                class="text-pink-600 focus:ring-pink-500 border-gray-300 mx-2"
                                                {{ old('jenis_kelamin', $warga->jenis_kelamin ?? '') == 'P' ? 'checked' : '' }}>
                                            <span class="ml-2 text-white">Perempuan</span>
                                        </label>

                                        @error('jenis_kelamin')
                                        <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm mt-7">Pekerjaan</label>
                                    <select name="pekerjaan" id="agama" class="w-full border rounded px-3 py-2 mt-2 bg-gray-800 text-white">
                                        <option value="" disabled hidden selected>Pilih Status</option>
                                        @foreach($pekerjaanList as $key => $p)
                                        <option value="{{$key}}"
                                            {{old('pekerjaan', $warga->pekerjaan ?? '') == $key ? 'selected' : ''}}>
                                            {{$p}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('pekerjaan')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div class="mb-4">
                                    <label class="block text-white text-sm">Daerah Asal Sebelumnya</label>
                                    <input type="text" name="asal_sebelumnya" id="asal_sebelumnya"
                                        placeholder="Masukkan Asal Sebelumnya"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" required />
                                    @error('asal_sebelumnya')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Agama</label>
                                    <select name="agama" id="agama" class="w-full border rounded px-3 py-2 mt-2 bg-gray-800 text-white">
                                        <option value="" disabled hidden selected>Pilih Status</option>
                                        @foreach($agamaList as $key => $agama)
                                        <option value="{{$key}}"
                                            {{old('agama', $warga->agama ?? '') == $key ? 'selected' : ''}}>
                                            {{$agama}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('agama')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Status Marital</label>
                                    <div class="flex items-center space-x-2 mt-4">
                                        @foreach($maritalList as $key => $marital)
                                        <label for="status_marital-{{$key}}" class="inline-flex items-center cursor-pointer">
                                            <input type="radio"
                                                id="status_marital-{{$key}}"
                                                name="status_marital"
                                                value="{{$key}}"
                                                required
                                                class="text-blue-600 focus:ring-blue-500 border-gray-300 mx-2"
                                                {{ old('status_marital', $warga->status_marital ?? '') == $key ? 'checked' : '' }}>
                                            <span class="text-white">{{$marital}}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                    @error('status_marital')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <span class="block text-sm text-white mb-2 mt-8">Kewarganegaraan</span>
                                    <div class="flex items-center space-x-6 mt-4">
                                        <label for="wni" class="inline-flex items-center cursor-pointer">
                                            <input type="radio"
                                                id="wni"
                                                name="kewarganegaraan"
                                                value="1"
                                                required
                                                class="text-blue-600 focus:ring-blue-500 border-gray-300 mx-2"
                                                {{ old('kewarganegaraan', $warga->kewarganegaraan ?? '') == '1' ? 'checked' : '' }}>
                                            <span class="ml-2 text-white">Warga Negara Indonesia</span>
                                        </label>

                                        <label for="wna" class="inline-flex items-center cursor-pointer">
                                            <input type="radio"
                                                id="wna"
                                                name="kewarganegaraan"
                                                value="2"
                                                class="text-pink-600 focus:ring-pink-500 border-gray-300 mx-2"
                                                {{ old('kewarganegaraan', $warga->kewarganegaraan ?? '') == '2' ? 'checked' : '' }}>
                                            <span class="ml-2 text-white">Warga Negara Asing</span>
                                        </label>
                                    </div>
                                    @error('kewarganegaraan')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Pendidikan Terakhir</label>
                                    <select name="pendidikan" id="agama" class="w-full border rounded px-3 py-2 mt-2 bg-gray-800 text-white">
                                        <option value="" disabled hidden selected>Pilih Status</option>
                                        @foreach($pendidikanList as $key => $pend)
                                        <option value="{{$key}}"
                                            {{old('pendidikan', $warga->pendidikan ?? '') == $key ? 'selected' : ''}}>
                                            {{$pend}}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('pendidikan')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Email</label>
                                    <input type="email" name="email" id="email"
                                        placeholder="Masukkan email Lengkap"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" />
                                    @error('email')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Nomor Whatsapp Aktif</label>
                                    <input type="text" name="no_hp" id="no_hp"
                                        placeholder="Masukkan Nomor Whatsapp Aktif"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" />
                                    @error('no_hp')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-white text-sm">Foto KTP</label>
                                    <input type="file" name="foto_ktp_path" id="foto_ktp_path"
                                        placeholder="Masukkan Nomor Whatsapp Aktif"
                                        class="w-full bg-gray-800 rounded-lg text-white mt-2" />
                                    @error('foto_ktp_path')
                                    <div class="bg-red-400 text-red-950 w-full mt-2 rounded-lg py-2 px-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <button type="submit" class="bg-blue-600 py-3 px-3 rounded-lg text-lg text-white w-full">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>