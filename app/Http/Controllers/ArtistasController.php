<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistasController extends Controller
{
    /**
     * Función principal que muestra los artistas registrados.
     * Pueden ser ordenados ascendentemente por nombre o por nota final
     */
    public function index()
    {
        $artistas = DB::table('artistas');

        $paginador = $artistas->paginate(4);

        return view('artistas.index', [
            'artistas' => $paginador,
        ]);
    }

    /**
     * Función que borra a un alumno de todo el registro,
     * incluyendo sus respectivas notas.
     */
    public function destroy($id)
    {
        $this->findAlumno($id);

        DB::table('notas')->where('alumno_id', $id)->delete();  // Borro toda referencia al alumno en la tabla notas
        DB::table('alumnos')->where('id', $id)->delete();

        return redirect()->back()
            ->with('success', 'Alumno borrado con éxito');
    }

    /**
     * Obtenemos un formulario para generar un nuevo alumno
     */
    public function create()
    {
        $alumno = (object) [
            'nombre' => null,
        ];
        return view('alumnos.create', [
            'alumno' => $alumno,
        ]);
    }

    /**
     * Generar un nuevo alumno en el registro
     */
    public function store()
    {
        $validados = $this->validar();

        DB::table('alumnos')
            ->insert([
                'nombre' => $validados['nombre'],
        ]);

        return redirect('/alumnos')
            ->with('success', 'Alumno insertado con éxito.');
    }

    /* Obtenemos un formulario para editar a un alumno existente */
    public function edit($id)
    {
        $alumno = $this->findAlumno($id);

        return view('alumnos.edit', [
            'alumno' => $alumno,
        ]);
    }

    /* Edita un alumno existente del registro */
    public function update($id)
    {
        $validados = $this->validar();
        $this->findAlumno($id);

        DB::table('alumnos')
            ->where('id', $id)
            ->update([
                'nombre' => $validados['nombre'],
        ]);

        return redirect('/alumnos')
            ->with('success', 'Alumno editado con éxito.');
    }

    /**
     * Localiza un alumno registrado a partir de su ID. Si no existe
     * se rederidige a la vista principal del alumnos.
     */
    private function findAlumno($id)
    {
        $alumnos = DB::table('alumnos')
            ->where('id', $id)->get();

        abort_if($alumnos->isEmpty(), 404);

        return $alumnos->first();
    }

    public function criterios($id)
    {
        $alumno = $this->findAlumno($id);

        $notas = DB::table('notas')
            ->select('ce', DB::raw('MAX(nota) AS nota'))
            ->join('ccee', 'ce_id', '=', 'c.id')
            ->where('alumno_id', $id)
            ->groupBy('ce_id', 'ce')
            ->get();

            return view('alumnos.criterios', [
                'alumno' => $alumno,
                'notas' => $notas,
            ]);

        /*
        SELECT ce, max(nota) as nota
        FROM notas
        JOIN ccee c ON  ce_id = c.id
        WHERE alumno_id = ?
        GROUP BY ce_id
        */
    }

    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
        ]);

        return $validados;
    }
}
