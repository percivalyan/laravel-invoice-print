<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
