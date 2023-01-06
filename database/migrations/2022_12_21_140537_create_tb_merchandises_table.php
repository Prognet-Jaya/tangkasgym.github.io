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
        Schema::create('tb_merchandises', function (Blueprint $table) {
            $table->id();
            $table->string('nama_merchandise')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('harga')->nullable();
            $table->string('merk_merchandise')->nullable();
            $table->string('jenis_merchandise')->nullable();

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
        Schema::dropIfExists('tb_merchandises');
    }
};
