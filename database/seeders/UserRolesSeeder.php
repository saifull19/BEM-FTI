<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'role_user' => 'BEM FTI'
            ],
            [
                'role_user' => 'HMP'
            ],
            [
                'role_user' => 'Member'
            ],
        ]);
    }
}
