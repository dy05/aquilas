<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
              $table->string('nom');
                $table->string('prenom');
                  $table->string('telephone');
                    $table->string('adress');
                      $table->string('email')->nullable();;
                      $table->string('motdepasse')->nullable();;
                       $table->boolean('archive')->default(0);
                   
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
        Schema::dropIfExists('clients');
    }
}
