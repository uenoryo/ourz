<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('users');

        $users = [
            [
                'id'       => 1,
                'name'     => 'ourz',
                'email'    => 'ourz@ourz.com',
                'password' => bcrypt('ourz'),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
