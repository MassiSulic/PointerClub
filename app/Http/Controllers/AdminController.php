<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Mostrar el Dashboard de Admin.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function usuarios()
    {
        return view('admin.usuarios'); // Asegúrate de tener esta vista en resources/views/admin/
    }

    public function inscripciones()
    {
        return view('admin.inscripciones');
    }

    public function socios()
    {
        return view('admin.socios');
    }

    public function resultados()
    {
        return view('admin.resultados');
    }
}
