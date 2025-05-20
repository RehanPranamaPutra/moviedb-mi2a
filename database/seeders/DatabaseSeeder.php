<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use CategorySeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\CategorySeeder as SeedersCategorySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(SeedersCategorySeeder::class);
        Movie::factory(10)->create();


    }
}
