<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->string('command_number')->nullable();
            $table->date('date')->nullable();
            $table->boolean('active')->default(1);
            $table->json('products_list')->nullable();
            $table->json('dimension')->nullable();
            $table->foreignId('product_id')
                ->constrained('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('customer_id')
                ->constrained('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamp('end_at')->nullable();
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
        Schema::dropIfExists('commands');
    }
}
