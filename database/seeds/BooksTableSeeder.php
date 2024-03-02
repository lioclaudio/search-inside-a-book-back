<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //TODO: Se genera un solo libro que es el del ejemplo
        DB::table('books')->insert([
            'name' => 'ELOQUENT JAVASCRIPT',
            'description' => 'A Modern Introduction to Programming by Marjin Haverbeke',
            'isbn' => '978-1593279509',
            'language' => 'Ingles',
            'file_name' => 'Eloquent_JavaScript.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //TODO: Se comienza con el llenado de la tabla book_pages en base al JSON
        
        $jsonFile = storage_path('exercise-files/Eloquent_JavaScript.json');
        $jsonData = json_decode(file_get_contents($jsonFile), true);
        
        $firstBookId = DB::table('books')->first()->id;

        foreach ($jsonData as $pageData) {

            $pageNumber = str_pad($pageData['page'], 3, '0', STR_PAD_LEFT);
            $pageImageFile = "page-{$pageNumber}.png";

            DB::table('book_pages')->insert([
                'book_id' => $firstBookId,
                'page' => $pageData['page'],
                'text_content' => $pageData['text_content'],
                'page_image_file' => $pageImageFile,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
