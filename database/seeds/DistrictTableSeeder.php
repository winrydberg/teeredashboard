<?php

use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            'name' => 'Bawku East',
            'region_id' => 1
        ]);

        DB::table('districts')->insert([
            'name' => 'Bawku West',
            'region_id' => 1
        ]);

        DB::table('districts')->insert([
            'name' => 'Bawku Central',
            'region_id' => 2
        ]);

        DB::table('districts')->insert([
            'name' => 'Bawku North',
            'region_id' => 2
        ]);
    }
}
