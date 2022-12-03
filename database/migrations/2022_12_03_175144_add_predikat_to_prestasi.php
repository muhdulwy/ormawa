<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPredikatToPrestasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->enum('predikat', ['Emas', 'Perak', 'Perunggu']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            //
        });
    }
}
