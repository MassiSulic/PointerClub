<?php

namespace App\Http\Controllers;

use App\Exports\InscripcionesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class InscripcionesExportController extends Controller
{
    public function export()
    {
        return Excel::download(new InscripcionesExport, 'inscripciones.xlsx');
    }
}

