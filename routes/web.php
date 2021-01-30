<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
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
Route::get('/getStudentList', [StudentController::class,'getStudentList']);

//grade routes
Route::resource('student/grade', GradeController::class);


