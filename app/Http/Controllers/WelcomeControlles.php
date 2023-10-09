<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeControlles extends Controller
{
    public function Start()
    {
        return view('control.paginas.welcome');
    }
}
