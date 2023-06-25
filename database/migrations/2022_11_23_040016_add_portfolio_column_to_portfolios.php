<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->date('project_date')->nullable();
            $table->string('project_location')->nullable();
            $table->string('project_client')->nullable();
            $table->string('project_link')->nullable();
            $table->string('project_image1')->nullable();
            $table->string('project_image2')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_github')->nullable();
            $table->string('contact_website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('project_date');
            $table->dropColumn('project_location');
            $table->dropColumn('project_client');
            $table->dropColumn('project_link');
            $table->dropColumn('project_image1');
            $table->dropColumn('project_image2');
            $table->dropColumn('contact_address');
            $table->dropColumn('contact_mail');
            $table->dropColumn('contact_phone');
            $table->dropColumn('contact_github');
            $table->dropColumn('contact_website');
        });
    }
};
