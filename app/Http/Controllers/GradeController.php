<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class GradeController extends Controller
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

    //get student list
    public function getStudentGradeList(){ 
        $student_grades = DB::table('grades')
            ->leftJoin('users', 'grades.user_id', '=', 'users.id')
            ->leftJoin('student_course', 'grades.student_course_id', '=', 'student_course.id')
            ->orderBy('name', 'asc')
            ->select('grades.*', 'users.name','student_course.student_course_name')
            ->get();

        return $student_grades;
    }

    //update grade by id
    public function updateStudentGrade(Request $request){         
        $update = DB::table('grades')
        ->where('id', $request->id)
        ->update([
            'midterm_grade' => $request->midterm_grade,
            'final_grade' => $request->final_grade,
            'final_rating' => $request->final_rating,
            'remarks' => $request->remarks,
        ]);    
        return $update;      
    } 


    /*******************************************Template functions *********************************/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "OK";
        //return view('student.grade.index');
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
