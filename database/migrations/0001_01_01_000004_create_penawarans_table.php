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
            $table->unsignedBigInteger('project_penawaran_id')->unique();
            $table->string('uraian')->nullable();
            $table->decimal('qty', 10, 2)->nullable();
            $table->string('unit')->nullable();
            $table->decimal('harga_satuan', 15, 2)->nullable();
            $table->decimal('jumlah', 15, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->text('terbilang')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('project_penawaran_id')->references('id')->on('project_penawarans')->onDelete('cascade');
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
