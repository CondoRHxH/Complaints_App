<?php

namespace App\Http\Controllers;

use App\Models\Reclamer;
use Barryvdh\DomPDF\Facade\PDF;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $Reclamer = Reclamer::findOrFail($id);
        $pdf = PDF::loadView('Admin.show', compact('Reclamer'));

        // Download the PDF file with a specific name
        return $pdf->download('Admin-show.pdf');
    }
}
