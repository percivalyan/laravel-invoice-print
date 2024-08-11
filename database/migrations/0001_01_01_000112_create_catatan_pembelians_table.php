<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_pembelians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_pembelian_id');
            $table->timestamp('waktu_pengiriman')->nullable();
            $table->string('alamat_pengiriman')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('pembayaran')->nullable();
            $table->timestamps();

            $table->foreign('project_pembelian_id')->references('id')->on('project_pembelians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catatan_pembelians');
    }
}
