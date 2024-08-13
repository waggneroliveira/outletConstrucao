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
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('card_id');
            $table->integer('status')->default(0);
            $table->decimal('amount', 5,2);
            $table->string('coupon')->nullable();
            $table->integer('autorization')->default(0);
            $table->bigInteger('order_integration_id');
            $table->string('payment_integration_id');
            $table->string('payment_method');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('NO ACTION');
            $table->foreign('address_id')->references('id')->on('adresses')->onDelete('NO ACTION');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('CASCADE');
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
