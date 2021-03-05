<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('class_id')->unsigned();    
            $table->bigInteger('subject_id')->unsigned();       
           // $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
           // $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->integer('chapter_no');
            $table->string('chapter_name');
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
        Schema::dropIfExists('chapters');
    }
}
