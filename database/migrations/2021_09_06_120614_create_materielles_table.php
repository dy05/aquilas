<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materielles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('couleur')->nullable();
            $table->string('photo')->nullable();
            $table->string('dimension')->nullable();
          $table->unsignedBigInteger('idCategorie');
           $table->boolean('archive')->default(0);
            $table->timestamps();
            $table->foreign('idCategorie')
                    ->references('id')
                    ->on('categorie_materielles')
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
        Schema::dropIfExists('materielles');
    }
}
