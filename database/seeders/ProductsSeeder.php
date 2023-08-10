<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();
     for ($i=0; $i < 20; $i++) {
       DB::table('products')->insert([
         'categorie_id'=>$faker->randomDigit,
         'name' =>$faker->word,
         'slug' => $faker->word,
         'description' => $faker->paragraph,
         'price'=>$faker->numberBetween($min = 1500, $max = 6000) . "\n",
         'image' =>$faker->image('public/uploads',640,480, null, false),
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
       ]);
    }
}
}
