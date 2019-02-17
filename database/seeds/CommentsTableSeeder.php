<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (App\Note::all() as $note) {
            for ($i = 0 ; $i < rand(3, 30); $i++) {
                DB::table('comments')->insert([
                    'user_id' => rand(2, 30),
                    'note_id' => $note->id,
                    'comment' => 'Some comment'.$i,
                ]);
            }
        }
    }
}
