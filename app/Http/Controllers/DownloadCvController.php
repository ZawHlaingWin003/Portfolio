<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadCvController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $filePath = public_path("cv\MyCV.pdf");
        $headers = ['Content-Type: application/pdf'];
        $fileName = 'Zaw-Hlaing-Win.pdf';
        return response()->download($filePath, $fileName, $headers);
    }
}
