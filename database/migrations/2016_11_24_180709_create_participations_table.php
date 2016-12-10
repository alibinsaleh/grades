<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('course_id');
            $table->string('participation_type')->default('مشاركة صفية');
            $table->decimal('participation_grade')->default(1.0);
            $table->string('day_name')->default('الاحد');
            $table->string('day')->default('1');
            $table->string('month')->default('1');
            $table->string('year')->default('1438');
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
        Schema::dropIfExists('participations');
    }
}
