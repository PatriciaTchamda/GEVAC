<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresSpecialitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matieres__specialites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matieres_id');
            $table->unsignedBigInteger('specialite_id');
            $table->string('etat');
            $table->foreign('matieres_id')
                  ->references('id')
                  ->on('Matieres')
                  ->onDelete('restrict');
            $table->foreign('specialite_id')
                  ->references('id')
                  ->on('Specialite')
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
        Schema::dropIfExists('matieres__specialites');
    }
}
