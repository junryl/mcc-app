<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentEnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Route::get('/', function () {
//     return view('admin.index');    
// });//enrollment routes

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//student routes
Route::resource('student', StudentController::class);

//student ajax routes
Route::get('/getStudentGradeList', [GradeController::class,'getStudentGradeList']);
Route::post('/updateStudentGrade', [GradeController::class,'updateStudentGrade']);

//grade routes
Route::resource('student/grade', GradeController::class);

//enrollment routes
Route::resource('/enrollment', EnrollmentController::class);

//enrollment routes : ajax
Route::get('/getStudentList', [EnrollmentController::class,'getStudentList']);
Route::get('/studentEnrolledByCourseAndSchoolYear/{courseId}/{shoolYearId}', [EnrollmentController::class,'studentEnrolledByCourseAndSchoolYear'],function ($courseId, $shoolYearId) {});

//enrollment add routes
Route::resource('/enrollment/student/add', StudentEnrollmentController::class);


