<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('members');

        $members = [
            [
                'teams_users_id' => 1,
                'priority'       => 4,
            ],
            [
                'teams_users_id' => 2,
                'priority'       => 4,
            ],
            [
                'teams_users_id' => 3,
                'priority'       => 1,
            ],
        ];

        foreach ($members as $member) {
            DB::table('members')->insert($member);
        }
    }
}
