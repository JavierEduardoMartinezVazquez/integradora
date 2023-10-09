<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function Prueba()
    {
        return view('control.paginas.prueba');
    }
}
