<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->decimal('amount');
            $table->decimal('total_amount');
            $table->timestamps();
            $table->foreignId('user_id')
                ->constrained('Users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('order_id')
                ->nullable()
                ->constrained('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('command_id')
                ->nullable()
                ->constrained('commands')
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
        Schema::dropIfExists('invoices');
    }
}
