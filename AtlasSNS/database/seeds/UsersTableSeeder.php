<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ユーザー初期設定
        DB::table('users')->insert([
            'username' => 'ホヤぼーや',
            'mail' => 'hoya@gmail.com',
            'password' => bcrypt('hoya123'),
            'bio' => 'ホヤぼーやは気仙沼のゆるキャラです。',
        ]);
    }
}
