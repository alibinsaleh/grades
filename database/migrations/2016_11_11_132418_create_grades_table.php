<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('course_id');
            $table->decimal('final_theory_test')->default(0);
            $table->decimal('final_practical_test')->default(0);
            $table->decimal('short_verbal_test')->default(0);
            $table->decimal('short_theory_test')->default(0);
            $table->decimal('projects')->default(0);
            $table->decimal('participationـinteraction')->default(0);
            $table->decimal('homework_performance')->default(0);
            $table->decimal('work_file')->default(0);
            $table->decimal('attendance')->default(0);
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
        Schema::dropIfExists('grades');
    }
}
