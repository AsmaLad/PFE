<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attestations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref')->unique()->nullable();
            $table->string('legaliser')->nullable();
            $table->date('dateAtt')->nullable();
            $table->enum('etat', ['En attente', 'Validée', 'Refusée'])->default('En attente');

            $table->integer('id_users')->nullable()->unsigned();
            $table->foreign('id_users')->references('id')->on('users');    

            $table->integer('is_valid')->nullable();
            $table->boolean('consulter')->default(0);
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
        Schema::dropIfExists('attestations');
    }
}
