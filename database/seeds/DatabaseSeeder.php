<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TeamsUsersTableSeeder::class);
        $this->call(MembersTableSeeder::class);
    }

    public static function truncateTable($table)
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table($table)->truncate();
        DB::statement('SET foreign_key_checks = 1');
    }
}
