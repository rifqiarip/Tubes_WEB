@extends('index')

@section('content')
    <div class="flex justify-center gap-6 w-full p-12">
        @include('partials.sidebar')
        <div class=" bg-gray-100 rounded-lg flex flex-col gap-4 p-8 w-full">
            <div class="bg-gray-300 p-4 rounded-xl overflow-auto">
                <table class="border border-gray-800 w-full">
                    <h2 class="font-semibold mb-4 text-xl">Bidang Kegiatan Organisasi dan Kepemimpinan</h2>
                            <th>No</th>
                            <th>Kegiatan</th>
                            <th>No Sk</th>
                            <th>Tingkat</th>
                            <th>Jabatan</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                    @if (count($data))
                        @foreach ($data as $key => $item)
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
                                    <button id="edit" class="bg-blue-500 mb-0.5 p-1 w-full block"
                                        data-id="{{ $item->id }}">
                                        <img class="mx-auto" src="{{ asset('assets/img/pencil-solid.svg') }}"
                                            alt="pencil">
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white">
                            <td colspan="9" class="text-center">Tidak ada kegiatan yang perlu dinilai</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" id="backdrop"></div>

        <div class="fixed inset-0 z-10 w-fit mx-auto overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="{{ route('nilai') }}" method="GET">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            @csrf
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-lg text-center font-semibold mb-4 leading-6 text-gray-900">Beri Nilai
                                    </h3>
                                    <input type="hidden" name="id">
                                    <input class="border p-2 rounded-md" type="text" name="nilai">
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm sm:ml-3 sm:w-auto">Nilai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection