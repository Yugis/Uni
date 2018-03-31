<?php
Route::get('/', function () {
    return view('welcome');
});

Route::post('/', 'Auth\LoginController@determineLoginType')->name('determine')->middleware(['guest:instructor,web']);

Route::get('home', 'HomeController@index');

// Temp
Route::get('/test', 'StudentsController@test');


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
  Route::get('/schedule', 'InstructorsController@myCourses')->name('instructor.schedule')->middleware('auth:instructor');
  Route::get('/{id}/{slug?}', 'InstructorProfilesController@index')->name('instructor.profile');
  Route::post('/{id}/{slug?}', 'PostsController@store')->name('instructor.post');
  Route::get('/{id}/{slug?}/edit', 'InstructorProfilesController@edit')->name('instructor.profile.edit');
  Route::post('/{id}/{slug?}/edit', 'InstructorProfilesController@update')->name('instructor.profile.store');
});


//Loading Views To View Courses, Studnets And Professors;
Route::get('students', 'StudentsController@index')->middleware(['auth:web,instructor']);

Route::get('/instructors', 'InstructorsController@all')->name('all.instructors')->middleware(['auth:web,instructor']);

Route::get('/courses/{slug}', 'CoursesController@show')->name('courses.show');

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

Route::get('api/get_related_posts/{id}', 'PostsController@feed');


// Temporary Routes To Create Courses And Faculties.
Route::get('create.faculty', 'FacultyController@create');
Route::post('create.faculty', 'FacultyController@store');
Route::get('create.course', 'CoursesController@create');
Route::post('create.course', 'CoursesController@store');
// Create Questions & Quizzes.
Route::get('create.questions', 'QuestionsController@create')->middleware('auth:instructor')->name('questions.create');
/* You need to edit questions.create for production, make it look like quiz.create by editing the dropdown menue to have all courses to choose from*/
Route::post('create.questions', 'QuestionsController@store')->middleware('auth:instructor');
Route::get('/course/{slug}/create-quiz', 'QuizzesController@create')->name('quiz.create')->middleware('auth:instructor');
Route::post('/course/{slug}/create-quiz', 'QuizzesController@store')->name('quiz.store')->middleware('auth:instructor');

//Get/Post for taking quizzes
Route::get('/{slug}/{quiz_name}', 'ExaminationsController@show')->name('take.quiz')->middleware('auth:web');
Route::post('/{slug}/{quiz_name}', 'ExaminationsController@store')->name('exam.process')->middleware('auth:web');
