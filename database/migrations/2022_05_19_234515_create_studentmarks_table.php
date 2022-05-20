<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->string('term');
            $table->string('total_mark');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
/*
                $table->foreign('student_id')
            ->references('id')
            ->on('students')
            ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentmarks');
    }
}
