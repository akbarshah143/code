<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDDOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_d_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('DDO');
            $table->string('DDODesc');
            $table->string('Fund');
            $table->integer('fund_id')->nullable();
            $table->integer('District')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('d_d_o_s');
    }
}
