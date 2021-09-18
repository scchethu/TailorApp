<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'user']);
        Role::create(['name'=>'tailor']);
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345678')
        ]);
        $user->roles()->sync(1);
    }
}
