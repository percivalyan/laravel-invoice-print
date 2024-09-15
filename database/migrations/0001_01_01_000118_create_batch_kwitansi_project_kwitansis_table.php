<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchKwitansiProjectKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_kwitansi_project_kwitansis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_kwitansi_id');
            $table->unsignedBigInteger('project_kwitansi_id');
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('batch_kwitansi_id')
                ->references('id')
                ->on('batch_kwitansis')
                ->onDelete('cascade');

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
        Schema::dropIfExists('batch_kwitansi_project_kwitansi');
    }
}
