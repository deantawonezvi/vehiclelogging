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
        \App\Driver::create([
            'id' => 1,
            'name' => 'Dean',
            'contact_number' => '0772240291',
            'drivers_licence_class' => 1,
            'crane_operating_licence' => 1,
            'defensive_licence_expiry_date' => '2017-07-02 22:00:00',
        ]);
    }
}
