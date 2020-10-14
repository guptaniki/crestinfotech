<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__items', function (Blueprint $table) {
            $table->id();
            $table->integer('i_order_id')->unsigned();
            $table->foreign('i_order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('i_product_id')->unsigned();
            $table->foreign('i_product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('v_product_name');
            $table->float('f_price');
            $table->float('f_qty');
            $table->float('f_subtotal');

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
        Schema::dropIfExists('order__items');
    }
}
