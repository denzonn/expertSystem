@extends('layouts.home')

@section('title')
    Hasil Diagnosa
@endsection

@section('name')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <a href="/home">Home</a>
            <div>/</div>
            <a href="/diagnose">Diagnosa Penyakit</a>
            <div>/</div>
            <div>Hasil Diagnosa Penyakit</div>
        </div>
        <div class=" font-semibold text-primary text-4xl mt-2">Hasil Diagnosa Penyakit</div>
    </div>
@endsection

@section('content')
    <div class="bg-white transition-all py-6 px-8 rounded-lg">
        <div class="text-3xl font-semibold text-gray-500 mb-4">Hasil Diagnosa</div>
        <div class="text-xl">
            <div class="mb-2">Nama Penyakit : <span class="text-2xl font-bold text-red-500">{{ $diseaseName }}</span></div>
            <div class="mb-2">Persentase Gejala : {{ $percentage }}%</div>
            <div class="mb-4">
                <div>Gejala yang dipilih : </div>
                <div class="px-4">
                    @foreach ($symptoms as $index => $item)
                        <div>{{ $index + 1 }}. {{ $item }}</div>
                    @endforeach
                </div>
            </div>
            <div class="mb-2">Solusi : {!! $solution !!}</div>
        </div>

        <div class="mt-10">
            <a href="/diagnose" class="bg-primary hover:bg-secondary transition-all px-8 py-3 rounded-lg text-white">Kembali Diagnosa</a>
            <a href="/history" class="bg-gray-100 hover:bg-gray-200 transition-all px-8 py-3 rounded-lg text-gray-400">Riwayat Diagnosa</a>
        </div>
    </div>
@endsection
