<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name')->nullable();
            $table->string('scheme')->nullable(); // A/L or O/L 
            $table->string('year_for_examination')->nullable();
            $table->string('subject')->nullable();
            $table->string('date')->nullable(); // sunday monday etc
            $table->string('start_time')->nullable(); 
            $table->string('end_time')->nullable(); 
            $table->string('fee')->nullable(); 
            $table->string('teacherID')->nullable();
            $table->string('status')->nullable(); 
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
        Schema::dropIfExists('institute_classes');
    }
}
