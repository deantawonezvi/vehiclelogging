<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
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
            \App\Client::create([
                'name' => $faker->company,
                'address' => $faker->address,
                'email' => $faker->companyEmail,
                'contact' => $faker->numberBetween(263772000000,263779999999),
                'additional_contact'=>$faker->numberBetween(240291,29999)
            ]);
        }
    }
}
