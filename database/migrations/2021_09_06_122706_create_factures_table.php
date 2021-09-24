<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('designation');
            $table->string('dimension')->nullable();
            $table->string('quantite');
            $table->string('prix_unitaire');
            $table->string('montant');
            $table->integer('montant_total');
              $table->unsignedBigInteger('idUser');
              $table->unsignedBigInteger('idachat');
              $table->boolean('archive')->default(0);
            $table->timestamps();
            $table->foreign('iduser')
                    ->references('id')
                    ->on('Users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('idachat')
                    ->references('id')
                    ->on('achats')
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
        Schema::dropIfExists('factures');
    }
}
