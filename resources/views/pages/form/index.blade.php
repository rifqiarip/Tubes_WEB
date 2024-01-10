@extends('index')

@section('content')
    <div class="flex justify-center gap-6 w-full p-12">
        @include('partials.sidebar')
        <div class="bg-gray-100 rounded-lg flex justify-center flex-col gap-4 p-8 w-full">
            <h1 class="text-xl font-semibold">Pilih bidang kegiatan non akademik atau akademik yang anda
                ikuti</h1>
            <div class="w-full overflow-auto flex flex-col items-center gap-4">
                <div class=" bg-gray-300 p-4 w-full rounded-xl">
                    <div class="flex items-center justify-between gap-2 bg-white rounded-xl p-2 lg:p-4">
                        <a href="{{ route('form.organisasi') }}">
                            <div class="w-5/6">
                                <h2 class="text-lg font-medium text-gray-800">Bidang Kegiatan Organisasi dan
                                    Kepemimpinan
                                </h2>
                                <p class="text-gray-600 text-sm">ORGANISASI YANG PERNAH DIIKUTI.</p>
                            </div>
                        </a>
                        <img src="{{ asset('assets/img/circle-chevron-right-solid.svg') }}" alt="arrow">
                    </div>
                </div>
                <div class="bg-gray-300 p-4 w-full rounded-xl">
                    <div class="flex items-center justify-between gap-2 bg-white rounded-xl p-2 lg:p-4">
                        <a href="{{ route('form.penalaran') }}">
                            <div class="w-5/6">
                                <h2 class="text-lg font-medium text-gray-800">Bidang Kegiatan Penalaran dan Keilmuan
                                </h2>
                                <p class="text-gray-600 text-sm">LOMBA, KEGIATAN, PENELITIAN, KARYA ILMIAH, SEMINAR
                                    MENGENAI
                                    KEILMUAN</p>
                            </div>
                        </a>
                        <img src="{{ asset('assets/img/circle-chevron-right-solid.svg') }}" alt="arrow">
                    </div>
                </div>
            </div>
            @include('partials.back')
        </div>
    </div>

    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif
@endsection
@section('js')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
