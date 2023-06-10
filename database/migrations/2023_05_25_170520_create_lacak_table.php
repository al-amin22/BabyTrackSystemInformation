<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLacakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lacak', function (Blueprint $table) {
            $table->increments('idlacak');
            $table->unsignedInteger('idtimb');
            $table->foreign('idtimb')->references('idtimb')->on('timbang');
            $table->date('tgl_lacak');
            $table->string('peny_penyerta', 250);
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
        Schema::dropIfExists('lacak');
    }
}
