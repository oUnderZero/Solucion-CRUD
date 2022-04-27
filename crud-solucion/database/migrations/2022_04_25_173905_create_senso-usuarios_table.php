<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensoUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senso_usuarios', function (Blueprint $table) {
            $table -> id();
            $table -> string('DNI');
            $table -> string('NOMBRE');
            $table -> string('APELLIDO_PATERNO');
            $table -> string('APELLIDO_MATERNO');
            $table -> string('DIRECCION');
            $table -> Integer('TELEFONO');
            $table -> string('FECHA_NACIMIENTO');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
