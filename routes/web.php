<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\AnswerController; // Add this import for AnswerController
use App\Http\Controllers\AssignmentSubmissionController;
use App\Http\Controllers\ChapterCompletionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VideoCompletionController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/varcampCon', function () {
    return view('conference');
});

Route::get('/varcampOff', function () {
    return view('office');
});

Route::get('/varcampOff/{id}', function () {
    return view('office');
});

Route::get('test', function () {
    return view('test');
});

Route::get('displaycourse', function() {
    return view('courseshow');
});

Route::get('/create-event-teacher', function () {
    return view('create-event-teacher');
});

Route::post('/students/{id}/update-status', [StudentController::class, 'updateStatus']);
Route::post('/students/{id}/update-major', [StudentController::class, 'updateMajor']);
Route::post('/students/{id}/update-major-status', [StudentController::class, 'updateMajorAndStatus']);

Route::get('/t2', function () {
    return view('t2');
});

// Course Routes
Route::post('/course/{course}/enroll', [CourseController::class, 'enroll'])->name('enroll');
Route::get('/courses/major/{major}', [CourseController::class, 'filterByMajor'])->name('courses.byMajor');

Route::get('/courseshow/{id}', [CourseController::class, 'showdetail'])->name('courseshow'); // Ensure the route name is `courseshow`

Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.show');

Route::get('/createcourse', [CourseController::class, 'create'])->name('courses.create');
Route::post('/createcourse', [CourseController::class, 'store'])->name('courses.store');
Route::post('/createEvent', [CourseController::class, 'createEvent']);
Route::get('/create-event', [CourseController::class, 'showEventForm']);

Route::get('/showevent', function () {
    return view('postfromstudent');
});

// Route to display the edit form
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');

Route::post('/chapters/{chapter}/upload-video', [CourseController::class, 'uploadVideo']);

Route::get('/quiz/{quiz}/questions/create', [QuizQuestionController::class, 'create'])->name('questions.create');
Route::post('/quiz/{quiz}/questions', [QuizQuestionController::class, 'store'])->name('questions.store');
Route::get('/quizzes/{quiz}/questions/{question}/edit', [QuizQuestionController::class, 'edit'])->name('questions.edit');
Route::put('/quizzes/{quiz}/questions/{question}', [QuizQuestionController::class, 'update'])->name('questions.update');
Route::delete('/quizzes/{quiz}/questions/{question}', [QuizQuestionController::class, 'destroy'])->name('questions.destroy');

// Answer and Result Routes for Quizzes
Route::middleware('auth')->group(function () {
    Route::get('/quizzes/{quiz}/answer', [AnswerController::class, 'show'])->name('quiz.answer');
    Route::post('/quizzes/{quiz}/submit', [AnswerController::class, 'submit'])->name('quiz.submit');
    Route::get('/quizzes/{quiz}/result', [AnswerController::class, 'result'])->name('quiz.result');
});

Route::post('/submit-assignment/{chapter}', [AssignmentSubmissionController::class, 'submitAssignment'])->name('assignment.submit');
Route::get('/assignments/{assignmentId}/submissions', [AssignmentSubmissionController::class, 'getSubmissions']);
Route::put('/submissions/{submissionId}/complete', [AssignmentSubmissionController::class, 'markAsComplete']);


Route::post('/video-complete', [VideoCompletionController::class, 'store'])->name('video.complete');

Route::get('/chapters/{chapterId}/check-completion/{courseId}', [ChapterCompletionController::class, 'checkCompletion']);

Route::post('/courses/{course}/complete', [CourseController::class, 'completeCourse'])->name('course.complete');

Route::get('/eachcourse', function () {
    return view('student_course_dashboard');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');

    Route::get('login/google', [SocialiteController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('login/google/callback', [SocialiteController::class, 'handleGoogleCallback']);

    Route::get('login/github', [SocialiteController::class, 'redirectToGithub'])->name('login.github');
    Route::get('login/github/callback', [SocialiteController::class, 'handleGithubCallback']);
});

// Protected Routes (Require Authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Skills and Experiences Routes
    Route::post('/profile/skill/add', [ProfileController::class, 'addSkill'])->name('profile.skill.add');
    Route::delete('/profile/skill/{id}', [ProfileController::class, 'deleteSkill'])->name('profile.skill.delete');
    Route::post('/profile/experience/add', [ProfileController::class, 'addExperience'])->name('profile.experience.add');
    Route::delete('/profile/experience/{id}', [ProfileController::class, 'deleteExperience'])->name('profile.experience.delete');

    // Logout Route
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});

Route::post('/create_recruiter', [AdminController::class, 'create_recruiter']);
Route::post('/create_teacher', [AdminController::class, 'create_teacher']);
Route::get('/upgrade_major/{id}', [AdminController::class, 'upgrade_major']);
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);

// Load additional auth routes
require __DIR__ . '/auth.php';
