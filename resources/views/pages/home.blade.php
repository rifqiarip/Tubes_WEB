@extends('index')

@section('content')
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="text-center mb-12">
            <img class="mx-auto w-[240px] md:w-[260px] lg:w-[300px]" src="{{ asset('assets/img/logo-2.png') }}"
                alt="website logo">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-white mt-4">
                Surat Pernyataan<br>Melaksanakan Penunjang<br>Tugas Dosen
            </h1>
        </div>
        <a href="{{ route('login') }}"
            class="bg-white text-gray-900 px-16 sm:px-20 lg:px-24 py-2 rounded-full text-lg font-semibold uppercase">Login</a>
    </div>
@endsection
