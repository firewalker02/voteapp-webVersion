<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
       
            $table->boolean('has_voted')->default(0);//0 user has not voted ,1 user has already voted
            $table->integer('candidate_voted_for')->default(0);
            $table->boolean('is_admin')->default(0); //1 means user is admin
           // $table->integer('voted')
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
};
