<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscomprasController extends Controller
{
    public function miscompras(){
        return view("control.paginas.miscompras");
    }
}
