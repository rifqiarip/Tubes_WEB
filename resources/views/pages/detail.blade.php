@extends('index')

@section('content')
    <div class="flex justify-center gap-6 w-full p-12">
        @include('partials.sidebar')
        <div class=" bg-gray-100 rounded-lg flex justify-center flex-col gap-4 p-8 w-full">
            <div class="bg-gray-300 p-4 rounded-xl overflow-auto">
                <table class="border border-gray-800 w-full">
                    <h2 class="font-semibold mb-4 text-xl">Bidang Kegiatan Organisasi dan Kepemimpinan</h2>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>No Sk</th>
                        <th>Tingkat</th>
                        <th>Jabatan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    @if (count($data_penalaran) > 0)
                        @foreach ($data_organisasi as $key => $item)
                            <tr class="bg-white">
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->kegiatan }}</td>
                                <td>{{ $item->no_sk }}</td>
                                <td>{{ $item->tingkatan }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-center">{{ $item->nilai ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('form.organisasi.update', $item->id) }}"
                                        class="bg-blue-500 mb-0.5 p-1 w-full block">
                                        <img class="mx-auto" src="{{ asset('assets/img/pencil-solid.svg') }}"
                                            alt="pencil">
                                    </a>
                                    <a href="{{ route('form.organisasi.delete', $item->id) }}"
                                        class="bg-blue-600 mb-0.5 p-1 w-full block">
                                        <img class="mx-auto" src="{{ asset('assets/img/trash-can-solid.svg') }}"
                                            alt="">
                                    </a>
                                    <a href="{{ route('download', $item->id) }}" class="bg-blue-400 p-1 w-full block">
                                        <img class="mx-auto" src="{{ asset('assets/img/file-pdf-solid.svg') }}"
                                            alt="pdf">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white">
                            <td colspan="9" class="text-center">Tidak Ada Kegiatan</td>
                        </tr>
                    @endif
                </table>
            </div>
            <div class="bg-gray-300 p-4 rounded-xl overflow-auto">
                <table class="border border-gray-800 w-full">
                    <h2 class="font-semibold mb-4 text-xl">Bidang Kegiatan Penalaran dan Keilmuan</h2>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>No Sk</th>
                        <th>Tingkat</th>
                        <th>Jabatan</th>
                        <th>Tahun</th>
                        <th>Keterangan</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                    @if (count($data_penalaran) > 0)
                        @foreach ($data_penalaran as $key => $item)
                            <tr class="bg-white">
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $item->kegiatan }}</td>
                                <td>{{ $item->no_sk }}</td>
                                <td>{{ $item->tingkatan }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td class="text-center">{{ $item->nilai ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('form.penalaran.update', $item->id) }}"
                                        class="bg-blue-500 mb-0.5 p-1 w-full block">
                                        <img class="mx-auto" src="{{ asset('assets/img/pencil-solid.svg') }}"
                                            alt="pencil">
                                    </a>
                                    <a href="{{ route('form.penalaran.delete', $item->id) }}"
                                        class="bg-blue-600 mb-0.5 p-1 w-full block">
                                        <img class="mx-auto" src="{{ asset('assets/img/trash-can-solid.svg') }}"
                                            alt="">
                                    </a>
                                    <a href="{{ route('download', $item->id) }}" class="bg-blue-400 p-1 w-full block">
                                        <img class="mx-auto" src="{{ asset('assets/img/file-pdf-solid.svg') }}"
                                            alt="pdf">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white">
                            <td colspan="9" class="text-center">Tidak Ada Kegiatan</td>
                        </tr>
                    @endif
                </table>
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
