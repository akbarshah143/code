<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupInsuraceRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_insurace_rates', function (Blueprint $table) {
            $table->id();
            $table->string('Grade');
            $table->double('Retirement')->nullable();
            $table->double('Death')->nullable();
            $table->integer('user_id');
            $table->date('BeginDate')->nullable();
            $table->date('EndDate')->nullable();
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
        Schema::dropIfExists('group_insurace_rates');
    }
}
