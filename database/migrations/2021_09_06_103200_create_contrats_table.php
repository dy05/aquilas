<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('payement');
             $table->string('numero');
             $table->date('date');
            $table->string('montant')->nullable();
            $table->unsignedBigInteger('idProduit');
            $table->unsignedBigInteger('idClient');
             $table->boolean('archive')->default(0);
            $table->timestamps();
            $table->foreign('idProduit')
                    ->references('id')
                    ->on('produits')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('contrats');
    }
}
