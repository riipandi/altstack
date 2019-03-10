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
            $table->string('uuid', 36)->after('id');
            $table->renameColumn('name', 'first_name');
            $table->string('last_name')->nullable()->after('name');
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
            $table->dropIndex(['email', 'username']);
            $table->dropColumn('uuid');
            $table->dropColumn('username');
            $table->dropColumn('avatar');
        });
    }
}
