<?php

use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\OnlineUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfilesController;
use Illuminate\Http\Request;

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

// Home Page Route
Route::get('/', [HomeController::class, 'index'])->name('index');
// Profile Route
Route::get('/profile', [UserController::class, 'profile']);

// Profile Picture Route
Route::post('/update-profile-picture', function (Request $request) {
    $user = Auth::user();
    if ($user->profile_picture_updated_at && $user->profile_picture_updated_at->addDay()->gt(now())) {
        return back()->with('error', 'You can only change your profile picture once every 24 hours.');
    }
    if ($request->hasFile('profile_picture') && $request->file('profile_picture')->isValid()) {
        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }
        $path = $request->file('profile_picture')->store('public/profile-pictures');
        $user->profile_picture = $path;
        $user->profile_picture_updated_at = now();
        $user->save();
        return back()->with('success', 'Profile picture uploaded successfully.');
    } else {
        return back()->with('error', 'There was an error uploading the profile picture.');
    }
})->name('update-profile-picture');
// Roues By Roles
Route::middleware(['auth', 'role:user'])->group(function () {
    // Online Routes
    Route::get('/online', [OnlineUserController::class, 'onlineUser'])->name('onlineUser');
    Route::get('/users/{id}', [ProfilesController::class, 'showing'])->name('profiles.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

});

Route::middleware(['auth', 'role:superadmin'])->group(function () {

    // Users Routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/privacy', [UserController::class, 'privacy'])->name('users.privacy');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/result', [ResultController::class, 'store'])->name('results.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/online', [OnlineUserController::class, 'onlineUser'])->name('onlineUser');
    Route::get('/users/{id}', [ProfilesController::class, 'showing'])->name('profiles.show');

    // Categories Routes
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


    // Skills Routes
    Route::get('skills/pending', [SkillController::class, 'pending'])->name('skills.pending');
    Route::post('skills/{skill}/approve', [SkillController::class, 'approve'])->name('skills.approve');
    Route::put('/skills/{skill}/notapprove', [SkillController::class, 'notapprove'])->name('skills.notapprove');
    Route::get('/skill', [SkillController::class, 'index'])->name('skills.index');
    Route::get('skills/create', [SkillController::class, 'create'])->name('skills.create');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');

    // Exercises Routes
    Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises.index');
    Route::get('/exercises/create', [ExerciseController::class, 'create'])->name('exercises.create');
    Route::post('/exercises', [ExerciseController::class, 'store'])->name('exercises.store');
    Route::put('/exercises/{exercise}/approve', [ExerciseController::class, 'approve'])->name('exercises.approve');
    Route::get('/exercises/pending', [ExerciseController::class, 'pending'])->name('exercises.pending');
    Route::delete('/exercises/{exercise}', [ExerciseController::class, 'delete'])->name('exercises.delete');
});


// Auth Routes
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('/');