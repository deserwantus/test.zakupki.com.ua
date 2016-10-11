<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'name' => ucfirst($faker->word).' '.$faker->word,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ]);
        }
    }
}
