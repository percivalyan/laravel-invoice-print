<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePekerjaanKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan_kwitansis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_kwitansi_id');
            $table->string('pekerjaan')->nullable();

            // Adding foreign key constraint
            $table->foreign('project_kwitansi_id')
                ->references('id')
                ->on('project_kwitansis')
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
        Schema::dropIfExists('pekerjaan_kwitansis');
    }
}
