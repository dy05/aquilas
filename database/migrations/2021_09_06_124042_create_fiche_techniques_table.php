<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFicheTechniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiche_techniques', function (Blueprint $table) {
            $table->id();
             $table->string('reperage');
            // $table->string('designation');
              $table->integer('nombre');
              $table->integer('surface')->nullable();
             $table->string('vis');
               $table->integer('dimlong')->nullable();
              $table->integer('dimlarg')->nullable();
             $table->integer('jumbalong')->nullable();
              $table->integer('jumbalarg')->nullable();
             $table->unsignedBigInteger('idProduit');
              $table->boolean('active')->default(0);
              $table->unsignedBigInteger('idMaterielle');
            $table->timestamps();
            $table->foreign('idProduit')
                    ->references('id')
                    ->on('produits')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('idMaterielle')
                    ->references('id')
                    ->on('materielles')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiche_techniques');
    }
}
