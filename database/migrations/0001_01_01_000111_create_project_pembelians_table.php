<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProjectPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_po');
            $table->string('project');
            $table->date('tanggal_order');
            $table->string('metode_pembayaran');
            $table->string('po_ditunjukan_kepada');
            $table->string('alamat')->nullable();
            $table->string('kontak');
            $table->string('email_mobile_number')->nullable();
            $table->timestamps();
        });

        // Insert data dummy
        DB::table('project_pembelians')->insert([
            [
                'nomor_po' => 'PO-2024-001',
                'project' => 'Pembangunan Gedung Perkantoran Jakarta',
                'tanggal_order' => '2024-11-01',
                'metode_pembayaran' => 'Transfer Bank',
                'po_ditunjukan_kepada' => 'PT. Kontraktor Utama',
                'alamat' => 'Jl. Sudirman No.10, Jakarta Pusat',
                'kontak' => '081234567890',
                'email_mobile_number' => 'info@kontraktorutama.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_po' => 'PO-2024-002',
                'project' => 'Renovasi Jembatan di Bekasi',
                'tanggal_order' => '2024-11-02',
                'metode_pembayaran' => 'Cash',
                'po_ditunjukan_kepada' => 'PT. Infrastruktur Mandiri',
                'alamat' => 'Jl. Bekasi Timur No.21, Bekasi',
                'kontak' => '081987654321',
                'email_mobile_number' => 'support@infrastrukturmandiri.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_po' => 'PO-2024-003',
                'project' => 'Pembangunan Apartemen di Depok',
                'tanggal_order' => '2024-11-03',
                'metode_pembayaran' => 'Kredit',
                'po_ditunjukan_kepada' => 'PT. Konstruksi Modern',
                'alamat' => 'Jl. Margonda Raya No.12, Depok',
                'kontak' => '081345678912',
                'email_mobile_number' => 'sales@konstruksimodern.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nomor_po' => 'PO-2024-004',
                'project' => 'Pembangunan Tol Jakarta-Bogor',
                'tanggal_order' => '2024-11-04',
                'metode_pembayaran' => 'Transfer Bank',
                'po_ditunjukan_kepada' => 'PT. Transportasi Nusantara',
                'alamat' => 'Jl. Gatot Subroto No.8, Jakarta',
                'kontak' => '081298765432',
                'email_mobile_number' => 'contact@transportasinusantara.com',
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
        Schema::dropIfExists('project_pembelians');
    }
}
