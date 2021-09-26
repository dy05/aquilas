<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueDepencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_depences', function (Blueprint $table) {
            $table->id();
            $table->string('motif');
            $table->integer('prix');
            $table->timestamps();
            $table->unsignedBigInteger('user_ids');
              $table->boolean('active')->default(1);

            $table->foreign('user_ids')
                    ->references('id')
                    ->on('Users')
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
        Schema::dropIfExists('historique_depences');
    }
}
