<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hdds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('name', 100)->nullable();
            $table->string('serial_no', 100)->nullable();
            $table->string('size', 100)->nullable();
            $table->string('type', 100)->nullable();
            $table->text('content', 300)->nullable();
            $table->enum('status', ['check_in', 'check_out'])->nullable();
            $table->string('giver_name', 100)->nullable();
            $table->string('reciever_name', 100)->nullable();
            $table->string('reciever_email', 100)->nullable();
            $table->string('reciever_mobile', 100)->nullable();
            $table->longText('reciever_justify')->nullable();

            $table->dateTime('check_in_date', 0)->nullable();
            $table->dateTime('check_out_date', 0)->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hdds');
    }
}
