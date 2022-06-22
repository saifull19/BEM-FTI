<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysDetailProgramKerjas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_program_kerjas', function (Blueprint $table) {
            // membuat relasi antara table detail_users dengan users
            $table->foreign('devisi_id', 'fk_detail_program_to_program')->references('id')->on('program_kerjas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_program_kerjas', function (Blueprint $table) {
            $table->dropForeign('fk_detail_program_to_program');
        });
    }
}
