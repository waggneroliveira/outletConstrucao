<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MelhorEnvioIntegrationFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('integrations', function (Blueprint $table) {
            $table->text('client_id_me')->nullable();
            $table->text('client_secret_me')->nullable();
            $table->text('token_me')->nullable();
            $table->text('refresh_token_me')->nullable();
            $table->date('token_expires_in_me')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('integration', function (Blueprint $table) {
            //
        });
    }
}
