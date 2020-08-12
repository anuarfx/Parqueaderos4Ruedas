<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('marca');
            $table->enum('tipo',['Automovil','Motocicleta']);
            $table->string('modelo');
            $table->bigInteger('propietario_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('vehiculos', function($table)
        {
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
