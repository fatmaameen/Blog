<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachesPermissions();

    $arrayOfPermission=['','' ,''];



$permissions=collect($arrayOfPermission)->map(function($permission){
     return ['name'=>$permission ,'guard_name'=>'web'];
});

Permission::insert($permissions->toArray());
$role=Role::create([
    'name'=>'super admin'
])->givePermissionTo($arrayOfPermission);


    }
}
