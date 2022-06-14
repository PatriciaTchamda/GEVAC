<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints(); // au cas ou la table references est creer apres
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('intitule');
            $table->integer('quota');
            $table->integer('semestre');
            $table->integer('PU');
            $table->unsignedBigInteger('niveau_id');
            $table->foreign('niveau_id')
                  ->references('id')
                  ->on('Niveau')
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
        Schema::dropIfExists('matieres');
    }
}
