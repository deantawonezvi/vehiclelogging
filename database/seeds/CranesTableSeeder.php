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
        \App\Crane::create([
            'id' => 1,
            'name' => 'Crane 1',
            'model' => 'Model 1 ',
            'defect' => 'Broken Window',
            'driver_id' => 1,
        ]);
    }
}
