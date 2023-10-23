<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\C_productos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $productos = C_productos::all(); // Obtener todos los productos
    return view('home', compact('productos'));
}

}
