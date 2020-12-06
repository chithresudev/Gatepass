<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dit_id');
            $table->longText('details')->nullable();

            $table->foreign('dit_id')->references('id')->on('dits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clips');
    }
}
