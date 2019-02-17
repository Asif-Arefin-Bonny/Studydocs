<?php

use Illuminate\Database\Seeder;

class NoteRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (App\Category::all() as $cat) {
            for ($i = 0; $i < rand(3, 10); $i++) {
                DB::table('note_requests')->insert([
                    'user_id' => rand(1, 30),
                    'category_id' => $cat->id,
                    'description' => 'Some description'
                ]);
            }
        }
    }
}
