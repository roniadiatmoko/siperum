<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            <a href="{{route('daftar-warga.index')}}" class="hover:text-gray-500"><i class="fas fa-arrow-left"></i></a> Detail Warga
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
            <div class="bg-gray-700 overflow-hidden shadown-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h2 class="font-bold text-center text-2xl">Detail</h2>
                    <br />

                    <div class="text-center justify-center mb-5">
                        <img src="{{asset('storage/foto_warga/' . $warga->foto_ktp_path)}}" alt="photo-{{$warga->nama}}" class="w-64 mx-auto"/>
                        <small class="text-gray-200">Status Warga</small><br />
                        <p class="font-semibold {{$warga->is_aktif == 1 ? 'text-blue-400' : 'text-red-400' }} text-lg">{{$warga->is_aktif == 1 ? 'Warga Perumahan' : 'Sudah Bukan Warga Perumahan'}}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <small class="text-gray-200">Nama</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->nama}}</p>

                            <small class="text-gray-200">NIK</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->nik}}</p>

                            <small class="text-gray-200">No. KK</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->no_kk}}</p>

                            <small class="text-gray-200">Status Hubungan dalam Keluarga</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->shdk->nama}}</p>

                            <small class="text-gray-200">Tempat, Tanggal Lahir</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->tempat_lahir . ', ' . date_format(date_create($warga->tanggal_lahir), 'd F Y')}}</p>

                            <small class="text-gray-200">Jenis Kelamin</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'}}</p>

                            <small class="text-gray-200">Daerah asal sebelumnya</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->asal_sebelumnya}}</p>
                        </div>
                        <div>
                            <small class="text-gray-200">Agama</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->refAgama->nama}}</p>

                            <small class="text-gray-200">Status Marital</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->statusMarital->nama}}</p>

                            <small class="text-gray-200">Kewarganegaraan</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->kewarganegaraan == '1' ? 'WNI' : 'WNA'}}</p>

                            <small class="text-gray-200">Pendidikan Terakhir</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->pendidikanTerakhir->nama}}</p>

                            <small class="text-gray-200">Pekerjaan</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->refPekerjaan->nama}}</p>

                            <small class="text-gray-200">Email</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->email}}</p>

                            <small class="text-gray-200">Nomor Whatsapp</small><br />
                            <p class="font-semibold text-blue-400 text-lg">{{$warga->no_hp}}</p>
                        </div>

                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>