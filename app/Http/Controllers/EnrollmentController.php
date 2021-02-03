<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\SchoolYear;
use App\Models\User;
use App\Models\Grades;
use DB;


class EnrollmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*******************************************Template functions *********************************/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $courses = Course::pluck('code', 'id');
        $school_year = SchoolYear::pluck('sy_code', 'id');
        $courses->prepend('Select One');
        $school_year->prepend('Select One');
        
        return view('enrollment.index',[
            'courses' => $courses,
            'school_year' => $school_year            
        ]);

    }

    //get student list
    public function getStudentList(){ 
        $students = User::all(); 
        return $students;        
    } 
    
    //get student list enrolled by course and school year
    public function studentEnrolledByCourseAndSchoolYear($courseId = null, $schoolYearId=null){         
        $enrolled_students = DB::table('grades')
            ->leftJoin('users', 'grades.user_id', '=', 'users.id')
            ->leftJoin('student_course', 'grades.student_course_id', '=', 'student_course.id')
            ->orderBy('name', 'asc')
            ->select('grades.id', 'users.name')
            ->where('course_id', $courseId)
            ->where('school_year_id', $schoolYearId)
            ->get();
        return $enrolled_students;
    }     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
