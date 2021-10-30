<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_details', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->string('student_identity_number');
            $table->string('father_name')->nullable();
            $table->string('number')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default(null);
            $table->string('blood_group')->nullable();
            $table->string('batch')->nullable();
            $table->string('deportment')->nullable();
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
        Schema::dropIfExists('student_details');
    }
}
