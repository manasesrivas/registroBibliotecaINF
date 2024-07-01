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
        Schema::create('readers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastName');
            $table->integer('year')->nullable();
            $table->string('seccion')->nullable();
            $table->string('especialidad');
            $table->string('email')->nullable();
            $table->integer('phoneNumber')->nullable();
            $table->string('address')->nullable();
            $table->boolean('isATeacher')->default(false);
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
        Schema::dropIfExists('readers');
    }
};
