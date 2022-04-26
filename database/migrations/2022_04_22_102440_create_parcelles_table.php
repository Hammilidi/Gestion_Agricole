<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelles', function (Blueprint $table) {
            $table->increments('par_id');
            $table->string('emp_lieu', 15);
            $table->string('par_nom', 30);
            $table->integer('par_superficie');
            $table->integer('par_prop')->unsigned();
            $table->foreign('par_prop')->references('agr_id')->on('agriculteurs')->onDelete('cascade');
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
        Schema::dropIfExists('parcelles');
    }
}
