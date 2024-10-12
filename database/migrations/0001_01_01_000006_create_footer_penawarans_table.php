<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterPenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_penawarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_penawaran_id')->unique();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
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
        Schema::dropIfExists('footer_penawarans');
    }
}
