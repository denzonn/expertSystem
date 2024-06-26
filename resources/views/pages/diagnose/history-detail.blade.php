@extends('layouts.app')

@section('title')
    Hasil Diagnosa
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[hsl(226,28%,56%)]">
            <a href="/admin/dashboard">Page</a>
            <div>/</div>
            <a href="/admin/history">Riwayat Diagnosa Penyakit</a>
            <div>/</div>
            <div>Riwayat Diagnosa</div>
        </div>
        <div class=" font-semibold text-primary text-4xl mt-2">Riwayat Diagnosa Penyakit</div>
    </div>
    <div class="bg-white transition-all py-6 px-8 rounded-lg text-gray-400">
        <div class="text-3xl font-semibold text-gray-500 mb-4">Hasil Diagnosa</div>
        <div class="text-xl">
            <div class="mb-2">Nama Penyakit : <span class="text-2xl font-bold text-red-500">{{ $data->disease }}</span>
            </div>
            <div class="mb-2">Persentase Gejala : {{ $data->percentage ?? '0' }}%</div>
            <div class="mb-4">
                <div>Gejala yang dipilih : </div>
                <div class="px-4">
                    @foreach ($symptoms as $index => $item)
                        <div>{{ $index + 1 }}. {{ $item }}</div>
                    @endforeach
                </div>
            </div>
            <div class="mb-2">Solusi : {!! $data->solution !!}</div>
        </div>
    </div>
@endsection
