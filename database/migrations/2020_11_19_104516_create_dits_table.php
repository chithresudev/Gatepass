<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hdd_id');
            $table->string('day', 100)->nullable();
            $table->date('date_of_shoot', 0)->nullable();
            $table->string('giver_name', 100)->nullable();
            $table->timestamps();

            $table->foreign('hdd_id')->references('id')->on('hdds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dits');
    }
}
