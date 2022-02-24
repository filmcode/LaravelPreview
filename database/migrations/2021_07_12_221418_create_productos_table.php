<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('linea');
            $table->string('catalogo');
            $table->string('modelo');
            $table->string('serie');
            $table->string('color');
            $table->string('ubicacion');
            $table->string('diasPiso');
            $table->decimal('costo');
            $table->string('estatus');
            $table->string('observaciones')->nullable();
            $table->string('apartado');
            $table->string('autorizado')->nullable();
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
        Schema::dropIfExists('productos');
    }
}
