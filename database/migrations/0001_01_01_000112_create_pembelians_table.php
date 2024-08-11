<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_pembelian_id');
            $table->string('nama_bahan');
            $table->text('keterangan')->nullable();
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 15, 2);
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
        Schema::dropIfExists('pembelians');
    }
}
