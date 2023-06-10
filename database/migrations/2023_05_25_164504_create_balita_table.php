<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->increments('idbalita');
            $table->unsignedInteger('id_ang_kk');
            $table->string('nama_balita')->default('')->nullable();
            $table->foreign('id_ang_kk')->references('id_ang_kk')->on('anggkk');
            $table->integer('bb');
            $table->integer('pb');
            $table->enum('kms', ['L', 'P', 'T']);
            $table->enum('asi_eks', ['Ya', 'Tidak']);
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
        Schema::dropIfExists('balita');
    }
}
