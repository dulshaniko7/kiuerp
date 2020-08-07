<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_requirements', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('edu_req',255);
            $table->string('pro_req',255);
            $table->string('work_req',255);
            $table->string('ref_req',255);

            $table->dateTime("updated_on")->nullable();
            $table->unsignedInteger("created_by")->nullable();
            $table->unsignedInteger("updated_by")->nullable();
            $table->unsignedInteger("deleted_by")->nullable();

            $table->foreignId('course_id')->constrained('courses','course_id');
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
        Schema::dropIfExists('course_requirements');
    }
}
