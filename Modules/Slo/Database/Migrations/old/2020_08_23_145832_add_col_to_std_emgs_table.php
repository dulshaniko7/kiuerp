<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColToStdEmgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('std_emgs', function (Blueprint $table) {
            $table->string('emg_name')->nullable();
            $table->string('address')->nullable();
            $table->string('emg_tel_residence')->nullable();
            $table->string('emg_tel_work')->nullable();
            $table->string('emg_tel_mobile1')->nullable();
            $table->string('emg_tel_mobile2')->nullable();
            $table->string('relationship')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('std_emgs', function (Blueprint $table) {

        });
    }
}
