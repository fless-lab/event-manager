<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Concert',"description"=>""],
            ['name' => 'Soirée',"description"=>""],
            ['name' => 'Anniversaire',"description"=>""],
            ['name' => "Mariage","description"=>""],
            ['name' => 'Brunch',"description"=>""],
            ['name' => 'Special Party',"description"=>""]
        ];

        foreach ($categories as $category) {
            EventCategory::create($category);
        }
    }
}
