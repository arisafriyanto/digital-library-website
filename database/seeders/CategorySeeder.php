<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect(['Pendidikan', 'Novel', 'Puisi', 'Biografi', 'Sejarah']);

        $categories->each(function ($c) {
            Category::create([
                'name' => $c,
                'slug' => Str::slug($c)
            ]);
        });
    }
}
