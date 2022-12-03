<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('kategori');
            $table->text('dokumentasi')->nullable();
            $table->unsignedBigInteger('organisasi_id');

            /* relation */
            $table->foreign('organisasi_id')->references('id')->on('organisasi');

            /* timestamp */
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
        Schema::dropIfExists('prestasi');
    }
}
