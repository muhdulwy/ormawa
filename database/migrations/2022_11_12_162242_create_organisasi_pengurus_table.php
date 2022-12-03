<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisasiPengurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisasi_pengurus', function (Blueprint $table) {
            $table->unsignedBigInteger('organisasi_id');
            $table->unsignedBigInteger('pengurus_id');

            /* relation */
            $table->foreign('organisasi_id')->references('id')->on('organisasi')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('pengurus_id')->references('id')->on('pengurus')->onUpdate('cascade')
            ->onDelete('cascade');

            /* timestamp */
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisasi_pengurus');
    }
}
