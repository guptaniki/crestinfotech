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
            $table->id();
            $table->integer('i_customar_id')->unsigned();
            $table->foreign('i_customar_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('v_order_id');
            $table->float('f_final_total');
            $table->string('v_firstname');
            $table->string('v_lastname');
            $table->string('v_email');
            $table->string('v_address');
            $table->enum('v_order_status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
//            $table->string('v_order_status',150);
            $table->enum('v_payment_status', ['pending', 'completed', 'decline'])->default('pending');
            $table->softDeletes();
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
