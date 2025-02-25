<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan',
        ]);
        Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);
        Category::create([
            'name' => 'Penelitian',
            'slug' => 'penelitian',
        ]);
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming',
        ]);

    }
}
