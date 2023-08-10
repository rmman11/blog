<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();
     for ($i=0; $i < 50; $i++) {
       DB::table('employees')->insert([
         'first_name' =>$faker->word,
         'last_name' => $faker->word,
         'email' => $faker->unique()->email,
         'phone' => $faker->numerify('###-###-####'),
         'post'=>$faker->word,
         'avatar' =>$faker->image('public/images/employees/',640,480, null, false),
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
       ]);
    }
}
}