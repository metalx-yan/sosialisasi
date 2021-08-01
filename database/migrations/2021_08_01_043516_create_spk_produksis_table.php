<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpkProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spk_produksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po');
            $table->string('retur');
            $table->string('customer');
            $table->string('jenis');
            $table->string('satuan');
            $table->string('mesin');
            $table->string('berat');
            $table->boolean('status')->nullable();
            $table->timestamps();
        });

        Schema::table('spk_produksis', function (Blueprint $table) {
            $table->unsignedBigInteger('retur_penjualan_id');

            $table->foreign('retur_penjualan_id')->references('id')->on('retur_penjualans')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spk_produksis');
    }
}
