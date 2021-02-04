<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use DB;

class StudentEnrollmentController extends Controller
{

    //enroll students
    public function enrollStudents(Request $request){                 
        $course_id = $request->course_id;
        $school_year_id = $request->school_year_id;
        $user_ids_to_enroll = $request->ids;
        $faculty_id = 1; //for now, default to 1
        $student_course_id = 1; //for now, default to 1

        $data = [];        
        foreach ($user_ids_to_enroll as $key => $value){
            $data[] = ['user_id'=>$value,'course_id'=>$course_id,'faculty_id'=>$faculty_id, 'school_year_id'=> $school_year_id,'student_course_id'=> $student_course_id,'created_at'=>date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s')];
        } 
        
        $result = Grade::insert($data);
        return $result;
    }

    /*******************************************Template functions *********************************/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::all();         
        return view('enrollment.add.index',[
            'students' => $students
        ]);

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
