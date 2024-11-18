<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->float('harga_uraian')->nullable();
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('batch_kwitansi_id')
                ->references('id')
                ->on('batch_kwitansis')
                ->onDelete('cascade');
        });

        // Insert data dummy
        DB::table('uraian_kwitansis')->insert([
            [
                'batch_kwitansi_id' => 1,
                'nama_uraian' => 'Beton Lantai Dasar',
                'jumlah_uraian' => 20,
                'satuan_uraian' => 'm3',
                'keterangan_uraian' => 'Digunakan untuk lantai dasar Gedung A',
                'harga_uraian' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'batch_kwitansi_id' => 1,
                'nama_uraian' => 'Beton Kolom Utama',
                'jumlah_uraian' => 10,
                'satuan_uraian' => 'm3',
                'keterangan_uraian' => 'Beton untuk kolom struktur Gedung A',
                'harga_uraian' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'batch_kwitansi_id' => 2,
                'nama_uraian' => 'Baja Tulangan Utama',
                'jumlah_uraian' => 50,
                'satuan_uraian' => 'kg',
                'keterangan_uraian' => 'Digunakan pada struktur Gedung B',
                'harga_uraian' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'batch_kwitansi_id' => 3,
                'nama_uraian' => 'Pasir Plesteran',
                'jumlah_uraian' => 30,
                'satuan_uraian' => 'ton',
                'keterangan_uraian' => 'Pasir untuk plesteran dinding Gedung C',
                'harga_uraian' => 50000,
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
        Schema::dropIfExists('uraian_kwitansis');
    }
}
