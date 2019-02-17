<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 30; $i++) {
            DB::table('users')->insert([
                'name' => 'User '.$i,
                'email' => $i.'@d.c',
                'password' => bcrypt('bangladesh'),
                'email_verified_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
