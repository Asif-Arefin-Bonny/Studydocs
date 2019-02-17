<?php

use Illuminate\Database\Seeder;

class NoteRequestCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (App\NoteRequest::all() as $note) {
            for ($i = 0; $i < rand(3, 10); $i++) {
                DB::table('note_request_comments')->insert([
                    'user_id' => rand(2, 30),
                    'note_id' => $note->id,
                    'comment' => 'Some comment'.$i,
                ]);
            }
        }
    }
}
