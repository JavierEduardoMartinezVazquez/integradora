<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\C_businessreporte;
use Illuminate\Http\Request;

class BusinessreporteController extends Controller
{
    public function Businessreporte()
    {
        return view('control.paginas.businessreporte');
    }
    
}
