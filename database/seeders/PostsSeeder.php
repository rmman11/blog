<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * 'user_id',
 
     * 
     */
    public function run()
    {
      $faker = \Faker\Factory::create();
     for ($i=0; $i < 20; $i++) {
       DB::table('posts')->insert([
        'user_id' => $faker->unique()->numberBetween($min = 1, $max = 50),
        'category_id' =>$faker->unique()->numberBetween($min = 1, $max = 50),
        'title' =>$faker->word,
         'content' => $faker->paragraph,
        'slug' => $faker->word,
        'status' =>$faker->randomDigit(),
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
       ]);
    }
}
}
