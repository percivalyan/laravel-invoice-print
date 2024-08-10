<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPenawaranPenawaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_penawaran_penawaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penawaran_id');
            $table->unsignedBigInteger('jenis_penawaran_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('penawaran_id')->references('id')->on('penawarans')->onDelete('cascade');
            $table->foreign('jenis_penawaran_id')->references('id')->on('jenis_penawarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_penawaran_penawaran');
    }
}
