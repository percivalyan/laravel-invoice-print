<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUraianJenisPekerjaanPenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uraian_jenis_pekerjaan_penawarans', function (Blueprint $table) {
            $table->id();
            $table->string('uraian');
            $table->unsignedBigInteger('jenis_penawaran_id'); // Corrected the column name
            $table->string('jenis_pekerjaan');
            $table->integer('quantitas')->nullable();
            $table->string('unit')->nullable();
            $table->integer('harga_satuan')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('uraian_jenis_pekerjaan_penawarans');
    }
}
