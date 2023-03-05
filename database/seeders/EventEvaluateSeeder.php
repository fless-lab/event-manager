<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventEvaluate;

class EventEvaluateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $evaluates = [
            ['name' => 'Validé',"description"=>""],
            ['name' => 'En cours',"description"=>""],
            ['name' => 'Rejeté',"description"=>""],
        ];

        foreach ($evaluates as $evaluate) {
            EventEvaluate::create($evaluate);
        }
    }
}
