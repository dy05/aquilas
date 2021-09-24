<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSortirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortirs', function (Blueprint $table) {
            $table->id();
              $table->date('date');
            $table->integer('quantite_sortir');
            $table->integer('prix_total');
             $table->unsignedBigInteger('idUser');
             $table->unsignedBigInteger('idProduit');
             $table->unsignedBigInteger('idMaterielle');
              $table->boolean('archive')->default(0);
            $table->timestamps();
            $table->foreign('iduser')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('sortirs');
    }
}
