<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('cart_id')
            ->constrained('carts')
            ->onDelete('cascade')
            ->onUpdate('cascade')->nullable();
            $table->foreignId('bank_id')
            ->constrained('banks')
            ->onDelete('cascade')
            ->onUpdate('cascade')->nullable();
            $table->foreignId('courier_id')
            ->constrained('couriers')
            ->onDelete('cascade')
            ->onUpdate('cascade')->nullable();
            $table->foreignId('number_id')
            ->constrained('numbers')
            ->onDelete('cascade')
            ->onUpdate('cascade')->nullable();
            $table->string('no_invoice')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
