<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_pembelians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_pembelian_id');
            $table->string('diorder_oleh')->nullable();
            $table->string('diorder_oleh_jabatan')->nullable();
            $table->string('disetujui_oleh')->nullable();
            $table->string('disetujui_oleh_jabatan')->nullable();
            $table->string('order_diterima_oleh')->nullable();
            $table->string('order_diterima_oleh_jabatan')->nullable();
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
        Schema::dropIfExists('footer_pembelians');
    }
}
