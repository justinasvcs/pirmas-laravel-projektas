<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdSexCityToFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('friends', function(Blueprint $table) {
            $table->enum('sex', ['m', 'f']) // f arba m
                  ->nullable()
                  ->default(null)
                  ->after('photo');

            $table->string('city')->nullable()->after('photo');

            $table->integer('user_id')->unsigned()->after('id');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('friends', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'sex', 'city']);
        });
    }
}
