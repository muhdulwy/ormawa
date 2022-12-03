<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('NIM')->unique();
            $table->string('nama');
            $table->enum('kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('fakultas');
            $table->string('periode');
            $table->string('jabatan');
            $table->string('telp');

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
        Schema::dropIfExists('pengurus');
    }
}
