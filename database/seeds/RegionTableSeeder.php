<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('regions')->insert([
            'name' => 'Northern Region',
        ]);

        DB::table('regions')->insert([
            'name' => 'Upper East Region',
        ]);

        DB::table('regions')->insert([
            'name' => 'Upper West Region',
        ]);

        DB::table('regions')->insert([
            'name' => 'Savannah Region',
        ]);
    }
}
