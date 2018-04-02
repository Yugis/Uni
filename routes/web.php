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
Route::get('register', 'StudentsController@create');
Route::post('register', 'StudentsController@store');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');


//Instructors
Route::group(['prefix' => 'instructor'], function () {
    Route::get('/login', 'Auth\InstructorsLoginController@showLoginForm')->name('instructor.login');
    Route::post('/login', 'Auth\InstructorsLoginController@login')->name('instructor.submit.login');

    Route::get('/register', 'InstructorsController@create')->name('instructor.register');
    Route::post('/register', 'InstructorsController@store')->name('instructor.submit.register');

    Route::get('/', 'InstructorsController@index')->name('instructor.dashboard')->middleware('auth:instructor');
    Route::get('/schedule', 'InstructorsController@myCourses')->name('instructor.schedule')->middleware('auth:instructor');
    Route::get('/{id}/{slug?}', 'InstructorProfilesController@index')->name('instructor.profile');
    Route::post('/{id}/{slug?}', 'PostsController@store')->name('instructor.post');
    Route::get('/{id}/{slug?}/edit', 'InstructorProfilesController@edit')->name('instructor.profile.edit');
    Route::post('/{id}/{slug?}/edit', 'InstructorProfilesController@update')->name('instructor.profile.update');
});

Route::group(['prefix' => 'manager'], function () {
    Route::get('/', 'AdminsController@index')->name('admin.dashboard')->middleware('auth:admin');

    Route::get('/login', 'Auth\AdminsLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminsLoginController@login')->name('admin.submit.login');

    Route::get('/register/new', 'AdminProfilesController@create')->name('admin.register');
    Route::post('/register/new', 'AdminProfilesController@store')->name('admin.submit.register');

    Route::get('/{slug}/deactivate', 'AdminProfilesController@showDeactivateForm')->name('admin.trash.account');
    Route::post('/{slug}/deactivate', 'AdminProfilesController@deactivate')->name('admin.deactivate.account');    

    Route::get('/accounts/deactivated', 'AdminProfilesController@trashed')->name('admin.trashed.accounts');

    Route::get('/accounts/deactivated/{slug}/restore', 'AdminProfilesController@showRestoreForm')->name('admin.recover.account');
    Route::post('/accounts/deactivated/{slug}/restore', 'AdminProfilesController@restore')->name('admin.restore.account');
    
    Route::get('/accounts/deactivated/{slug}/delete', 'AdminProfilesController@showDeleteForm')->name('admin.delete.account');
    Route::post('/accounts/deactivated/{slug}/delete', 'AdminProfilesController@destroy')->name('admin.destroy.account');


    Route::get('/courses/{slug}', 'AdminCourseController@showCourse')->name('admin.show.course')->middleware('auth:admin');
    Route::post('/courses/{slug}', 'AdminCourseController@updateScores')->name('admin.upadte.score')->middleware('auth:admin');

    Route::get('/courses/{slug}/edit', 'AdminCourseController@edit')->name('admin.edit.course')->middleware('auth:admin');
    Route::post('/courses/{slug}/edit', 'AdminCourseController@update')->name('admin.update.course')->middleware('auth:admin');

    Route::get('/course/create', 'AdminCourseController@create')->name('admin.create.course')->middleware('auth:admin');
    Route::post('/course/create', 'AdminCourseController@store')->name('admin.store.course')->middleware('auth:admin');

    Route::get('/mail/class/prepare', 'AdminSendEmailController@classMail')->name('admin.prepare.class.mail');
    Route::post('/mail/class/prepare', 'AdminSendEmailController@prepareClassMail')->name('admin.send.class.mail');
    Route::get('/mail/individual/prepare', 'AdminSendEmailController@individualMail')->name('admin.prepare.individual.mail');
    Route::post('/mail/individual/prepare', 'AdminSendEmailController@prepareindividualMail')->name('admin.send.individual.mail');

    Route::get('/schedules', 'AdminPagesController@showSchedules')->name('admin.schedules');
    Route::post('/schedules', 'AdminPagesController@uploadSchedule')->name('admin.upload.schedule');

    Route::get('/{id}/{slug?}/edit', 'AdminProfilesController@edit')->name('admin.profile.edit');
    Route::post('/{id}/{slug?}/edit', 'AdminProfilesController@update')->name('admin.profile.update');
});


//Loading Views To View Courses, Studnets And Professors;
Route::get('students', 'StudentsController@index')->middleware(['auth:web,instructor,admin']);

Route::get('/instructors', 'InstructorsController@all')->name('all.instructors')->middleware(['auth:web,instructor,admin']);

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

Route::get('api/get_course_students/{slug}', 'AdminCourseController@getCourseStudents');

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
Route::get('/exams/{slug}/{quiz_name}', 'ExaminationsController@show')->name('take.quiz')->middleware('auth:web');
Route::post('/exams/{slug}/{quiz_name}', 'ExaminationsController@store')->name('exam.process')->middleware('auth:web');
