<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\UserRegisterLoginController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [FileUploadController::class, 'home'])->name('home');


// Routes related to file upload
Route::get('/upload', [FileUploadController::class, 'uploadpost'])->name('Upload_post');
Route::post('/add_post', [FileUploadController::class, 'add_post'])->name('add_post');
Route::get('/view_post', [FileUploadController::class, 'view_post'])->name('view_posts');
Route::get('/image', [FileUploadController::class, 'image'])->name('image');
Route::get('/pdf', [FileUploadController::class, 'pdf'])->name('pdf');
Route::get('/doc', [FileUploadController::class, 'doc'])->name('doc');

// Routes related to user registration and login
Route::get('/login', [UserRegisterLoginController::class,'login'])->name('login');
Route::get('/register', [UserRegisterLoginController::class,'register'])->name('register');
Route::post('/registerUser',[UserRegisterLoginController::class,'registerUser'])->name('registerUser');
Route::post('/loginUser',[UserRegisterLoginController::class,'loginUser'])->name('loginUser');



// Routes related to post deletion
Route::get('/profile',[UserProfileController::class,'profile'])->name('profile');
Route::get('/delete', [UserProfileController::class,'delete'])->name('delete');
Route::get('/delete_page/{id}', [UserProfileController::class, 'deletePage'])->name('delete_page');


// Routes for setting session data during registration and login
Route::get('/register_r', [UserRegisterLoginController::class,'register_redirect']);
Route::get('/login_r', [UserRegisterLoginController::class,'login_redirect']);


// Middleware group for routes that require session data
Route::middleware('sessionafter')->group(function () {

    Route::get('/profile',[UserProfileController::class,'profile'])->name('profile');

    Route::get('/upload', [FileUploadController::class, 'uploadpost'])->name('Upload_post');

});



