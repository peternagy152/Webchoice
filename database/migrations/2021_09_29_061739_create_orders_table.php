<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->unique();
            $table -> integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->integer('phone');
            $table->string('address');
            $table->string('country');
            $table->string('town');
            $table ->string('status')->default('Processing');
            $table -> string('subtotal');
            $table -> string('shipping')->default('25');
            $table -> string('discount')->default('0');
            $table -> string('total');



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
        Schema::dropIfExists('orders');
    }
}
