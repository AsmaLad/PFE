<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCongesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->increments('id');
            $table->date('DateDeb');
            $table->date('DateFin');
            $table->string('motif');
            $table->integer('Durée');
            $table->date('Date_demnd');
            $table->enum('etat', ['En attente', 'Validée', 'Refusée'])->default('En attente');
            
            $table->boolean('consulter')->default(0);
            $table->integer('is_valid')->nullable();
            
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
        Schema::dropIfExists('conges');
    }
}
