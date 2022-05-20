<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MarksController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('createstudent' , [StudentController::class,'createStudent']);
Route::post('addstudent' , [StudentController::class,'addStundent']);
Route::put('updatestudent/{id}' , [StudentController::class,'updateStudent']);
Route::get('student-list' , [StudentController::class,'getStudentList']);
Route::get('student-list-edit/{id}' , [StudentController::class,'editStudentList']);
Route::get('student-list-delete/{id}', [StudentController::class, 'deleteStudent']);
Route::get('createmark' , [MarksController::class,'createMark']);
Route::post('addmark' , [MarksController::class,'addMark']);
Route::put('updatemark/{id}' , [MarksController::class,'updateMark']);
Route::get('mark-list-main' , [MarksController::class,'getMarkListMain']);

Route::get('marklist-list-edit/{id}' , [MarksController::class,'editMarkList']);
Route::get('marklist-list-delete/{id}', [MarksController::class, 'deleteMarkList']);





Route::resource('students', StudentController::class);



