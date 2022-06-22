<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysProgramKerjas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_kerjas', function (Blueprint $table) {
            // membuat relasi antara table detail_users dengan users
            $table->foreign('users_id', 'fk_program_kerjas_to_users')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_kerjas', function (Blueprint $table) {
            $table->dropForeign('fk_program_kerjas_to_users');
        });
    }
}
