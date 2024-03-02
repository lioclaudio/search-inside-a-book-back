<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PdfController extends Controller
{
 
    public function view()
    {
        $pdfPath = storage_path('exercise-files/Eloquent_JavaScript.pdf');
        $response = new StreamedResponse(function () use ($pdfPath) {
            readfile($pdfPath);
        });
        $response->headers->set('Content-Type', 'application/pdf');
        return $response;
    }
}
