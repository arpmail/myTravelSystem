<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidnewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covidnews', function (Blueprint $table) {
            $table->id();
            $table->string('state')->nullable();
            $table->string('deaths')->nullable();
            $table->string('perMonth')->nullable();
            $table->string('trend')->nullable();
            $table->string('hospitalAdmission')->nullable();
            $table->string('bedUtilise')->nullable();
            $table->string('hospitalTrend')->nullable();
            $table->string('cases')->nullable();
            $table->string('per10k')->nullable();
            $table->string('positiveRate')->nullable();
            $table->string('positiveTrend')->nullable();
            $table->string('fullyVaccinated')->nullable();
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
        Schema::dropIfExists('covidnews');
    }
}
