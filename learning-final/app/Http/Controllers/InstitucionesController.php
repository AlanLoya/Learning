<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituciones;

class InstitucionesController extends Controller
{
    static function selectInstituciones(){
        $select = Instituciones::select('id', 'nombre', 'calle', 'numero', 'cp', 'telefono')->get();
        return $select;
    }
    
}
