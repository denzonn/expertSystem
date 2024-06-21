@extends('layouts.app')

@section('title')
    Tambah Gejala
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <a href="/admin/symptom">Gejala</a>
            <div>/</div>
            <div>Tambah Gejala</div>
        </div>
        <div class=" font-semibold text-primary text-4xl mt-2">Tambah Gejala</div>
    </div>
    <div class="bg-white p-8 rounded-md text-gray-500">
        <form action="{{ route('symptom.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-2">
                <div class="flex flex-col gap-2">
                    <label for="">Nama Gejala</label>
                    <input type="text" placeholder="Masukkan Nama Gejala" name="name"
                        class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="flex flex-col gap-2">
                        <label for="">Kode</label>
                        <input type="text" placeholder="Masukkan Kode" name="code"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="">Bobot</label>
                        <input type="number" placeholder="Masukkan Bobot" name="bobot"
                            class="w-full border px-4 py-2 rounded-md bg-transparent" required />
                    </div>
                </div>
            </div>
            <button type="submit" class="w-full rounded-md bg-secondary mt-8 text-white py-2 text-lg">Tambah
                Gejala</button>
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
@endpush
