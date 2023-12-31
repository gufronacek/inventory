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
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id_barang');
            $table->string('kd_barang');
            $table->string('nm_barang');
            $table->integer('stok')->nullable();
            $table->foreignId('id_kategori');
            $table->foreignId('id_satuan');
            $table->timestamps();
        });
    }
    // $table->bigIncrements('id_barang');
    //         $table->string('kd_barang');
    //         $table->string('nm_barang');
    //         $table->string('deskripsi');
    //         $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
};
