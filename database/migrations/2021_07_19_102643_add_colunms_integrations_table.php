<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmsIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('integrations', function (Blueprint $table) {
            $table->string('mail_host')->nullable();
            $table->integer('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('path_image_logo_header')->nullable();
            $table->string('path_image_logo_footer')->nullable();
            $table->integer('limit_alert_stock')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('integrations', function (Blueprint $table) {
            $table->dropColumn('mail_host');
            $table->dropColumn('mail_port');
            $table->dropColumn('mail_username');
            $table->dropColumn('mail_password');
            $table->dropColumn('path_image_logo_header');
            $table->dropColumn('path_image_logo_footer');
            $table->dropColumn('limit_alert_stock');
        });
    }
}
