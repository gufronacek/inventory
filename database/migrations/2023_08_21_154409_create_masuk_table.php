<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksi_stok', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_barang');
            $table->integer('stok_awal');
            $table->integer('jumlah');
            $table->dateTime('tanggal');
            $table->string('aksi', 6);
            $table->timestamps();
        });
    }
    // $table->bigIncrements('id_masuk');
    //         $table->integer('id_barang');
    //         $table->integer('jumlah');
    //         $table->dateTime('tanggal');
    //         $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masuk');
    }
};
