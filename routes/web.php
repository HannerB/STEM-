<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/noticias', [HomeController::class, 'news'])->name('home.news');
Route::get('noticias/{slug}', [HomeController::class, 'show'])->name('home.show');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('users', UserController::class)->except(['destroy']);
    Route::post('/users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');
    Route::post('/users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
    Route::resource('news', NewsController::class)->except(['destroy']);
    Route::post('/news/{news}/deactivate', [NewsController::class, 'deactivate'])->name('news.deactivate');
    Route::post('/news/{news}/activate', [NewsController::class, 'activate'])->name('news.activate');
});

Route::get('/LoginProfes', [UserController::class, 'loginProfes'])->name('loginProfes');
Route::get('/Perfil', [UserController::class, 'perfilProfes'])->name('Perfil');
Route::match(['get', 'post'], '/cardsProfes', [UserController::class, 'CardsProfes'])->name('CardsProfes');
Route::match(['get', 'post'], '/EntreProfes', [UserController::class, 'EntreProfes'])->name('EntreProfes');
Route::get('user/{user}/profile-image', [UserController::class, 'getProfileImage'])->name('user.profile.image');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/users/cards', [UserController::class, 'cardsProfes'])->name('cardsProfes');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// Asegúrate de que esta ruta esté definida
Route::get('user/{user}/profile', [UserController::class, 'viewProfile'])->name('viewProfile');
