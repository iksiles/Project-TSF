<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tsfs', function (Blueprint $table) {
            $table->id();
            $table->string('modelo', 75)->index();
            $table->string('nacionalidad', 75);
            $table->integer('anyo');
            $table->string('motores', 75);
            $table->string('img', 75);
            $table->string('type', 10);
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
        Schema::dropIfExists('tsfs');
    }
};
