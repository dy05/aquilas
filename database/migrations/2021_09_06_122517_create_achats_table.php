<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->string('detail_produit')->nullable();
            $table->integer('quantite_produit');
            $table->date('date');
             $table->unsignedBigInteger('prix_total');
              $table->unsignedBigInteger('verse');
               $table->unsignedBigInteger('reste'); 
                $table->unsignedBigInteger('idUser');
             $table->unsignedBigInteger('idCommande');
           $table->boolean('archive')->default(0);
            $table->timestamps();
            $table->foreign('iduser')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
          $table->foreign('idCommande')
                    ->references('id')
                    ->on('commandes')
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
        Schema::dropIfExists('achats');
    }
}
