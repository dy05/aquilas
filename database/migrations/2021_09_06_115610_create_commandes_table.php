<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_bon_commande')->nullable();
             $table->date('date');
              $table->unsignedBigInteger('idProduit')->nullable();
              $table->unsignedBigInteger('idClient');
               $table->boolean('archive')->default(0);
               $table->boolean('termine')->default(0);
                $table->json('produit')->nullable();
                 $table->json('dimention')->nullable();
            $table->timestamps();
          
          
            $table->foreign('idClient')
                    ->references('id')
                    ->on('clients')
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
        Schema::dropIfExists('commandes');
    }
}
