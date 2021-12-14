<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('alumno_id');
            $table->unsignedInteger('ccee_id');
            $table->decimal('nota', 4, 2);
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('ccee_id')->references('id')->on('ccee');

            /*
            $table->foreignId('alumno_id')->constrained('alumnos');
            $table->foreignId('ce_id')->constrained('ccee');
            */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
