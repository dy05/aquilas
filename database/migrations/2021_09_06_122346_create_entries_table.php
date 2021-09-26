<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->decimal('quantity');
            $table->decimal('price');
            $table->decimal('total_price');
            $table->date('date')->nullable();
            $table->boolean('active')->default(1);
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('material_id')
                ->nullable()
                ->constrained('materials')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
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
        Schema::dropIfExists('entries');
    }
}
