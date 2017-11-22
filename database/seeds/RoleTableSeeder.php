<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
	    $role_employee->name = 'regular';
	    $role_employee->description = 'Regular User';
	    $role_employee->save();

	    $role_manager = new Role();
	    $role_manager->name = 'admin';
	    $role_manager->description = 'Admin User';
	    $role_manager->save();
    }
}
