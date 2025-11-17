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
    Schema::create('subject_details', function (Blueprint $table) {
        $table->id();
        $table->string('subject_name');
        $table->unsignedBigInteger('course_id');
        $table->unsignedBigInteger('teacher_id')->nullable(); // optional, if teacher assigned

        $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        $table->foreign('teacher_id')->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('subject_details');
    }
};
