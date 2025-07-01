<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white font-semibold">
            Daftar Warga
        </h2>
    </x-slot>
    
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
            <div class="bg-gray-700 overflow-hidden shadown-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('daftar-warga.create')}}"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"
                    >
                        + Tambah Warga
                    </a>
                    <br/><br/><br/>
                    <table id="warga-table" class="table-auto border border-white border-collapse text-white w-full">
                        <thead>
                            <tr>
                                <th class="!text-center">No</th>
                                <th class="!text-center">Nama</th>
                                <th class="!text-center">Jenis Kelamin</th>
                                <th class="!text-center">Nomor Ponsel</th>
                                <th class="!text-center">Nomor Rumah</th>
                                <th class="!text-center">Status</th>
                                <th class="!text-center">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                
                @push('scripts')
                <script>
                    $(function() {
                        $('#warga-table').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: '{{ route("daftar-warga.index") }}',
                            columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                                {data: 'nama', name: 'nama'},
                                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                                {data: 'no_hp', name: 'no_hp'},
                                {data: 'nomor_rumah', name: 'nomor_rumah', className: 'text-center'},
                                {data: 'is_aktif', name: 'is_aktif'},
                                {data: 'action', name:'action', orderAble: false, searchAble: false}
                            ]
                        })
                    })
                </script>
                @endpush
            </div>
        </div>
    </div>
</x-app-layout>