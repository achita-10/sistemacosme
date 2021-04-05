<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',50)->unique();
            $table->string('Descripcion',100)->nullable();
            $table->boolean('Condicion')->dafault(1);
            //$table->timestamps();
        });
        //Permite insertar roles
        DB::table('roles')->insert(array('id'=>'1','Nombre'=>'Administrador','Descripcion'=>'Administradores','Condicion'=>'1'));
        DB::table('roles')->insert(array('id'=>'2','Nombre'=>'Auxiliar','Descripcion'=>'Auxiliar','Condicion'=>'1'));
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
