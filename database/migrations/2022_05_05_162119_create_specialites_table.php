<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('specialites', function (Blueprint $table) {
            $table->id();
            $table->string('abreviation');
            $table->string('intitule');
            $table->unsignedBigInteger('filieres_id');
            $table->unsignedBigInteger('niveau_id');
            $table->foreign('filieres_id')
                  ->references('id')
                  ->on('Filieres')
                  ->onDelete('cascade');
            $table->foreign('niveau_id')
                  ->references('id')
                  ->on('Niveau')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('specialites');
    }
}
