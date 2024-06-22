@extends('layouts.app')

@section('title')
    History
@endsection

@section('content')
    <div class="flex flex-col gap-4">
        <div class="flex flex-row justify-between items-center">
            <div>
                <div class="flex flex-row gap-4 text-[#707EAE]">
                    <div>Page</div>
                    <div>/</div>
                    <div>Riwayat</div>
                </div>
                <div class=" font-semibold text-primary text-4xl">Riwayat</div>
            </div>
        </div>
        <div class="bg-white p-8 rounded-md text-gray-500">
            <table id="historyTable" class="w-full">
                <thead class="text-left">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                            No</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-3/12">
                            Nama User</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-6/12">
                            Diagnosa Penyakit</th>
                        <th scope="col"
                            class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#historyTable').DataTable({
                processing: true,
                ajax: "{{ route('historyDataAdmin') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'disease',
                        name: 'disease'
                    },
                    {
                        data: 'id',
                        render: function(data) {
                            let detailUrl = '{{ route('history-detail', ':id') }}';
                            detailUrl = detailUrl.replace(':id', data);
                            return '<div class="flex">' +
                                '<a href="' + detailUrl +
                                '" class="bg-yellow-500 px-3 text-sm py-1 rounded-md text-white mr-2" data-id="' +
                                data + '">Detail</a>' +
                                '</div>';
                        }
                    },
                ]
            });
        });
    </script>
@endpush
