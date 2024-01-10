<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPernyataan extends Model
{
    use HasFactory;

    protected $table = 'surat_pernyataan';
    protected $fillable = [
        'id_user',
        'formtype',
        'kegiatan',
        'nama',
        'keterangan',
        'jabatan',
        'tingkatan',
        'tahun',
        'no_sk',
        'sertifikat',
        'nilai',
    ];
}
