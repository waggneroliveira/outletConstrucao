<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title', 191);
            $table->decimal('amount', 12,2)->nullable();
            $table->boolean('required')->default('0');
            $table->integer('quantity')->nullable();
            $table->boolean('active')->default('0');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('product_option_categories')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_options');
    }
}
