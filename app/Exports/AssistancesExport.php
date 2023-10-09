<?php

namespace App\Exports;use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Carbon\Carbon;
use Illuminate\Contracts\View\View; // create excel from view
use Maatwebsite\Excel\Concerns\FromView; // create excel from view

class AssistancesExport implements WithTitle,WithHeadings,FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    private $columns;
    private $business_id;
    private $entrydate_from;
    private $entrydate_to;

    public function __construct($columns, $business_id, $entrydate_from, $entrydate_to){
        $this->columns = $columns;
        $this->business_id = $business_id;
        $this->entrydate_from = $entrydate_from;
        $this->entrydate_to = $entrydate_to;

    }

    //titulo de la hoja de excel
    public function title(): string{
        return 'Assistance';
    }

    public function headings(): array{
        return $this->columns;
    }


    public function collection(){
        $business_id = $this->business_id;
        $entrydate_from = $this->entrydate_from;
        $entrydate_to = $this->entrydate_to;
        $assitance = DB::table('assistances as a')
        ->leftjoin('users as b', 'a.Usuario', '=', 'b.id')
        ->leftjoin('business as c', 'a.business', '=', 'c.id')
        ->select('a.id', 'b.name as Usuario', 'c.empresa as business', 'c.id as business_id', 'a.Fecha', 'a.Entrada', 'a.Salida', 'a.Observaciones', 'a.status')
        ->where(function($q) use ($business_id, $entrydate_from, $entrydate_to) {
            if($business_id > 0){
                $q->where('c.id', $business_id );
            }
            if($entrydate_from != null){
                $q->whereDate('a.Fecha', '>=', $entrydate_from);
            }
            if($entrydate_to != null){
                $q->whereDate('a.Fecha', '<=', $entrydate_to);
            }
        })
        ->orderBy('id','DESC')
        ->get();
        return $assitance;

    }
    public function view(): View
    {
        $business_id = $this->business_id;
        $entrydate_from = $this->entrydate_from;
        $entrydate_to = $this->entrydate_to;
        $assistance = DB::table('assistances as a')
        ->leftjoin('users as b', 'a.Usuario', '=', 'b.id')
        ->leftjoin('business as c', 'a.business', '=', 'c.id')
        ->select('a.id', 'b.name as Usuario', 'c.empresa as business', 'c.id as business_id', 'a.Fecha', 'a.Entrada', 'a.Salida', 'a.Observaciones', 'a.status')
        ->where(function($q) use ($business_id, $entrydate_from, $entrydate_to) {
            if($business_id > 0){
                $q->where('c.id', $business_id );
            }
            if($entrydate_from != null){
                $q->whereDate('a.Fecha', '>=', $entrydate_from);
            }
            if($entrydate_to != null){
                $q->whereDate('a.Fecha', '<=', $entrydate_to);
            }
        })
        ->orderBy('id','DESC')
        ->get();
        return view('control.paginas.tablaexcel', compact('assistance'));
    }
}
