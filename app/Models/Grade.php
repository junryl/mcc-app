<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'faculty_id',
        'midterm_grade',
        'final_grade',
        'final_rating',
        'remarks',  
        'student_course_id',       
    ];

}

