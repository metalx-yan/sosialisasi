<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturPenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_penjualans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po');
            $table->date('tanggal');
            $table->string('retur');
            $table->string('customer');
            $table->integer('qty');
            $table->string('satuan');
            $table->string('keterangan');
            $table->integer('harga_jual');
            $table->integer('total');
            $table->string('status')->nullable();
            $table->string('mesin')->nullable();
            $table->string('planproduksi')->nullable();
            $table->timestamps();
        });

        Schema::table('retur_penjualans', function (Blueprint $table) {
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
        Schema::dropIfExists('retur_penjualans');
    }
}
