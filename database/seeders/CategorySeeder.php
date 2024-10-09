<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'Web Programming',
            'slug' => 'Web-progamming',
            'color' => 'blue'
        ]);
        Category::create([
            'name'=>'Mechine Lerning',
            'slug' => 'Mechine-Lerning',
            'color' => 'green'
        ]);
        Category::create([
            'name'=>'UI UX',
            'slug' => 'ui-ux',
            'color' => 'yellow'
        ]);
        Category::create([
            'name'=>'Mobile Developer',
            'slug' => 'Mobile-Developer',
            'color' => 'red'
        ]);
    }
}
