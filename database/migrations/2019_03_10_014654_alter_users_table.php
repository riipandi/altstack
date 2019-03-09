<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id', 36)->change();
            $table->string('username', 40)->unique()->after('email');
            $table->string('avatar')->nullable();
            $table->softDeletes();
            $table->index(['email', 'username']);
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->string('user_id', 36)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['email', 'username']);
            $table->bigIncrements('id')->change();
            $table->dropColumn('username');
            $table->dropColumn('avatar');
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable()->change();
        });
    }
}
