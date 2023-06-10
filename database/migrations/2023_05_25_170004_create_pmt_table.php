<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePmtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmt', function (Blueprint $table) {
            $table->increments('idpmt');
            $table->unsignedInteger('idtimb');
            $table->foreign('idtimb')->references('idtimb')->on('timbang');
            $table->date('tgl_pemberianTMT');
            $table->string('jenis_PMT', 100);
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
        Schema::dropIfExists('pmt');
    }
}
