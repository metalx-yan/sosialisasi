<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerlantarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terlantars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->unique();
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('tahun');
            $table->string('nama');
            $table->string('orangtua');
            $table->bigInteger('nik');
            $table->string('tempat');
            $table->date('tanggal');
            $table->boolean('jenis_kelamin');
            $table->string('alamat');
            $table->string('pelayanan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terlantars');
    }
}
