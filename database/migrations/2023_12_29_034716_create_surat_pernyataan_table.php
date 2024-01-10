<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_pernyataan', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('formtype');
            $table->string('kegiatan');
            $table->string('nama');
            $table->string('keterangan');
            $table->string('jabatan');
            $table->string('tingkatan');
            $table->string('tahun');
            $table->string('no_sk');
            $table->string('sertifikat');
            $table->string('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pernyataan');
    }
};
