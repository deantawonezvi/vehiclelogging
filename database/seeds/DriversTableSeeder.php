<?php

use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for($i =0; $i<7; $i++){
            \App\Driver::create([
                'name' => $faker->name,
                'contact_number' => $faker->numberBetween(263772000000,263779999999),
                'drivers_licence_class' => 1,
                'crane_operating_licence' => 1,
                'defensive_licence_expiry_date' => '2017-07-02 22:00:00',

            ]);
        }
    }
}
