<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'HTML\CSS'
        ]);
        Category::create([
            'name' => 'Javacript\Jquery\VueJs'
        ]);
        Category::create([
            'name' => 'PHP\Laravel'
        ]);
        Category::create([
            'name' => 'Developer Tidbits'
        ]);
    }
}
