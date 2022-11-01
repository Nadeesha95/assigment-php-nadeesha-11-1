<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class Role_and_Permisson_controller extends Controller
{
   
//run roals and permission

public function run_commands(){

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'operation_manager']);
        Role::create(['name' => 'sales_manager']);



        Permission::create(['name' => 'create_product']);
        Permission::create(['name' => 'edit_product']);
        Permission::create(['name' => 'delete_product']);
        Permission::create(['name' => 'view_sales']);



        $admin = User::find(1);
        $oparation = User::find(2);
        $slaes = User::find(3);

        $admin->assignRole('admin');
        $oparation->assignRole('operation_manager');
        $slaes->assignRole('sales_manager');

        

        $admin_role = Role::where('name','admin')->first();
        $oparation_role = Role::where('name','operation_manager')->first();
        $sale_role = Role::where('name','sales_manager')->first();


        $admin_role->givePermissionTo('create_product');
        $admin_role->givePermissionTo('edit_product');
        $admin_role->givePermissionTo('delete_product');

        $oparation_role->givePermissionTo('create_product');
        $oparation_role->givePermissionTo('edit_product');
        $oparation_role->givePermissionTo('delete_product');
    
        $sale_role->givePermissionTo('view_sales');

       echo 'role and permisson created sucessfully';


}




}
