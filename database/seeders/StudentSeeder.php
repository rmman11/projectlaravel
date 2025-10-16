<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

use Illuminate\Support\Str;


class StudentSeeder extends Seeder
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
       DB::table('students')->insert([
         'student_name'=>$faker->word,
         'student_address' =>$faker->word,
         'student_state' => $faker->state,
         'student_zip' => $faker->postcode,
         'student_age' => $faker->numberBetween(18, 65),
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
       ]);
    }
}
}