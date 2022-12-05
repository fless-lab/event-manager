<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where("name","Admin")->first();

        $admin = User::create([
            'firstname' => "Abdou-Raouf",
            'lastname' => "ATARMLA",
            'username' => "fless",
            'phone' => "+228 96858733",
            'email' => "achilleatarmla@gmail.com",
            'password' => Hash::make("fless"),
            'role_id'=>$admin_role->id,
            'active'=>true
        ]);
    }
}
