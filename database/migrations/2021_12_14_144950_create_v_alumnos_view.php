<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateVAlumnosView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_alumnos AS
             SELECT a.id, a.nombre, round(sum(n.nota)/count(n.nota), 1) AS nota_final
               FROM alumnos a
          LEFT JOIN notas n
                 ON a.id = n.alumno_id
           GROUP BY a.id, a.nombre"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement(
            "DROP VIEW IF EXISTS v_alumnos"
        );
    }
}
