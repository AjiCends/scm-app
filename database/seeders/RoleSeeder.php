<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $allpermission = [
            'view employee',
            'create employee',
            'edit employee',
            'delete employee',
            'view material',
            'create material',
            'edit material',
            'delete material',
            'view order_cost',
            'create order_cost',
            'edit order_cost',
            'delete order_cost',
            'view carrying_cost',
            'create carrying_cost',
            'edit carrying_cost',
            'delete carrying_cost',
            'view eoq',
            'create eoq',
            'edit eoq',
            'delete eoq',
            'view schedule',
            'create schedule',
            'edit schedule',
            'delete schedule',
        ];

        $employeepermission = [
            'view employee',
            'view material',
            'view order_cost',
            'view carrying_cost',
            'view eoq',
            'view schedule',
        ];

        
        $superadmin = Role::create(['name' => 'superadmin']); 
        $superadmin->syncPermissions($allpermission);

        $employee = Role::create(['name' => 'employee']); 
        $employee->syncPermissions($employeepermission);
        
        
    }
}
