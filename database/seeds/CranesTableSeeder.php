<?php

use Illuminate\Database\Seeder;

class CranesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i =0; $i<10; $i++){
            \App\Crane::create([
                'name' => $faker->firstNameMale,
                'model'=>$faker->company,
                'defect'=>'Broken Window',
                'driver_id'=>$faker->numberBetween(1,7)
            ]);
        }
    }
}
