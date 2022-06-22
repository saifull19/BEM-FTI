<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysStatusPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status_programs', function (Blueprint $table) {
            // membuat relasi antara table detail_users dengan users
            $table->foreign('program_id', 'fk_status_program_to_detail_program')->references('id')->on('detail_program_kerjas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status_programs', function (Blueprint $table) {
            $table->dropForeign('fk_status_program_to_detail_program');
        });
    }
}
