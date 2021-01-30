<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInStudentCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_course', function (Blueprint $table) {
            $table->renameColumn('name', 'student_course_name');
            $table->renameColumn('description', 'student_course_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_course', function (Blueprint $table) {
            $table->renameColumn('student_course_description', 'description');
        });
    }
}
