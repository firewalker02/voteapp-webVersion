<?php

use App\Enums\PollStatus;
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
        Schema::create('polls', function (Blueprint $table) {
             $table->id();
            $table->string('title');
            $table->foreignId('created_by')->constrained('users');
            $table->dateTime("start_date");
            $table->dateTime('end_date');//2022-12-11 00:00:00 as an example
            $table->timestamps();
            $table->enum('status',array_column(PollStatus::cases(),'value'))->default('PENDING');
            
           // $table->enum('status',array_column(PollStatus::cases(),'value'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
};
