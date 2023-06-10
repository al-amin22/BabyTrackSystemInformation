<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggkkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggkk', function (Blueprint $table) {
            $table->increments('id_ang_kk');
            $table->unsignedInteger('idkk');
            $table->foreign('idkk')->references('idkk')->on('kk');
            $table->string('nama', 50);
            $table->date('ttl');
            $table->enum('sex', ['L', 'P']);
            $table->string('hubungan', 50);
            $table->string('pekerjaan', 50);
            $table->string('pendidikan');
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
        Schema::dropIfExists('anggkk');
    }
}
