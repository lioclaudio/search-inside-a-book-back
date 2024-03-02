<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function viewPDF()
    {
        /*
        $pdfPath = storage_path('exercise-files' . DIRECTORY_SEPARATOR . 'Eloquent_JavaScript.pdf');
        return response()->file($pdfPath);
        */

        $pdfPath = storage_path('exercise-files' . DIRECTORY_SEPARATOR . 'Eloquent_JavaScript.pdf');

        if (file_exists($pdfPath)) {
            // Leer el contenido del archivo PDF
            $pdfContent = file_get_contents($pdfPath);

            // Devolver el contenido del PDF como una respuesta HTTP
            return Response::make($pdfContent, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="Eloquent_JavaScript.pdf"'
            ]);
        } else {
            abort(404, 'PDF not found');
        }
    }
}
