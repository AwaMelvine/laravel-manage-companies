<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = new Role;
      $role->name = 'Admin';
      $role->save();

      $user = new User;
      $user->email = "admin@admin.com";
      $user->password = bcrypt('password');
      $user->role_id = Role::whereName('Admin')->first()->id;
      $user->save();
    }
}
