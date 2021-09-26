<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->integer('surface')->nullable();
            $table->string('vis')->nullable();
            $table->integer('dim_height')->nullable();
            $table->integer('dim_width')->nullable();
            $table->integer('jumba_height')->nullable();
            $table->integer('jumba_width')->nullable();
            $table->boolean('active')->default(1);
            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('material_id')
                ->nullable()
                ->constrained('materials')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('technical_sheets');
    }
}
