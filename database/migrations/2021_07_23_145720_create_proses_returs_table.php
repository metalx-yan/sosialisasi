<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesRetursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_returs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po');
            $table->date('tanggal');
            $table->string('retur');
            $table->string('customer');
            $table->integer('qty');
            $table->string('satuan');
            $table->string('keterangan');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('proses_returs', function (Blueprint $table) {
            $table->unsignedBigInteger('barang_id');

            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proses_returs');
    }
}
