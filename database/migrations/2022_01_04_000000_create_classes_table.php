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
    Schema::create('classes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('room_number');
        $table->string('building');
        $table->integer('number_of_student');
        $table->unsignedBigInteger('teacher_id');
        $table->unsignedBigInteger('department_id');

        $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

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
        Schema::dropIfExists('classes');
    }
};
