<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_kwitansis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_pembelian_id'); // Untuk fetch nomor_po
            $table->string('kepada_yth')->nullable();
            $table->string('nomor_surat_jalan')->nullable();
            $table->string('nomor_invoice')->nullable();
            $table->string('nomor_bast')->nullable();
            $table->string('proyek')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('kendaraan')->nullable();
            $table->string('nomor_polisi')->nullable();
            $table->date('tanggal_surat_jalan')->nullable();
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('project_pembelian_id')
                ->references('id')
                ->on('project_pembelians')
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
