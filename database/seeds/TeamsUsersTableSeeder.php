<?php

use Illuminate\Database\Seeder;

class TeamsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('teams_users');

        $teams_users = [
            [
                'id'       => 1,
                'team_id'  => 1,
                'user_id'  => 1,
            ],
            [
                'id'       => 2,
                'team_id'  => 1,
                'user_id'  => 2,
            ],
            [
                'id'       => 3,
                'team_id'  => 1,
                'user_id'  => 3,
            ],
        ];

        foreach ($teams_users as $teams_user) {
            DB::table('teams_users')->insert($teams_user);
        }
    }
}
