<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimbangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timbang', function (Blueprint $table) {
            $table->increments('idtimb');
            $table->unsignedInteger('idbalita');
            $table->foreign('idbalita')->references('idbalita')->on('balita');
            $table->date('tgl_timbang');
            $table->string('tempat', 20);
            $table->integer('bb');
            $table->integer('tb');
            $table->enum('status_gizi', ['Baik', 'Kurang', 'Lebih']);
            $table->string('petugas', 100);
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
        Schema::dropIfExists('timbang');
    }
}
