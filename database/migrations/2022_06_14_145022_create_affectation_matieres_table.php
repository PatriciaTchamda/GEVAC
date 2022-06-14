<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectationMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectation_matieres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matieres_id');
            $table->unsignedBigInteger('enseignants_id');
            $table->string('etat');
            $table->foreign('matieres_id')
                  ->references('id')
                  ->on('Matieres')
                  ->onDelete('restrict');
            $table->foreign('enseignants_id')
                  ->references('id')
                  ->on('Enseignants')
                  ->onDelete('restrict');
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
        Schema::dropIfExists('affectation_matieres');
    }
}
