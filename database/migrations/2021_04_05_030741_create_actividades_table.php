<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion',100);
            $table->string('Titulo',80);
            $table->bigInteger('Categoria')->unsigned();
            $table->foreign('Categoria')->references('id')->on('Categorias');
            $table->date('Fecha');
            $table->boolean('Status')->default(1);
            $table->bigInteger('Id_user')->unsigned();
            $table->foreign('Id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
}
