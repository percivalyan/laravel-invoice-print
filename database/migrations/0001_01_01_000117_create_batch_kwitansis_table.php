<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            // Batch Surat Jalan - Invoice - BAST
            $table->string('nama_batch')->nullable();
            $table->integer('jumlah_batch')->nullable();
            $table->string('satuan_batch')->nullable();
            $table->string('keterangan_batch')->nullable();
            $table->float('harga_batch')->nullable();
            // Dimensi Produk Surat Jalan - Invoice - BAST
            $table->float('dimensi_panjang')->nullable();
            $table->float('dimensi_lebar')->nullable();
            $table->float('dimensi_tinggi')->nullable();
            $table->float('dimensi_berat')->nullable();
            $table->timestamps();
        });

        // Insert data dummy
        DB::table('batch_kwitansis')->insert([
            [
                'nama_batch' => 'Batch Beton Gedung',
                'jumlah_batch' => 50,
                'satuan_batch' => 'm3',
                'keterangan_batch' => 'Beton digunakan untuk struktur lantai dasar',
                'harga_batch' => 10000.0,
                'dimensi_panjang' => 1.0,
                'dimensi_lebar' => 0.5,
                'dimensi_tinggi' => 0.5,
                'dimensi_berat' => 2.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_batch' => 'Batch Baja Kolom Gedung',
                'jumlah_batch' => 100,
                'satuan_batch' => 'kg',
                'keterangan_batch' => 'Baja digunakan untuk kolom utama gedung',
                'harga_batch' => 5000.0,
                'dimensi_panjang' => 6.0,
                'dimensi_lebar' => 0.1,
                'dimensi_tinggi' => 0.1,
                'dimensi_berat' => 10.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_batch' => 'Batch Pasir Gedung',
                'jumlah_batch' => 200,
                'satuan_batch' => 'ton',
                'keterangan_batch' => 'Pasir digunakan untuk campuran beton dan plesteran',
                'harga_batch' => 5000.0,
                'dimensi_panjang' => 2.0,
                'dimensi_lebar' => 1.0,
                'dimensi_tinggi' => 1.0,
                'dimensi_berat' => 1.8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_batch' => 'Batch Beton Jembatan',
                'jumlah_batch' => 30,
                'satuan_batch' => 'm3',
                'keterangan_batch' => 'Beton untuk struktur deck jembatan',
                'harga_batch' => 15000.0,
                'dimensi_panjang' => 2.5,
                'dimensi_lebar' => 1.0,
                'dimensi_tinggi' => 0.5,
                'dimensi_berat' => 3.0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_batch' => 'Batch Aspal Jalan Raya',
                'jumlah_batch' => 300,
                'satuan_batch' => 'ton',
                'keterangan_batch' => 'Aspal digunakan untuk permukaan jalan raya',
                'harga_batch' => 10000.0,
                'dimensi_panjang' => 1.0,
                'dimensi_lebar' => 0.5,
                'dimensi_tinggi' => 0.2,
                'dimensi_berat' => 0.8,
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
        Schema::dropIfExists('batch_kwitansis');
    }
}
