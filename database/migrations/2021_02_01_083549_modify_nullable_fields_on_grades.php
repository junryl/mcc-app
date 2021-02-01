<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyNullableFieldsOnGrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->unsignedInteger('midterm_grade')->nullable()->change();
            $table->unsignedInteger('final_grade')->nullable()->change();
            $table->unsignedInteger('final_rating')->nullable()->change();
            $table->unsignedInteger('remarks')->nullable()->change();
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
            $table->unsignedInteger('midterm_grade')->nullable(false)->change();
            $table->unsignedInteger('final_grade')->nullable(false)->change();
            $table->unsignedInteger('final_rating')->nullable(false)->change();
            $table->unsignedInteger('remarks')->nullable(false)->change();
        });
    }
}
