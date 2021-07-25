<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bahan');
            $table->double('qty');
            $table->timestamps();
        });

        Schema::table('bahans', function (Blueprint $table) {
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
        Schema::dropIfExists('bahans');
    }
}
