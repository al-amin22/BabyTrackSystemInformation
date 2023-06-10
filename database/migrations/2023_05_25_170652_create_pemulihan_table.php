<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemulihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemulihan', function (Blueprint $table) {
            $table->increments('idpulih');
            $table->unsignedInteger('idtimb');
            $table->unsignedInteger('idlacak');
            $table->foreign('idtimb')->references('idtimb')->on('timbang');
            $table->foreign('idlacak')->references('idlacak')->on('lacak');
            $table->date('tgl_konsumsi_awal');
            $table->date('tgl_konsumsi_akhir');
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
        Schema::dropIfExists('pemulihan');
    }
}
