<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\Admin\AdminUserController;

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
    return view('home');
});

route::get('/login', [LoginController::class, 'index']);
route::post('post', [LoginController::class, 'poslog'])->name('poslog');

Route::get('/register', [RegisController::class, 'showRegistrationForm']);
Route::post('/register', [RegisController::class, 'register']);

route::get('logout', [LogoutController::class, 'logout'] );


route::get('guetsdash', function(){
    return view ('home');
});

route::get('admindash', function(){
    return view ('admin.index');
});

route::get('petugasdash', function(){
    return view ('petugas.index');
});

Route::resource('dashboard/users', AdminUserController::class)->except('show')->middleware('admin');