<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin',"description"=>"C'est l'administrateur principal du système"],
            ['name' => 'Promoter',"description"=>"C'est und es utilisateur du système mais qui est capable de publier un evenement"],
            ['name' => 'User',"description"=>"Un simple utilisateur du système"]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
