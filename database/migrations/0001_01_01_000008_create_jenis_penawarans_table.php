<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('jenis_penawarans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pekerjaan');
            $table->integer('quantitas')->nullable();
            $table->string('unit')->nullable();
            $table->integer('harga_satuan')->nullable();
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
        Schema::dropIfExists('jenis_penawarans');
    }
}
