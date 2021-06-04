<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.

     0014\\
     *
     * @return void
     */
    public function up()
    {
          Schema::create('Employees', function (Blueprint $table) {
            $table->id();
           
            $table->char('DDO','8');
            $table->char('PersonalNumber','11');
            $table->char('EmployeeCNIC','13');
            $table->string('EmployeeName');
            $table->date('DateBirth')->nullable();
            $table->char('DeptID','5')->nullable();
            $table->boolean('MaritalStatusID')->nullable();
            $table->string('EmployeeFatherHusbandName')->nullable();
            $table->integer('SDetObj');
            $table->char('Grade','10');
            $table->char('GITypeID','2');
            $table->date('DateRetirement')->nullable();
            $table->date('DateDeath')->nullable();
            $table->integer('AgeOnDate')->nullable();
            $table->char('LegalHeirs');
            $table->string('Status')->nullable();
            $table->bigInteger('Contribution')->nullable();
            $table->integer('user_id')->nullable();
           
            
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
       Schema::dropIfExists('Employees');
    }
}
