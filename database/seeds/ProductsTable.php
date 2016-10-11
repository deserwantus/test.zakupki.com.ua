<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');
        for ($i = 0; $i < 30; $i++) {
            DB::table('products')->insert([
                'brand' => ucfirst($faker->word),
                'model' => rand(100,1000).' '.strtoupper($faker->word),
            ]);
        }
    }
}
