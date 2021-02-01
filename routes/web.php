<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EnrollmentController;

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
// });

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

