@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="mb-4">
        <div class="flex flex-row gap-4 text-[#707EAE]">
            <div>Page</div>
            <div>/</div>
            <div>Dashboard</div>
        </div>
        <div class=" font-semibold text-primary text-4xl">Dashboard</div>
    </div>
    <div class="grid grid-cols-4 gap-6 items-center">
        @foreach ($disease as $item)
            <div class="bg-white p-8 rounded-lg text-gray-500">
                <div class="text-2xl font-semibold">{{ $item->disease }}</div>
                <div class="text-6xl font-semibold">{{ $item->count }} <span class="text-lg font-medium">riwayat</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection
