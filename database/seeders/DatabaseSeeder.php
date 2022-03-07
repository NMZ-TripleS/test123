<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     CategorySeeder::class,
        //     BookSeeder::class,
        // ]);
        Book::factory()->has(Category::factory()->count(3))->count(3)->create();
    }
}
