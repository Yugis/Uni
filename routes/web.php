<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'HomeController@index');


// Authentication
Auth::routes();

// Registering Students
Route::get('register', 'StudentsController@create')->middleware('guest');
Route::post('register', 'StudentsController@store');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware(['guest:instructor,web']);
//Instructors
Route::group(['prefix' => 'instructor'], function () {
  Route::get('/login', 'Auth\InstructorsLoginController@showLoginForm')->name('instructor.login')->middleware(['guest:web,instructor']);
  Route::post('/login', 'Auth\InstructorsLoginController@login')->name('instructor.submit.login');

  Route::get('/register', 'InstructorsController@create')->name('instructor.register')->middleware('guest');
  Route::post('/register', 'InstructorsController@store')->name('instructor.submit.register')->middleware('guest');

  Route::get('/', 'InstructorsController@index')->name('instructor.dashboard')->middleware('auth:instructor');
  Route::get('/courses/schedule', 'InstructorsController@myCourses')->name('instructor.schedule')->middleware('auth:instructor');
  Route::get('/{id}/{slug?}', 'InstructorProfilesController@index')->name('instructor.profile');
  Route::post('/{id}/{slug?}', 'PostsController@store')->name('instructor.post');
  Route::get('/{id}/{slug?}/edit', 'InstructorProfilesController@edit')->name('instructor.profile.edit');
  Route::post('/{id}/{slug?}/edit', 'InstructorProfilesController@update')->name('instructor.profile.store');
});

//Loading Views To View Courses, Studnets And Professors;
Route::get('students', 'StudentsController@index')->middleware(['auth:web,instructor']);

Route::get('/instructors', 'InstructorsController@all')->name('all.instructors')->middleware(['auth:web,instructor']);

Route::get('/courses/{name}', 'CoursesController@show')->name('courses.show');

Route::get('/MyCourses', 'CoursesController@myCourses')->name('student.mycourses');


Route::get('student/{id}/{slug?}', 'StudentProfilesController@index')->name('student.profile');
Route::get('/{id}/{slug?}/edit', 'StudentProfilesController@edit')->name('student.profile.edit');
Route::post('/{id}/{slug?}/edit', 'StudentProfilesController@update')->name('student.profile.edit');

Route::get('/status/{id}', 'StudentsController@check');
Route::get('/toggle/{id}', 'StudentsController@toggle');
Route::get('get_unread', function() {
    return Auth::user()->unreadNotifications;
});

Route::post('mark_as_read', function() {
   Auth::user()->unreadNotifications->markAsRead();
});

Route::get('get_related_posts/{id}', 'PostsController@feed');


// Temporary Routes To Create Courses And Faculties.
Route::get('create.faculty', 'FacultyController@create');
Route::get('create.course', 'CoursesController@create');
Route::post('create.faculty', 'FacultyController@store');
Route::post('create.course', 'CoursesController@store');
