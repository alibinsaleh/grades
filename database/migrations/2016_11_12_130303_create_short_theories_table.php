<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortTheoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_theories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('course_id');
            $table->decimal('short_theory_1')->default(0);
            $table->decimal('short_theory_2')->default(0);
            $table->decimal('short_theory_3')->default(0);
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
        Schema::dropIfExists('short_theories');
    }
}
