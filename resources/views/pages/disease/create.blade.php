@extends('layouts.app')

@section('title')
    Tambah Penyakit
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <a href="/admin/disease">Penyakit</a>
            <div>/</div>
            <div>Tambah Penyakit</div>
        </div>
        <div class=" font-semibold text-primary text-4xl mt-2">Tambah Penyakit</div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500">
        <form action="{{ route('disease.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-2">
                <div class="flex flex-col gap-2">
                    <label for="">Nama Penyakit</label>
                    <input type="text" placeholder="Masukkan Nama Penyakit" name="name"
                        class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="">Kode</label>
                    <input type="text" placeholder="Masukkan Kode" name="code"
                        class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                </div>
            </div>
            <div class="mt-6 flex flex-col gap-2">
                <label for="">Gejala Penyakit</label>
                <select class="select2-multiple px-4" name="symptom_disease[]" multiple="multiple" id="select2Multiple">
                    @foreach ($symptoms as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-6 flex flex-col gap-2">
                <label for="">Solusi Penyakit</label>
                <textarea name="solution" id="editor" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="w-full rounded-md bg-secondary mt-8 text-white py-2 text-lg">Tambah
                Penyakit</button>
        </form>
    </div>
@endsection

@push('addon-script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>
@endpush
