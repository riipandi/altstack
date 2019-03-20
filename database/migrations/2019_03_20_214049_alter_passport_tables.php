<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPassportTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->char('client_id', 26)->change();
        });

        Schema::table('oauth_access_tokens', function (Blueprint $table) {
            $table->char('client_id', 26)->change();
        });

        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->char('id', 26)->change();
        });

        Schema::table('oauth_personal_access_clients', function (Blueprint $table) {
            $table->char('client_id', 26)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oauth_auth_codes', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->change();
        });

        Schema::table('oauth_access_tokens', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->change();
        });

        Schema::table('oauth_clients', function (Blueprint $table) {
            $table->increments('id')->change();
        });

        Schema::table('oauth_personal_access_clients', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->change();
        });
    }
}
