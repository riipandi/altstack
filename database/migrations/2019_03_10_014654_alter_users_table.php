<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('ulid', 26)->index()->after('id');
            $table->string('username', 40)->unique()->after('email');
            $table->string('avatar')->nullable();
            $table->softDeletes();
            $table->index(['email', 'username']);
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
            $table->dropIndex(['ulid', 'email', 'username']);
            $table->dropColumn('ulid');
            $table->dropColumn('username');
            $table->dropColumn('avatar');
        });
    }
}
