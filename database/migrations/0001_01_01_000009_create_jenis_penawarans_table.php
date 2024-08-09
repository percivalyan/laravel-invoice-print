<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_penawarans', function (Blueprint $table) { 
            $table->id();
            $table->unsignedBigInteger('penawaran_id');
            $table->string('jenis_pekerjaan');
            $table->integer('quantitas')->nullable();
            $table->string('unit')->nullable();
            $table->integer('harga_satuan')->nullable();
            $table->timestamps();

            $table->foreign('penawaran_id')->references('id')->on('penawarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_pekerjaan_penawarans');
    }
}
