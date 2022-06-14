<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmargementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emargements', function (Blueprint $table) {
            $table->id();
            $table->time('heureDebut');
            $table->time('heureFin');
            $table->time('nombreHeure');
            $table->date('date');
            $table->unsignedBigInteger('matieres_id');
            $table->unsignedBigInteger('mois_id');
            $table->foreign('matieres_id')
                  ->references('id')
                  ->on('Matieres')
                  ->onDelete('restrict');
            $table->foreign('mois_id')
                  ->references('id')
                  ->on('Mois')
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
        Schema::dropIfExists('emargements');
    }
}
