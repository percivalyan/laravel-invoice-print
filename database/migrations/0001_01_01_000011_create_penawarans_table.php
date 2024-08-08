<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_penawaran_id');
            $table->unsignedBigInteger('jenis_penawaran_id'); // Corrected the column name
            $table->string('pekerjaan');
            $table->integer('quantitas')->nullable();
            $table->string('unit')->nullable();
            $table->integer('harga_satuan')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('project_penawaran_id')->references('id')->on('project_penawarans')->onDelete('cascade');
            $table->foreign('jenis_penawaran_id')->references('id')->on('jenis_penawarans')->onDelete('cascade'); // Corrected table name
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penawarans');
    }
}
