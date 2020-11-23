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
        $roles = ['Administrator','Subscriber','Author'];

        foreach ($roles as $role){
            Role::create(['name'=>$role]);
        }
        //
    }
}
