@extends('layouts.home')

@section('title')
    Diagnosa
@endsection

@section('name')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/home">Home</a>
            <div>/</div>
            <div>Riwayat Diagnosa Penyakit</div>
        </div>
        <div class=" font-semibold text-primary text-4xl mt-2">Riwayat Diagnosa Penyakit</div>
    </div>
@endsection

@section('content')
    <div class="bg-white transition-all py-6 px-8 rounded-lg">
        <table id="chairTable" class="w-full">
            <thead class="text-left">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                        No</th>
                    <th scope="col"
                        class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-10/12">
                        Penyakit
                    </th>
                    <th scope="col"
                        class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            $('#chairTable').DataTable({
                processing: true,
                ajax: "{{ route('historyData') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
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
                                '" class="bg-primary px-3 text-sm py-1 rounded-md text-white mr-2" data-id="' +
                                data + '">Detail</a>'
                            '</div>';
                        }
                    },
                ]
            })
        })
    </script>
@endpush
