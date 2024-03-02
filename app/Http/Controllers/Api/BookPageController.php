<?php

namespace App\Http\Controllers\Api;

use App\BookPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookPageController extends Controller
{

    public function search(Request $request)
    {
        $searchText = $request->input('search_text');

        $bookPages = BookPage::whereRaw('LOWER(text_content) LIKE ?', ['%' . strtolower($searchText) . '%'])
            //->with('book')
            ->get();

        foreach ($bookPages as $page) {
            //TODO: Convertir el texto a UTF-8 y limpiar cualquier carácter malformado
            $fullText = mb_convert_encoding($page->text_content, 'UTF-8', 'UTF-8');

            //TODO: Encontrar la posición del texto buscado dentro del texto completo
            $position = mb_stripos($fullText, $searchText);
            if ($position !== false) {
                //TODO: Encontrar el punto "." anterior al texto buscado para  mostrarlo como el parrafo de la coincidencia
                $prevDot = mb_strrpos(mb_substr($fullText, 0, $position), ".");
                if ($prevDot === false) {
                    $prevDot = 0;
                }

                //TODO:  Encoentrar el punto "." siguiente al texto buscado
                $nextDot = mb_strpos($fullText, ".", $position);
                if ($nextDot === false) {
                    $nextDot = mb_strlen($fullText);
                }

                //TODO: Recortar la parte del texto entre los puntos "." anterior y siguiente
                $targetParagraph = mb_substr($fullText, $prevDot + 1, $nextDot - $prevDot - 1);

                //TODO: Agregar el párrafo específico al objeto de la página
                $page->target_paragraph = $targetParagraph;
            }

            //TODO: Agregado de la imagen de la hoja para la visualizacion    
            $imagePath = storage_path('exercise-files' . DIRECTORY_SEPARATOR . 'Eloquent_JavaScript_pages' . DIRECTORY_SEPARATOR . $page->page_image_file);
            $imageContent = file_get_contents($imagePath);
            $base64Image = base64_encode($imageContent);
            $page->image_base64 = $base64Image;
        }

        return response()->json($bookPages);
    }
}
