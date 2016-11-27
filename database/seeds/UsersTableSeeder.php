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
            [
                'id'       => 2,
                'name'     => 'ourz2',
                'email'    => 'ourz2@ourz.com',
                'password' => bcrypt('ourz2'),
            ],
            [
                'id'       => 3,
                'name'     => 'ourz3',
                'email'    => 'ourz3@ourz.com',
                'password' => bcrypt('ourz3'),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
