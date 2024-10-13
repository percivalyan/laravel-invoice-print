<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_pembelians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_pembelian_id');
            $table->string('pembelian');
            $table->timestamps();

            $table->foreign('project_pembelian_id')->references('id')->on('project_pembelians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan_pembelians');
    }
}
