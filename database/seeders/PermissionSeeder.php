<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'view employee'],
            ['name' => 'create employee'],
            ['name' => 'edit employee'],
            ['name' => 'delete employee'],
            ['name' => 'view material'],
            ['name' => 'create material'],
            ['name' => 'edit material'],
            ['name' => 'delete material'],
            ['name' => 'view order_cost'],
            ['name' => 'create order_cost'],
            ['name' => 'edit order_cost'],
            ['name' => 'delete order_cost'],
            ['name' => 'view carrying_cost'],
            ['name' => 'create carrying_cost'],
            ['name' => 'edit carrying_cost'],
            ['name' => 'delete carrying_cost'],
            ['name' => 'view eoq'],
            ['name' => 'create eoq'],
            ['name' => 'edit eoq'],
            ['name' => 'delete eoq'],
            ['name' => 'view schedule'],
            ['name' => 'create schedule'],
            ['name' => 'edit schedule'],
            ['name' => 'delete schedule'],
        ];

        foreach ($permissions as $item) {            
            Permission::create($item);
        }
    }
}
