<?php

use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatabaseSeeder::truncateTable('documents');

        $documents = [
            [
                'id'      => 1,
                'team_id' => 1,
                'title'   => "This is document ONE",
                'body'    => "This is document BODY. I love this service.",
            ],
            [
                'id'      => 2,
                'team_id' => 1,
                'title'   => "This is document TWO",
                'body'    => "This is document BODY. I love this service.",
            ],
            [
                'id'      => 3,
                'team_id' => 1,
                'title'   => "This is document THREE",
                'body'    => "This is document BODY. I love this service.",
            ],
        ];

        foreach ($documents as $document) {
            DB::table('documents')->insert($document);
        }
    }
}
