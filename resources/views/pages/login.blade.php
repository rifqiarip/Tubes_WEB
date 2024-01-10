@extends('index')

@section('content')
    <img class="mx-auto w-[170px]" src="{{ asset('assets/img/lambang-umm-1.png') }}" alt="lambang-umm">
    <form action="{{ route('login.post') }}" method="POST" class="bg-gray-400 p-8 mx-auto w-[300px] rounded-lg">
        @csrf
        <h1 class="text-center uppercase font-semibold mb-2 text-xl text-white">Login</h1>
        <h2 class="text-center mb-4 text-base text-white">Masukan Data Anda</h2>
        @if (session('error'))
            <p class="text-center mb-4 text-sm" style="color: red">Pastikan NIP dan PIC benar</p>
        @endif
        <input class="mb-4 w-full p-3 text-sm rounded-md" placeholder="NIP" name="nip">
        <input class="mb-4 w-full p-3 text-sm rounded-md" placeholder="PIC" name="pic">
        <button class="mx-auto bg-gray-100 text-black py-2 w-full rounded-full uppercase">Login</button>
    </form>
@endsection
