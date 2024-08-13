<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('public_place');
            $table->string('number');
            $table->string('zip_code',11);
            $table->string('complement');
            $table->string('reference');
            $table->boolean('default')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('NO ACTION');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
}
