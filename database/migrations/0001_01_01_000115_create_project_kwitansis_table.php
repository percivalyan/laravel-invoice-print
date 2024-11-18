<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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

        // Insert data dummy
        DB::table('project_kwitansis')->insert([
            [
                'project_pembelian_id' => 1,
                'kepada_yth' => 'PT. Konstruksi Sejahtera',
                'nomor_surat_jalan' => 'SJ-001-JKT',
                'nomor_invoice' => 'INV-001-JKT',
                'nomor_bast' => 'BAST-001-JKT',
                'proyek' => 'Pembangunan Gedung Perkantoran',
                'lokasi' => 'Jl. Sudirman No. 10, Jakarta Selatan',
                'kendaraan' => 'Truk Box',
                'nomor_polisi' => 'B 1234 XYZ',
                'tanggal_surat_jalan' => '2024-11-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_pembelian_id' => 2,
                'kepada_yth' => 'PT. Infrastruktur Jakarta',
                'nomor_surat_jalan' => 'SJ-002-JKT',
                'nomor_invoice' => 'INV-002-JKT',
                'nomor_bast' => 'BAST-002-JKT',
                'proyek' => 'Renovasi Flyover Pancoran',
                'lokasi' => 'Jl. Gatot Subroto, Jakarta Selatan',
                'kendaraan' => 'Truk Tronton',
                'nomor_polisi' => 'B 5678 ABC',
                'tanggal_surat_jalan' => '2024-11-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_pembelian_id' => 3,
                'kepada_yth' => 'PT. Developer Properti',
                'nomor_surat_jalan' => 'SJ-003-JKT',
                'nomor_invoice' => 'INV-003-JKT',
                'nomor_bast' => 'BAST-003-JKT',
                'proyek' => 'Pembangunan Apartemen',
                'lokasi' => 'Jl. Casablanca No. 45, Jakarta Timur',
                'kendaraan' => 'Pick-Up',
                'nomor_polisi' => 'B 9101 DEF',
                'tanggal_surat_jalan' => '2024-11-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_pembelian_id' => 4,
                'kepada_yth' => 'PT. Jaya Infrastruktur',
                'nomor_surat_jalan' => 'SJ-004-JKT',
                'nomor_invoice' => 'INV-004-JKT',
                'nomor_bast' => 'BAST-004-JKT',
                'proyek' => 'Perbaikan Jalan Tol Lingkar Luar',
                'lokasi' => 'Tol JORR, Jakarta Barat',
                'kendaraan' => 'Truk Kontainer',
                'nomor_polisi' => 'B 1213 GHI',
                'tanggal_surat_jalan' => '2024-11-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_kwitansis');
    }
}
