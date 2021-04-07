<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            // $table->bigInteger('type_id')->unsigned();
            // $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->string('image');
            $table->string('mobile_no');
            $table->integer('gender_id');
            $table->date('date_of_birth');
            $table->string('current_address');
            $table->string('permanent_address');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('marital_status');
            $table->string('identity_doc');
            $table->string('qualification_doc');

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
        Schema::dropIfExists('teachers');
    }
}
