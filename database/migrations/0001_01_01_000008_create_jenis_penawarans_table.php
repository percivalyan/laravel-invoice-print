<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateJenisPenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the table
        Schema::create('jenis_penawarans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pekerjaan')->nullable();
            $table->integer('quantitas')->nullable();
            $table->string('unit')->nullable();
            $table->integer('harga_satuan')->nullable();
            $table->timestamps();
        });

        // Insert default data
        DB::table('jenis_penawarans')->insert([
            [
                'jenis_pekerjaan' => 'Pekerjaan Penggalian Tanah',
                'quantitas' => 500,
                'unit' => 'm3',
                'harga_satuan' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemadatan Tanah',
                'quantitas' => 400,
                'unit' => 'm2',
                'harga_satuan' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pondasi Cakar Ayam',
                'quantitas' => 300,
                'unit' => 'm3',
                'harga_satuan' => 450000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Bata Merah',
                'quantitas' => 1000,
                'unit' => 'pcs',
                'harga_satuan' => 1200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pengecoran Beton',
                'quantitas' => 250,
                'unit' => 'm3',
                'harga_satuan' => 700000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Atap Baja Ringan',
                'quantitas' => 150,
                'unit' => 'm2',
                'harga_satuan' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Lantai Keramik',
                'quantitas' => 200,
                'unit' => 'm2',
                'harga_satuan' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Plafon Gypsum',
                'quantitas' => 500,
                'unit' => 'm2',
                'harga_satuan' => 130000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Pintu dan Jendela',
                'quantitas' => 50,
                'unit' => 'pcs',
                'harga_satuan' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Instalasi Listrik',
                'quantitas' => 200,
                'unit' => 'm',
                'harga_satuan' => 25000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Saluran Drainase',
                'quantitas' => 150,
                'unit' => 'm',
                'harga_satuan' => 90000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Beton Pracetak',
                'quantitas' => 100,
                'unit' => 'm3',
                'harga_satuan' => 950000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Paving Block',
                'quantitas' => 200,
                'unit' => 'm2',
                'harga_satuan' => 85000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Keramik Dinding',
                'quantitas' => 150,
                'unit' => 'm2',
                'harga_satuan' => 170000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pengecatan Dinding',
                'quantitas' => 300,
                'unit' => 'm2',
                'harga_satuan' => 35000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Fasad',
                'quantitas' => 200,
                'unit' => 'm2',
                'harga_satuan' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pembetonan Jalan',
                'quantitas' => 400,
                'unit' => 'm3',
                'harga_satuan' => 800000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Beton Sirkulasi',
                'quantitas' => 100,
                'unit' => 'm3',
                'harga_satuan' => 750000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pembesian Beton',
                'quantitas' => 500,
                'unit' => 'kg',
                'harga_satuan' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Jaringan Air Bersih',
                'quantitas' => 100,
                'unit' => 'm',
                'harga_satuan' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_pekerjaan' => 'Pekerjaan Pemasangan Jaringan Kabel',
                'quantitas' => 100,
                'unit' => 'm',
                'harga_satuan' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
