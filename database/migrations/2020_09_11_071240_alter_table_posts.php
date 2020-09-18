<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('no_of_rooms');
            $table->integer('no_of_staffs');
            $table->integer('no_of_vacancies');
            $table->string('cover_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('no_of_rooms');
            $table->dropColumn('no_of_staffs');
            $table->dropColumn('no_of_vacancies');
            $table->dropColumn('cover_image');
        });
    }
}
