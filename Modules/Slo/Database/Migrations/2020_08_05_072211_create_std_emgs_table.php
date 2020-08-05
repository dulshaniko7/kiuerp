<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStdEmgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_emgs', function (Blueprint $table) {
            $table->bigIncrements('std_emg_id');
            $table->string('emg_name', 100);
            $table->text('address');
            $table->string('emg_tel_residence', 255);
            $table->string('emg_tel_work', 25);
            $table->string('emg_tel_mobile1', 25);
            $table->string('emg_tel_mobile2', 25);
            $table->string('relationship', 25);

            $table->foreignId('student_id')->constrained('students', 'student_id');

            $table->dateTime("updated_on")->nullable();
            $table->unsignedInteger("created_by")->nullable();
            $table->unsignedInteger("updated_by")->nullable();
            $table->unsignedInteger("deleted_by")->nullable();
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
        Schema::dropIfExists('std_emgs');
    }
}
