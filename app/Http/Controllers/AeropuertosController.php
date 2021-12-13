<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AeropuertosController extends Controller
{
    public function index()
    {
        $ordenes = ['codigo', 'denominacion'];
        $orden = request()->query('orden') ?: 'codigo';
        abort_unless(in_array($orden, $ordenes), 404);

        $aeropuertos = DB::table('aeropuertos')
            ->orderBy($orden);

        if (($codigo = request()->query('codigo')) !== null) {
            $aeropuertos->where('codigo', 'ilike', "%$codigo%");
        }

        if (($denominacion = request()->query('denominacion')) !== null) {
            $aeropuertos->where('denominacion', 'ilike', "%$denominacion%");
        }

        $paginador = $aeropuertos->paginate(2);
        $paginador->appends(compact(
            'orden',
            'codigo',
            'denominacion'
        ));

        return view('aeropuertos.index', [
            'aeropuertos' => $paginador,
        ]);
    }

    public function oldIndex()
{
  $aeropuertos = DB::select('select * from aeropuertos');
  return view('aeropuertos.index', [
  'aeropuertos' => $aeropuertos,
  ]);
}
}
