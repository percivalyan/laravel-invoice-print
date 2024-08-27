<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_kwitansis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_kwitansi_id');
            // Catatan Invoice
            $table->string('bank_pembayaran')->nullable();
            $table->string('cabang')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('atas_nama')->nullable();
            // Penanggung Jawab Invoice
            $table->string('penanggung_jawab')->nullable();
            // Penanggung Jawab Surat Jalan - BAST
            // Penerima
            $table->string('nama_penerima')->nullable();
            $table->date('tanggal_diterima_penerima')->nullable();
            $table->time('waktu_diterima_penerima')->nullable();
            // Driver
            $table->string('nama_driver')->nullable();
            $table->date('tanggal_diterima_driver')->nullable();
            $table->time('waktu_diterima_driver')->nullable();
            // Admin
            $table->string('nama_adm_kantor')->nullable();
            $table->date('tanggal_diterima_adm_kantor')->nullable();
            $table->time('waktu_diterima_adm_kantor')->nullable();
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('project_kwitansi_id')
                ->references('id')
                ->on('project_kwitansis')
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
