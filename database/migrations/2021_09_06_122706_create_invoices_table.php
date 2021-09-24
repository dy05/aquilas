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
            $table->string('designation');
            $table->string('dimension')->nullable();
            $table->string('quantity');
            $table->string('unit_price');
            $table->decimal('amount');
            $table->decimal('total_amount');
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->foreignId('user_id')
                ->constrained('Users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('purchase_id')
                ->constrained('purchases')
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
