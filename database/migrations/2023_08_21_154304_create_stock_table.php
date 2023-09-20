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
        Schema::create('stock', function (Blueprint $table) {
            $table->bigIncrements('id_stock');
            $table->string('kd_barang');
            $table->string('nm_barang');
            $table->string('Jenis');
            $table->string('merk');
            $table->integer('stock');
            $table->string('lokasi');
            $table->timestamps();
        });
    }
    // $table->bigIncrements('id_stock');
    // $table->integer('id_barang');
    // $table->integer('stock');
    // $table->timestamp('tanggal');
    // $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
};
