<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_id')->unique();
            $table->unsignedBigInteger('class_id'); // Menggunakan unsignedBigInteger
            $table->date('birth_date');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade'); // Menambahkan foreign key
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}
