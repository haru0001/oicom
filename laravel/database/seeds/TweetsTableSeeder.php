<?php

use Illuminate\Database\Seeder;
use App\Tweet;

class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 9; $i++) {
            Tweet::create([
                'user_id'    => $i,
                'text'       => 'test_text' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
