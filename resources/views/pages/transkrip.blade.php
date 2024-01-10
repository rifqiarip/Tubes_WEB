@extends('index')

@section('content')
    <div class="flex justify-center gap-6 w-full p-12">
        @include('partials.sidebar')
        <div class=" bg-gray-100 rounded-lg flex justify-center flex-col gap-4 p-8 w-full">
            <h1 class="text-xl font-semibold">Transkrip Nilai</h1>
            <div class="bg-gray-300 p-4 w-full rounded-xl overflow-auto">
                <table class="border border-gray-800 w-full">
                    <tr>
                        <th class="w-[20%]">No</th>
                        <th class="w-[60%]">Bidang</th>
                        <th class="w-[20%]">Nilai</th>
                    </tr>
                    <tr class="bg-white">
                        <td class="w-[20%] text-center">1</td>
                        <td class="w-[60%]">Bidang Kegiatan Organisasi dan Kepemimpinan</td>
                        <td class="w-[20%]">{{ $organisasi_nilai ?? '-' }}</td>
                    </tr>
                    <tr class="bg-white">
                        <td class="w-[20%] text-center">2</td>
                        <td class="w-[60%]">Bidang Kegiatan Penalaran dan Keilmuan</td>
                        <td class="w-[20%]">{{ $penalaran_nilai ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="w-[20%]" colspan="2">Total Nilai</td>
                        <td class="w-[20%]">{{ $total_nilai }}</td>
                    </tr>
                    <tr class="">
                        <td class="w-[20%]" colspan="2">Keterangan</td>
                        <td class="w-[20%]">{{ $keterangan }}</td>
                    </tr>
                </table>
            </div>
            @include('partials.back')
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
