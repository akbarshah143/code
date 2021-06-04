<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LegalHeirs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('LegalHeirs', function (Blueprint $table) {
            $table->id();
            $table->integer('legalHeirID')->nullable();
            $table->string('EmployeeHeirCNIC');
            $table->string('EmployeeHeirName');
            $table->char('RelationID','2');
            $table->string('BankID');
            $table->string('BranchID');
            $table->string('AccountID');
            $table->double('Increase', 15, 2)->nullable();
            $table->double('Amount',15,2)->nullable();
          
            $table->integer('EmployeeID')->nullable();
             $table->integer('user_id')->nullable();

            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('LegalHeirs');
    }
}
