<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriteriosController extends Controller
{
    /**
     * Función principal que muestra los alumnos registrados.
     * Pueden ser ordenados ascendentemente por nombre o por nota final
     */
    public function index()
    {
        $ordenes = ['ce', 'descripcion'];
        $orden = request()->query('orden') ?: 'ce';
        abort_unless(in_array($orden, $ordenes), 404);

        $alumnos = DB::table('v_alumnos')
            ->orderBy($orden);

        if (($ce = request()->query('ce')) !== null) {
            $alumnos->where('ce', 'ilike', "%$ce%");
        }

        if (($descripcion = request()->query('descripcion')) !== null) {
            $alumnos->where('descripcion', 'ilike', "%$descripcion%");
        }

        $paginador = $alumnos->paginate(4);
        $paginador->appends(compact(
            'orden',
            'ce',
            'descripcion'
        ));

        return view('criterios.index', [
            'criterios' => $paginador,
        ]);
    }
}
