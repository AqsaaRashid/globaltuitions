<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseEnrollmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CourseTopicController;
// frontend
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// backend (protect with auth later)
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts');

 Route::get('/admin/contacts', [ContactController::class, 'index'])
        ->name('admin.contacts.index');
        Route::get('/search-courses', [App\Http\Controllers\Admin\CourseController::class, 'search'])
    ->name('courses.search');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('courses/{course}/topics', 
        [CourseTopicController::class, 'index']
    )->name('courses.topics');

    Route::post('courses/{course}/topics', 
        [CourseTopicController::class, 'store']
    )->name('courses.topics.store');

    Route::delete('topics/{topic}', 
        [CourseTopicController::class, 'destroy']
    )->name('topics.destroy');
     Route::get('topics/{topic}/edit', [CourseTopicController::class, 'edit'])
        ->name('topics.edit');

    Route::put('topics/{topic}', [CourseTopicController::class, 'update'])
        ->name('topics.update');

});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// Frontend form submit
Route::post('/course-enroll', [CourseEnrollmentController::class, 'store'])
    ->name('course.enroll');
    // mail
   Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/course-enrollments/{enrollment}', [CourseEnrollmentController::class, 'show'])
        ->name('admin.course-enrollments.show');

    Route::post('/course-enrollments/{enrollment}/approve', [CourseEnrollmentController::class, 'approve'])
        ->name('admin.enrollments.approve');

    Route::post('/course-enrollments/{enrollment}/reject', [CourseEnrollmentController::class, 'reject'])
        ->name('admin.enrollments.reject');

    Route::post('/course-enrollments/{enrollment}/reply', [CourseEnrollmentController::class, 'reply'])
        ->name('admin.enrollments.reply');
});



// Admin panel view
Route::get('/admin/course-enrollments', [CourseEnrollmentController::class, 'index'])
    ->middleware('auth'); // optional but recommended
Route::get('/admin/course-enrollments', [CourseEnrollmentController::class, 'index'])
    ->name('admin.course-enrollments.index')
    ->middleware('auth');

Route::get('/course/switch-level', [WebsiteController::class, 'switchLevel'])
    ->name('course.switch.level');

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('/training', [WebsiteController::class, 'training'])->name('training.page');
Route::get('/courses/{course}', [WebsiteController::class, 'show'])->name('show');

/*
|--------------------------------------------------------------------------
| Training Manager (NO /images at root!)
|--------------------------------------------------------------------------
*/
Route::prefix('training')->group(function () {

    // Index
    Route::get('/', [TrainingController::class, 'index'])
        ->name('training.index');

    // Categories
    Route::get('categories/create', [TrainingController::class, 'createCategory'])
        ->name('training.categories.create');

    Route::post('categories', [TrainingController::class, 'storeCategory'])
        ->name('training.categories.store');

    Route::get('categories/{category}/edit', [TrainingController::class, 'editCategory'])
        ->name('training.categories.edit');

    Route::put('categories/{category}', [TrainingController::class, 'updateCategory'])
        ->name('training.categories.update');

    // Images ✅ SAFE URL
    Route::get('images/create', [TrainingController::class, 'createImage'])
        ->name('training.images.create');

    Route::post('images', [TrainingController::class, 'storeImage'])
        ->name('training.images.store');

    Route::get('images/{image}/edit', [TrainingController::class, 'editImage'])
        ->name('training.images.edit');

    Route::put('images/{image}', [TrainingController::class, 'updateImage'])
        ->name('training.images.update');

    Route::delete('images/{image}', [TrainingController::class, 'destroyImage'])
        ->name('training.images.destroy');
});
// course enroll
Route::get('/course-enroll', function () {
    return redirect('/');
});


/*
|--------------------------------------------------------------------------
| Admin (Courses only)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('courses', CourseController::class);
});

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
