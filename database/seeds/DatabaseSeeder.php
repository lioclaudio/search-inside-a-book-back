<?php


use Database\Seeders\BooksPagesTableSeeder;
use Database\Seeders\BooksTableSeeder;
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
        $this->call(BooksTableSeeder::class);
        //$this->call(BooksPagesTableSeeder::class);
        //$this->call(\App\database\seeds\BooksTableSeeder::class);
    }
}
