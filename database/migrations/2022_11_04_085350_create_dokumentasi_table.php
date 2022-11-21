<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('organisasi_id');
            $table->unsignedBigInteger('kegiatan_id');

            /* relation */
            $table->foreign('organisasi_id')->references('id')->on('organisasi');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatan');

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
        Schema::dropIfExists('dokumentasi');
    }
}
