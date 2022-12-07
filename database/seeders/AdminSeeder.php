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
            'firstname' => "KOMBATE",
            'lastname' => "Damelan",
            'username' => "Stef",
            'phone' => "+228 98984003",
            'email' => "kombatedamelan@gmail.com",
            'password' => Hash::make("steph"),
            'role_id'=>$admin_role->id
        ]);
    }
}
