@extends('layouts.home')

@section('title')
    Home
@endsection

@section('name')
    @php
        $user = Auth::user();
    @endphp
    <div class="flex flex-col leading-4">
        <div>Welcome,</div>
        <div class="text-3xl font-semibold text-primary">{{ $user->name }}</div>
    </div>
@endsection

@section('content')
    <div class="flex flex-row gap-4">
        <div class="bg-white hover:bg-[#eff3fd] transition-all rounded-lg py-6 px-8 w-1/3">
            <div class="text-3xl font-semibold text-gray-500">
                Solusi Cerdas untuk Kesehatan Ayam Bangkok Anda
            </div>
            <div class="text-xl mt-3">
                Kami memahami bahwa menjaga kesehatan ayam Bangkok Anda adalah prioritas utama. Oleh karena itu, kami
                menghadirkan sistem pakar yang dirancang khusus untuk membantu Anda dalam mendiagnosa berbagai penyakit yang
                mungkin menyerang ayam Bangkok kesayangan Anda. Dengan menggunakan teknologi terkini dan basis pengetahuan
                yang luas, kami siap membantu Anda menemukan solusi terbaik.
            </div>
        </div>
        <div class="w-2/3">
            <div class="bg-white hover:bg-[#eff3fd] transition-all py-6 px-8 rounded-lg">
                <div class="text-3xl font-semibold text-gray-500">
                    Gejala
                </div>
                <div class="text-2xl mt-3">
                    Kenali Gejala Penyakit Ayam Bangkok Anda
                </div>
                <div class="text-xl mt-2">
                    Memahami gejala adalah langkah pertama dalam menjaga kesehatan ayam Bangkok kesayangan Anda. Pilih
                    gejala yang sesuai dengan kondisi ayam Anda untuk mendapatkan diagnosa dan rekomendasi perawatan yang
                    tepat.
                </div>
                <div class="text-xl mt-2">
                    Apakah ayam Anda menunjukkan tanda-tanda tidak biasa? Kami siap membantu Anda mengidentifikasi masalah
                    kesehatan yang mungkin terjadi. Masukkan gejala yang diamati dan biarkan sistem pakar kami memberikan
                    solusi yang terbaik.
                </div>
            </div>
            <div class="mt-8">
                <a href="/diagnose"
                    class="bg-primary hover:bg-secondary transition-all text-white text-xl px-6 py-3 rounded-lg">Mulai
                    Mendiagnosa</a>
                <a href="/history"
                    class="bg-gray-200 hover:bg-gray-300 transition-all px-8 py-3 text-xl rounded-lg text-gray-500">Riwayat
                    Diagnosa</a>
            </div>
        </div>
    </div>
@endsection
