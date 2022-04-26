<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->string('int_emp_nss');
            $table->integer('int_par_id')->unsigned();
            $table->date('int_debut');
            $table->integer('int_nb_jrs');
            $table->foreign('int_emp_nss')->references('emp_nss')->on('employes')->onDelete('cascade');
            $table->foreign('int_par_id')->references('par_id')->on('parcelles')->onDelete('cascade');
            $table->primary(['int_emp_nss', 'int_par_id']);
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
        Schema::dropIfExists('interventions');
    }
}
