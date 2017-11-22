<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_regular = Role::where('name', 'regular')->first();
	    $role_admin  = Role::where('name', 'admin')->first();

	    $regular_user = new User();
	    $regular_user->name = 'Regular User';
	    $regular_user->email = 'regular@example.com';
	    $regular_user->password = bcrypt('coldcold');
	    $regular_user->save();
	    $regular_user->roles()->attach($role_regular);

	    $admin_user = new User();
	    $admin_user->name = 'Admin';
	    $admin_user->email = 'admin@example.com';
	    $admin_user->password = bcrypt('coldcold');
	    $admin_user->save();
	    $admin_user->roles()->attach($role_admin);
    }
}
