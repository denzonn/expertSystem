@extends('layouts.home')

@section('title')
    Diagnosa
@endsection

@section('name')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/home">Home</a>
            <div>/</div>
            <div>Diagnosa Penyakit</div>
        </div>
        <div class=" font-semibold text-primary text-4xl mt-2">Diagnosa Penyakit</div>
    </div>
@endsection

@section('content')
    <div class="bg-white transition-all py-6 px-8 rounded-lg">
        <div class="flex flex-col gap-4">
            <label for="" class="text-2xl text-gray-500 font-semibold">Pilih Gejala pada Ayam Anda</label>
            <form action="{{ route('diagnose-store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-3 gap-x-4 gap-y-2 ">
                    @foreach ($symptoms as $item)
                        <div class="flex items-center mb-4">
                            <input id="symptom-{{ $item->id }}" type="checkbox" name="symptoms[]"
                                value="{{ $item->id }}"
                                class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="symptom-{{ $item->id }}"
                                class="ml-2 text-lg font-medium text-gray-400">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-end w-full">
                    <button type="submit" class="mt-4 bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded">Diagnosa</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        $(document).ready(function() {
            // Initialize Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });
        });
    </script>
@endpush
