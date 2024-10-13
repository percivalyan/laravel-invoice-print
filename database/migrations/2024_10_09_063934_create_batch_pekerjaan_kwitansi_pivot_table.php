<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchPekerjaanKwitansiPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_pekerjaan_kwitansi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_kwitansi_id');
            $table->unsignedBigInteger('pekerjaan_kwitansi_id');

            // Adding foreign key constraints
            $table->foreign('batch_kwitansi_id')
                ->references('id')
                ->on('batch_kwitansis')
                ->onDelete('cascade');

            $table->foreign('pekerjaan_kwitansi_id')
                ->references('id')
                ->on('pekerjaan_kwitansis')
                ->onDelete('cascade');

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
        Schema::dropIfExists('batch_pekerjaan_kwitansi');
    }
}
