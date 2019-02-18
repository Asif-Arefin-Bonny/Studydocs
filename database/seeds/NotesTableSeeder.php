<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/leaf.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);

        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/trophy.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);

        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/anchor.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);

        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/hero-logo.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);
        
        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/lego.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);

        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/smile.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);

        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/wheel.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);

        DB::table('notes')->insert([
            'user_id' => 1,
            'note' => '/storage/uploads/hero-area.png',
            'description' => 'Some desctiption',
            'category_id' => 1,
            'type' => 1,
            'name' => 'Some name'
        ]);
    }
}
