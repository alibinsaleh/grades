<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortPracticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_practicals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('course_id');
            $table->decimal('short_practical_1')->default(0);
            $table->decimal('short_practical_2')->default(0);
            $table->decimal('short_practical_3')->default(0);
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
        Schema::dropIfExists('short_practicals');
    }
}
