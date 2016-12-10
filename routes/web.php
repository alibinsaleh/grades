<?php

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



Route::get('/testvuejs', [ 

	'uses' => 'GradeController@testvuejs',
	'as' => 'test',
	
]);

Route::get('/test/{academic_id}/{course_id}', [ 

	'uses' => 'GradeController@test',
	'as' => 'test',
	'middleware' => 'auth'
]);

Route::get('/students/{classroom}', [
	'uses' => 'StudentController@getAllStudents',
	'as' => 'students',
	'middleware' => 'auth'
]);

// Grades routes
Route::get('/gradesbyclassroom/{classroom}/{course_id}', [
	'uses' => 'GradeController@getGradesEntryByClassroom',
	'as' => 'gradesbyclassroom',
	'middleware' => 'auth'
]);



Route::get('/grades_entry/{student_id}/{course_id}', [
	'uses' => 'GradeController@getGradesEntry',
	'as' => 'grades_entry',
	'middleware' => 'auth'
]);

Route::post('/updategrades/{student_id}/{course_id}', [
	'uses' => 'GradeController@postUpdateGrades',
	'as' => 'update.grades',
	'middleware' => 'auth'
]);


Route::get('/report/{student_id}/{course_id}', [
	'uses' => 'GradeController@getStudentGrade',
	'as' => 'report',
	'middleware' => 'auth'
]);

Route::get('/gradesbyclassroom/{classroom}/{course_id}', [
	'uses' => 'GradeController@getGradesForClassroom',
	'as' => 'getclassroomgrades',
	'middleware' => 'auth'
]);

// Students routes

Route::get('/editstudent/{id}', [
	'uses' => 'StudentController@getEditStudent',
	'as' => 'editstudent',
	'middleware' => 'auth'
]);
Route::post('/editstudent/{id}', [
	'uses' => 'StudentController@postEditStudent',
	'as' => 'edit.student',
	'middleware' => 'auth'
]);

Route::get('/deletestudent/{id}', [
	'uses' => 'StudentController@deleteStudent',
	'as' => 'delete.student',
	'middleware' => 'auth'
]);

// Behaviours Routes
Route::get('/behaviours/{student_id}/{course_id}', [
	'uses' => 'BehaviourController@getBehaviours',
	'as' => 'behaviours',
	'middleware' => 'auth'
]);

Route::get('/deletebehaviour/{id}', [
	'uses' => 'BehaviourController@deleteBehaviour',
	'as' => 'delete.behaviour',
	'middleware' => 'auth'
]);

Route::get('/editbehaviour/{id}', [
	'uses' => 'BehaviourController@editBehaviour',
	'as' => 'edit.behaviour',
	'middleware' => 'auth'
]);

Route::post('/editbehaviour/{id}', [
	'uses' => 'BehaviourController@updateBehaviour',
	'as' => 'update.behaviour',
	'middleware' => 'auth'
]);

Route::post('/savebehaviour', [
	'uses' => 'BehaviourController@saveBehaviour',
	'as' => 'save.behaviour',
	'middleware' => 'auth'
]);

Route::get('/addbehaviour/{student_id}/{course_id}', [
	'uses' => 'BehaviourController@addBehaviour',
	'as' => 'add.behaviour',
	'middleware' => 'auth'
]);

// Participation Routes
Route::get('/participations/{student_id}/{course_id}', [
	'uses' => 'ParticipationController@getParticipations',
	'as' => 'participations',
	'middleware' => 'auth'
]);

Route::get('/participationsbyclassroom/{classroom}/{course_id}', [
	'uses' => 'ParticipationController@getParticipationByClassroom',
	'as' => 'participationsbyclassroom',
	'middleware' => 'auth'
]);

Route::post('/participationsbyclassroom', [
	'uses' => 'ParticipationController@saveClassroomParticipations',
	'as' => 'saveclassroomparticipations',
	'middleware' => 'auth'
]);

Route::get('/deleteparticipation/{id}', [
	'uses' => 'ParticipationController@deleteParticipation',
	'as' => 'delete.participation',
	'middleware' => 'auth'
]);

Route::get('/editparticipation/{id}', [
	'uses' => 'ParticipationController@editParticipation',
	'as' => 'edit.participation',
	'middleware' => 'auth'
]);

Route::post('/editparticipation/{id}', [
	'uses' => 'ParticipationController@updateParticipation',
	'as' => 'update.participation',
	'middleware' => 'auth'
]);

Route::post('/saveparticipation', [
	'uses' => 'ParticipationController@saveParticipation',
	'as' => 'save.participation',
	'middleware' => 'auth'
]);

Route::get('/addparticipation/{student_id}/{course_id}', [
	'uses' => 'ParticipationController@addParticipation',
	'as' => 'add.participation',
	'middleware' => 'auth'
]);




Route::get('/admin/register_all', [
	'uses' => 'RegisterController@register_all',
	'as' => 'register_all'
]);



Auth::routes();

// Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
// Route::post('admin_login', 'AdminAuth\LoginController@login');
// Route::post('admin_logout', 'AdminAuth\LoginController@logout');
// Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
// Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
// Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
// Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
// Route::post('admin_register', 'AdminAuth\RegisterController@register');


Route::get('/home', 'HomeController@index');
// Route::get('donwload-file', 'HomeController@downloadFile');
// Route::get('/admin_home', 'AdminHomeController@index');
