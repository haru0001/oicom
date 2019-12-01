<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'twitter_id'           => '123456789' .$i,
                'screen_name'          => 'test' .$i,
                'name'                 => 'TEST' .$i,
                'profile_image_url'    => 'https://placehold.jp/50x50.png',
                'twitter_token'        => 'abcdefghi' .$i,
                'twitter_token_secret' => 'abcdefghi' .$i,
                'email'                => 'test' .$i .'@test.com',
                'created_at'           => now(),
                'updated_at'           => now()
            ]);
        }
    }
}
