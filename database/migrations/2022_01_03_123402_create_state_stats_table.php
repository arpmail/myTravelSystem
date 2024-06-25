<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_stats', function (Blueprint $table) {
            $table->id();
            $table->string('stateCase')->nullable();
            $table->string('district')->nullable();
            $table->string('clusterName')->nullable();
            $table->string('category')->nullable();
            $table->string('totalCases')->nullable();
            $table->string('activeCases')->nullable();
            $table->string('posRate')->nullable();
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
        Schema::dropIfExists('state_stats');
    }
}
