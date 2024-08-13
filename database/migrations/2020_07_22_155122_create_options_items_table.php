<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('option_id');
            $table->decimal('amount', 10,2)->nullable();
            $table->integer('quantity');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('order_items')->onDelete('NO ACTION');
            $table->foreign('option_id')->references('id')->on('product_options')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_items');
    }
}
