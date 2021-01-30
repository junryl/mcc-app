<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToGrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->string('course_id');
            $table->string('faculty_id');
            $table->string('midterm_grade');
            $table->string('final_grade');
            $table->string('final_rating');
            $table->text('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->dropColumn('course_id');
            $table->dropColumn('faculty_id');
            $table->dropColumn('midterm_grade');
            $table->dropColumn('final_grade');
            $table->dropColumn('final_rating');
            $table->dropColumn('remarks');
        });
    }
}
