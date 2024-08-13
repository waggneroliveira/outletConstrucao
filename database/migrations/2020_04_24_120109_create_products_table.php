<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->default(0);
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('amount',5,2);
            $table->decimal('promotinal_value',5,2)->nullable();
            $table->boolean('promotion')->default(0)->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
