<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

//halaman untuk admin
Route::middleware('isLogin', 'CekRole:admin')->group(function () {
    // Route::get('/todo/users', [TodoController::class, 'userData'])->name('todo.users');
    Route::get('/data', [TodoController::class, 'data'])->name('data');
});
//halaman untuk admin dan users
Route::middleware('isLogin', 'CekRole:admin,user')->group(function () {
    Route::get('/profile', [TodoController::class, 'profile'])->name('profile');
    Route::get('/error', [TodoController::class, 'error'])->name('error');
    Route::get('/todo/profile/upload', [TodoController::class, 'profileUpload'])->name('todo.profile.upload');
    Route::patch('/todo/profile/change', [TodoController::class, 'changeProfile'])->name('todo.profile.change');
});
Route::middleware('isLogin', 'CekRole:user')->group(function () {
    Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard.io');
    Route::get('/home', [TodoController::class, 'home'])->name('home.io');
    Route::get('/create', [TodoController::class, 'create'])->name('create.io');
    Route::get('/complated', [TodoController::class, 'complated'])->name('complated.io');
    Route::post('/store', [TodoController::class, 'store'])->name('store.io');
});

//halaman untuk users
Route::middleware('isGuest')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/register', [TodoController::class, 'register'])->name('register-page');
    Route::post('/register/input', [TodoController::class, 'registerAccount'])->name('register.input');
    Route::post('/login/auth', [TodoController::class, 'auth'])->name('login.auth');
});

Route::post('/logout', [TodoController::class, 'logout'])->name('logout.io');

Route::middleware('isLogin')->group(function () {
    // route path yang menggunakan {} berarti dia berperan sebagai parameter route
    // parameter ini bentuknya data 
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit.io');
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update.io');
    Route::patch('/complated/{id}', [TodoController::class, 'updateComplated'])->name('update-complated');
    Route::delete('/delete/{id}', [TodoController::class, 'destroy'])->name('delete.io');
});
