<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\
        $id = DB::table('admins')->insertGetId([
            'name' => 'Edwin Senunyeme',
            'email' =>'edwinsenunyeme5@gmail.com',
            'password' => Hash::make("password"),
            'phoneno' => '0204052513',
            'level' =>1,
            'district_id'=>1,
        ]);
        $admin1 = Admin::find($id);
        $admin1->assignRole('Super Admin');

        $id = DB::table('admins')->insertGetId([
            'name' => 'Edwin Senunyeme',
            'email' =>'winrydberg@gmail.com',
            'password' => Hash::make("password"),
            'phoneno' => '0204052513',
            'level' =>2,
            'district_id'=>1,
        ]);
        $admin2 = Admin::find($id);
        $admin2->assignRole('Finance Officer');

        $id = DB::table('admins')->insertGetId([
            'name' => 'Solomon Kateng',
            'email' =>'sokat@gmail.com',
            'password' => Hash::make("password"),
            'phoneno' => '0204052513',
            'level' =>3,
            'district_id'=>1,
        ]);
        $admin3 = Admin::find($id);
        $admin3->assignRole('Monitoring Officer');

        $id = DB::table('admins')->insertGetId([
            'name' => 'Jane Doe',
            'email' =>'info@digicodesystems.com',
            'password' => Hash::make("password"),
            'phoneno' => '0204052513',
            'level' =>4,
            'district_id'=>1,
        ]);
        $admin4 = Admin::find($id);
        $admin4->assignRole('Secretary');

        $id = DB::table('admins')->insertGetId([
            'name' => 'Edy Sen',
            'email' =>'edwin@digicodesystems.com',
            'password' => Hash::make("password"),
            'phoneno' => '0204052513',
            'level' =>5,
            'district_id'=>1,
        ]);
        $admin5 = Admin::find($id);
        $admin5->assignRole('Approval Officer');
    }
}
