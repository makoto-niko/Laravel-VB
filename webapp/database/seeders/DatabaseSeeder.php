<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::create(['author_name' => '山田太郎']);
        Author::create(['author_name' => '佐藤花子']);
        $this->call(AuthorsTableSeeder::class);
    }
}
