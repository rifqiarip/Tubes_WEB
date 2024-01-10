<?php

namespace App\Http\Controllers;

use App\Models\SuratPernyataan;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.overview');
    }

    public function detail()
    {
        $organisasi = SuratPernyataan::where('formtype', 'organisasi')->get();
        $penalaran =  SuratPernyataan::where('formtype', 'penalaran')->get();

        return view('pages.detail', ['data_organisasi' => $organisasi, 'data_penalaran' => $penalaran]);
    }

    public function transkrip()
    {
        $data = SuratPernyataan::select('nilai', 'formtype')->where('id_user', session('id'))->get();

        $organisasi_nilai = null;
        $penalaran_nilai = null;
        foreach ($data as $item) {
            if ($item->nilai === null) {
                continue;
            }

            if ($item->formtype == 'organisasi') {
                $organisasi_nilai += $item->nilai;
            }

            if ($item->formtype == 'penalaran') {
                $penalaran_nilai += $item->nilai;
            }
        }

        $total = $organisasi_nilai + $penalaran_nilai;
        $keterangan = $total > 100 ? 'Cukup' : 'Kurang';
        if ($total === 0) {
            $total = '-';
            $keterangan = '-';
        }

        return view('pages.transkrip', ['organisasi_nilai' => $organisasi_nilai, 'penalaran_nilai' => $penalaran_nilai, 'total_nilai' => $total, 'keterangan' => $keterangan]);
    }

    public function download($id)
    {
        $filename = SuratPernyataan::find($id)->sertifikat;
        $filePath = storage_path("app/public/$filename");
        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath);
    }

    public function form()
    {
        return view('pages.form.index');
    }

    public function form_organisasi()
    {
        return view('pages.form.organisasi');
    }

    public function form_organisasi_update($id)
    {
        $data = SuratPernyataan::find($id);
        return view('pages.form.organisasi', ['data' => $data]);
    }

    public function form_penalaran()
    {
        return view('pages.form.penalaran');
    }

    public function form_penalaran_update($id)
    {
        $data = SuratPernyataan::find($id);
        return view('pages.form.penalaran', ['data' => $data]);
    }

    public function form_create(Request $request)
    {
        $filepath = $request->file('sertifikat')->store('pdf', 'public');
        $formtype = $request->input('formtype');
        $create = SuratPernyataan::create([
            'id_user' => session('id'),
            'formtype' => $formtype,
            'kegiatan' => $request->input('kegiatan'),
            'nama' => $request->input('nama'),
            'keterangan' => $request->input('keterangan'),
            'jabatan' => $request->input('jabatan'),
            'tingkatan' => $request->input('tingkatan'),
            'tahun' => $request->input('tahun'),
            'no_sk' => $request->input('no_sk'),
            'sertifikat' => $filepath,
        ]);

        $type_message = $formtype == 'penalaran' ? 'Kegiatan Penalaran dan Keilmuan' : 'Kegiatan Organisasi dan Kepemimpinan';
        if ($create) {
            return redirect(route('form'))->with('success', "Bidang $type_message Berhasil Ditambahkan");
        };

        return redirect(route('form'))->with('error', "Bidang $type_message Gagal Ditambahkan");
    }

    public function form_update(Request $request, $id)
    {
        $update_data = [
            'kegiatan' => $request->input('kegiatan'),
            'nama' => $request->input('nama'),
            'keterangan' => $request->input('keterangan'),
            'jabatan' => $request->input('jabatan'),
            'tingkatan' => $request->input('tingkatan'),
            'tahun' => $request->input('tahun'),
            'no_sk' => $request->input('no_sk'),
        ];

        $data = SuratPernyataan::where('id', $id);
        $detail = $data->first();
        $type_message = $detail->formtype == 'penalaran' ? 'Kegiatan Penalaran dan Keilmuan' : 'Kegiatan Organisasi dan Kepemimpinan';
        $file = $request->file('sertifikat');
        if ($file !== null) {
            $filepath = $file->store('pdf', 'public');
            $update_data['sertifikat'] = $filepath;

            $filepath = storage_path("app/public/$detail->sertifikat");
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }

        $update = $data->update($update_data);
        if ($update) {
            return redirect(route('detail'))->with('success', "Bidang $type_message Berhasil Diupdate");
        }

        return redirect(route('detail'))->with('error', "Bidang $type_message Gagal Diupdate");
    }

    public function form_delete($id)
    {
        $find = SuratPernyataan::find($id);
        $type_message = $find->formtype == 'penalaran' ? 'Kegiatan Penalaran dan Keilmuan' : 'Kegiatan Organisasi dan Kepemimpinan';

        $delete = $find->delete();
        if ($delete) {
            $filepath = storage_path("app/public/$find->sertifikat");
            if (file_exists($filepath)) {
                unlink($filepath);
            }

            return redirect()->back()->with('success', "Bidang $type_message Berhasil Dihapus");
        }

        return redirect()->back()->with('error', "Bidang $type_message Gagal Dihapus");
    }

    public function admin()
    {
        $data = SuratPernyataan::where('nilai', null)->get();
        return view('pages.admin', ['data' => $data]);
    }

    public function nilai(Request $request)
    {
        $update = SuratPernyataan::where('id', $request->input('id'))->update(['nilai' => $request->input('nilai')]);
        if ($update) {
            return redirect(route('admin'))->with('success', "Berhasil Update Nilai");
        }

        return redirect(route('admin'))->with('error', "Gagal Update Nilai");
    }
}
