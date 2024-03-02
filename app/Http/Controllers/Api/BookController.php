<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function show($id)
    {
        $book = Book::findOrFail($id);
        //TODO:agrego la primer pagina del libro que es la potada del mismo
        $imageContent = file_get_contents(storage_path('exercise-files' . DIRECTORY_SEPARATOR . 'Eloquent_JavaScript_pages' . DIRECTORY_SEPARATOR . 'page-001.png'));
        $base64Image = base64_encode($imageContent);
        $book->image_base64 = $base64Image;

        /*
        $pdfContent = file_get_contents(storage_path('exercise-files' . DIRECTORY_SEPARATOR . $book->file_name));
        $base64Pdf = base64_encode($pdfContent);
        $book->book_base64 = $base64Pdf;
        */
        return response()->json([$book]);
    }
}
