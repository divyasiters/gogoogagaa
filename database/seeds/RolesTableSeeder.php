<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    static $roles =[
        [
            'name' => 'Admin',
            'slug' => 'admin'
        ],
        [
            'name' => 'Customer',
            'slug' => 'customer',
        ],
        [
            'name' => 'Dealer',
            'slug' => 'dealer',
        ],

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(static::$roles as $role)
        {
            Role::create($role);
        }
    }
}
