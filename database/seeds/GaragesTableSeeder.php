<?php

use Illuminate\Database\Seeder;

class GaragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        for($i =0; $i<7; $i++){
            \App\Garage::create([
                'name' => $faker->company,
                'bank_name' => $faker->company,
                'bank_branch' => $faker->city,
                'bank_account_number' => $faker->numberBetween(000000,9999999),
                'contact_person' => $faker->name,
                'contact_number' => $faker->numberBetween(263772000000,263779999999),
            ]);
        }
    }
}
