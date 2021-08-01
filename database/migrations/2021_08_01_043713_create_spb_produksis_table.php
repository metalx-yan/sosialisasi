<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpbProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spb_produksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po');
            $table->string('tanggal');
            $table->string('retur');
            $table->string('customer');
            $table->string('jenis');
            $table->integer('qty');
            $table->string('satuan');
            $table->string('berat');
            $table->string('total_bahan');
            $table->boolean('status')->nullable();
            $table->timestamps();
        });

        Schema::table('spb_produksis', function (Blueprint $table) {
            $table->unsignedBigInteger('proses_retur_id');

            $table->foreign('proses_retur_id')->references('id')->on('proses_returs')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spb_produksis');
    }
}
