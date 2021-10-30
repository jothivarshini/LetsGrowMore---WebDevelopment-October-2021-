<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');
Route::get('/teacher/create', [App\Http\Controllers\TeacherController::class, 'create'])->name('teacher.create');
Route::post('/teacher/save', [App\Http\Controllers\TeacherController::class, 'save'])->name('teacher.save');
Route::get('/teacher/edit/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/destroy', [App\Http\Controllers\TeacherController::class, 'destroy'])->name('teacher.destroy');
Route::post('/teacher/update', [App\Http\Controllers\TeacherController::class, 'update'])->name('teacher.update');

Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create'])->name('student.create');
Route::post('/student/save', [App\Http\Controllers\StudentController::class, 'save'])->name('student.save');
Route::get('/student/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/destroy', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
Route::post('/student/update', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
Route::post('/student/ajaxStudentList', [App\Http\Controllers\StudentController::class, 'ajaxStudentList'])->name('student.list');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user/save', [App\Http\Controllers\UserController::class, 'save'])->name('user.save');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::get('/batch', [App\Http\Controllers\BatchController::class, 'index'])->name('batch');
Route::get('/batch/create', [App\Http\Controllers\BatchController::class, 'create'])->name('batch.create');
Route::post('/batch/save', [App\Http\Controllers\BatchController::class, 'save'])->name('batch.save');
Route::get('/batch/edit/{id}', [App\Http\Controllers\BatchController::class, 'edit'])->name('batch.edit');
Route::post('/batch/destroy', [App\Http\Controllers\BatchController::class, 'destroy'])->name('batch.destroy');
Route::post('/batch/update', [App\Http\Controllers\BatchController::class, 'update'])->name('batch.update');

Route::get('/exam', [App\Http\Controllers\ExamController::class, 'index'])->name('exam');
Route::get('/exam/create', [App\Http\Controllers\ExamController::class, 'create'])->name('exam.create');
Route::post('/exam/save', [App\Http\Controllers\ExamController::class, 'save'])->name('exam.save');
Route::get('/exam/edit/{id}', [App\Http\Controllers\ExamController::class, 'edit'])->name('exam.edit');
Route::post('/exam/destroy', [App\Http\Controllers\ExamController::class, 'destroy'])->name('exam.destroy');
Route::post('/exam/update', [App\Http\Controllers\ExamController::class, 'update'])->name('exam.update');
Route::post('/exam/ajaxExamList', [App\Http\Controllers\ExamController::class, 'getAllExam'])->name('exam.list');

Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject');
Route::get('/subject/create', [App\Http\Controllers\SubjectController::class, 'create'])->name('subject.create');
Route::post('/subject/save', [App\Http\Controllers\SubjectController::class, 'save'])->name('subject.save');
Route::get('/subject/edit/{id}', [App\Http\Controllers\SubjectController::class, 'edit'])->name('subject.edit');
Route::post('/subject/destroy', [App\Http\Controllers\SubjectController::class, 'destroy'])->name('subject.destroy');
Route::post('/subject/update', [App\Http\Controllers\SubjectController::class, 'update'])->name('subject.update');
Route::post('/subject/ajaxSubjectList', [App\Http\Controllers\SubjectController::class, 'getAllSubject'])->name('subject.list');

Route::get('/result', [App\Http\Controllers\ResultController::class, 'index'])->name('result');
Route::get('/result/create', [App\Http\Controllers\ResultController::class, 'create'])->name('result.create');
Route::post('/result/save', [App\Http\Controllers\ResultController::class, 'save'])->name('result.save');
Route::get('/result/edit/{id}', [App\Http\Controllers\ResultController::class, 'edit'])->name('result.edit');
Route::post('/result/destroy', [App\Http\Controllers\ResultController::class, 'destroy'])->name('result.destroy');
Route::post('/result/update', [App\Http\Controllers\ResultController::class, 'update'])->name('result.update');
Route::post('/result/ajaxGetResult', [App\Http\Controllers\ResultController::class, 'ajaxGetResult'])->name('result.getResult');

Route::get('/deportment', [App\Http\Controllers\DeportmentController::class, 'index'])->name('deportment');
Route::get('/deportment/create', [App\Http\Controllers\DeportmentController::class, 'create'])->name('deportment.create');
Route::post('/deportment/save', [App\Http\Controllers\DeportmentController::class, 'save'])->name('deportment.save');
Route::get('/deportment/edit/{id}', [App\Http\Controllers\DeportmentController::class, 'edit'])->name('deportment.edit');
Route::post('/deportment/destroy', [App\Http\Controllers\DeportmentController::class, 'destroy'])->name('deportment.destroy');
Route::post('/deportment/update', [App\Http\Controllers\DeportmentController::class, 'update'])->name('deportment.update');
});
Auth::routes();
require 'admin.php';
