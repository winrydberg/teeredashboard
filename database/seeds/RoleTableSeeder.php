<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Super Admin', 'guard_name'=>'admin']);
        $perm1 = Permission::create(['guard_name' => 'admin', 'name' => 'Super Admin']);
        $role1->givePermissionTo($perm1);

        $role6 = Role::create(['name' => 'District Supervisor', 'guard_name'=>'admin']);
        $perm6 = Permission::create(['guard_name' => 'admin', 'name' => 'District Supervisor']);
        $role6->givePermissionTo($perm6);

        $role2 = Role::create(['name' => 'Finance Officer', 'guard_name'=>'admin']);
        $perm2 = Permission::create(['guard_name' => 'admin', 'name' => 'Finance Officer']);
        $role2->givePermissionTo($perm2);

        $role3 = Role::create(['name' => 'Monitoring Officer', 'guard_name'=>'admin']);
        $perm3= Permission::create(['guard_name' => 'admin', 'name' => 'Monitoring Officer']);
        $role3->givePermissionTo($perm3);

        $role4 = Role::create(['name' => 'Secretary', 'guard_name'=>'admin']);
        $perm4= Permission::create(['guard_name' => 'admin', 'name' => 'Secretary']);
        $role4->givePermissionTo($perm4);

        $role5 = Role::create(['name' => 'Approval Officer', 'guard_name'=>'admin']);
        $perm5= Permission::create(['guard_name' => 'admin', 'name' => 'Approval Officer']);
        $role5->givePermissionTo($perm5);

        $role1->givePermissionTo($perm2);
        $role1->givePermissionTo($perm3);
        $role1->givePermissionTo($perm4);
        $role1->givePermissionTo($perm5);
        $role1->givePermissionTo($perm6);

        ////give all access to district supervisor
        $role6->givePermissionTo($perm2);
        $role6->givePermissionTo($perm3);
        $role6->givePermissionTo($perm4);
        $role6->givePermissionTo($perm5);



    }
}
