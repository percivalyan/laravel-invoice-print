<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUraianKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uraian_kwitansis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_kwitansi_id');
            // Uraian Batch Surat Jalan - Invoice - BAST
            $table->string('nama_uraian')->nullable();
            $table->integer('jumlah_uraian')->nullable();
            $table->string('satuan_uraian')->nullable();
            $table->string('keterangan_uraian')->nullable();
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('batch_kwitansi_id')
                ->references('id')
                ->on('batch_kwitansis')
                ->onDelete('cascade');
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
