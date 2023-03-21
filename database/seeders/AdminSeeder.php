<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'firstname' => "Damelan",
            'lastname' => "KOMBATE",
            'username' => "albatros",
            'phone' => "+228 98984003",
            'email' => "kombatedamelan@gmail.com",
            'password' => Hash::make("albatros"),
            'role_id'=>$admin_role->id,
            'validated'=>true,
            "email_verified_at"=>Carbon::now()
        ]);
    }
}
