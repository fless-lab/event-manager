<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::findByName("Admin");

        $admin = User::create([
            'firstname' => "Abdou-Raouf",
            'lastname' => "ATARMLA",
            'username' => "fless",
            'phone' => "+228 96858733",
            'email' => "achilleatarmla@gmail.com",
            'password' => Hash::make("fless"),
            'role_id'=>$admin_role->id
        ]);
    }
}
