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
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->string('arma', 100);
            $table->string('nacion', 75);
            $table->string('categoria', 75);
            $table->string('municiones', 75);
            $table->string('imgW', 100);
            $table->string('type', 10);
            $table->timestamps();
        });
        // DB::unprepared('ALTER TABLE `weapons` ADD FOREIGN KEY (`modelo_TSF`) REFERENCES `tsfs`(`modelo`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapons');
    }
};
