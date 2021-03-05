<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->Integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image');
            $table->date('date_of_birth');
            $table->string('mobile_no');
            $table->string('email');
            $table->string('identity_doc')->nullable();
            $table->string('qualification_doc')->nullable();
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
