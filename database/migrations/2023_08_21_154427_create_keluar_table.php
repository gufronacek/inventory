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
        Schema::create('keluar', function (Blueprint $table) {
            $table->bigIncrements('id_keluar');
            $table->integer('id_stock');
            $table->string('jumlah');
            $table->string('penerima');
            $table->string('keterangan');
            $table->dateTime('tanggal');
            $table->timestamps();
        });
    }
    // $table->bigIncrements('id_keluar');
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
        Schema::dropIfExists('keluar');
    }
};
