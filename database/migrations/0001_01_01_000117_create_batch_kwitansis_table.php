<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_kwitansis', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('project_kwitansi_id');
            // Batch Surat Jalan - Invoice - BAST
            $table->string('nama_batch')->nullable();
            $table->integer('jumlah_batch')->nullable();
            $table->string('satuan_batch')->nullable();
            $table->string('keterangan_batch')->nullable();
            // Dimensi Produk Surat Jalan - Invoice - BAST
            $table->float('dimensi_panjang')->nullable();
            $table->float('dimensi_lebar')->nullable();
            $table->float('dimensi_tinggi')->nullable();
            $table->float('dimensi_berat')->nullable();
            $table->timestamps();

            // Adding foreign key constraint
            // $table->foreign('project_kwitansi_id')
            //     ->references('id')
            //     ->on('project_kwitansis')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the project_kwitansis table
        Schema::dropIfExists('project_kwitansis');
    }
}
