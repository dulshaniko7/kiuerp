<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeStdEmgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('std_emgs', function (Blueprint $table) {
            $table->dropColumn('emg_name');
            $table->dropColumn('address');
            $table->dropColumn('emg_tel_residence');
            $table->dropColumn('emg_tel_work');
            $table->dropColumn('emg_tel_mobile1');
            $table->dropColumn('emg_tel_mobile2');
            $table->dropColumn('relationship');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
