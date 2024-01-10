@extends('index')

@section('content')
    <div class="flex justify-center gap-6 w-full p-12">
        @include('partials.sidebar')
        <div class="bg-gray-100 rounded-lg flex justify-center flex-col gap-4 p-8 w-full">
            <form action="{{ @$data ? route('form.penalaran.update.post', @$data->id) : route('form.penalaran.post') }}"
                method="POST" enctype="multipart/form-data">
                <h1 class="text-xl font-semibold">Bidang Kegiatan Penalaran dan Keilmuan</h1>
                <div class="bg-gray-300 p-6 w-full rounded-xl flex flex-col gap-4 mb-4">
                    @csrf
                    <input type="hidden" name="formtype" value="penalaran">
                    <div class="form-group">
                        <label class="font-medium">Pilih Kegiatan</label>
                        <select class="border rounded-md p-2 bg-white focus:outline-none text-black" name="kegiatan"
                            required>
                            <option value="">Pilih Kegiatan</option>
                            <option value="Mengikuti Kegiatan/Forum Ilmiah"
                                {{ @$data->kegiatan == 'Mengikuti Kegiatan/Forum Ilmiah' ? 'selected' : '' }}>Mengikuti
                                Kegiatan/Forum
                                Ilmiah</option>
                            <option value="Menghasilkan Karya Populer secara Nasional"
                                {{ @$data->kegiatan == 'Menghasilkan Karya Populer secara Nasional' ? 'selected' : '' }}>
                                Menghasilkan
                                Karya Populer secara
                                Nasional
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-medium">Nama Kegiatan</label>
                        <input class="border-0 p-2 rounded-md" type="text" name="nama"
                            value="{{ @$data->nama ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="font-medium">Keterangan</label>
                        <input class="border-0 p-2 rounded-md" type="text" name="keterangan"
                            value="{{ @$data->keterangan ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="font-medium">Jabatan</label>
                        <input class="border-0 p-2 rounded-md" type="text" name="jabatan"
                            value="{{ @$data->jabatan ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="font-medium">Tingkatan</label>
                        <input class="border-0 p-2 rounded-md" type="text" name="tingkatan"
                            value="{{ @$data->tingkatan ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="font-medium">Tahun</label>
                        <input class="border-0 p-2 rounded-md" type="text" name="tahun"
                            value="{{ @$data->tahun ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="font-medium">Nomor Sertifikat/SK</label>
                        <input class="border-0 p-2 rounded-md" type="text" name="no_sk"
                            value="{{ @$data->no_sk ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label class="font-medium">Upload Sertifikat</label>
                        <input class="border-0 p-2 bg-white rounded-md" type="file" name="sertifikat">
                    </div>
                </div>
                <div class="flex justify-center gap-4">
                    <a href="{{ url()->previous() }}"
                        class="rounded-lg text-white flex items-center gap-2 bg-blue-700 px-4 py-2">
                        <img src="{{ asset('assets/img/arrow-left-solid.svg') }}" alt="arrow">Kembali
                    </a>
                    <button class="flex gap-2 items-center rounded-lg text-white bg-yellow-500 px-4 py-2" type="submit">
                        <img src="{{ asset('assets/img/floppy-disk-solid.svg') }}" alt="disk">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
