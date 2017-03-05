<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/edit/{id}','EditController@index');
Route::get('/editdata/{id}','CourseController@updatedata');
Route::get('/singlecourseupdateview/{id}','CourseController@updatedataview');
Route::get('/singlecourseupdate/{id}','CourseController@update');
Route::get('/singlecourses/{id}','CourseController@singlecourse');
Route::get('/userid','UserController@show');
Route::get('/useraccess','CourseController@useraccess');
Route::get('/create','CourseController@create');
Route::get('/courses','CourseController@index');
Route::get('/singleupdate/{id}','CourseController@updatedata');
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/editcourses','CourseController@edit');
 //Route::get('/lecturestore','LectureController@store');
//Route::get('/enroll','EnrollmentController@store');
Route::get('/enrollments', function()
{
   
	return View::make('enrollments');
});
 Route::get('/makecourses', function()
{
   
	return View::make('courses');
});
Route::get('/payments', function()
{
	return View::make('payments');
});
Route::get('/logout', function()
{
	return View::make('home');
});
Route::get('/', function()
{
	return View::make('home');
});
Route::get('/home', function()
{
	return View::make('home2');
});
Route::get('/lectures', function()
{
	return View::make('lectures');
});

Auth::routes();
Route::resource('user', 'UserController');
Route::resource('payment', 'PaymentController');
Route::resource('lecture', 'LectureController');
Route::resource('course', 'CourseController');
Route::resource('enrollment', 'EnrollmentController');
