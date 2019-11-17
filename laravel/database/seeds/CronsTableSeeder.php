<?php

use Illuminate\Database\Seeder;
use App\Cron;

class CronsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 9; $i++) {
            Cron::create([
                'tweet_id'           => $i,
                'reservation_at'     => date('2019-11-30 00:00:00'),
                'tweet_complate_flg' => false
            ]);
        }
    }
}
