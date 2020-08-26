<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('short_code');
            $table->string("country_code_alt", 3)->nullable();
            $table->string("calling_code", 5)->nullable();
            $table->string("currency_code", 10)->nullable();
            $table->string("citizenship", 255)->nullable();
            $table->unsignedTinyInteger("currency_decimals")->nullable();
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
        Schema::dropIfExists('countries');
    }
}
