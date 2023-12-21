<?php

use App\Http\Controllers\Admin\AcaraController;
use App\Http\Controllers\Admin\Dashboardcontroller;
use App\Http\Controllers\Admin\PartisipanController;
use App\Http\Controllers\Admin\PenyelenggaraController;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

//grup route untuk admin
Route::prefix('admin')->group(function () {
    //route untuk auth
    Route::group (['middleware' => 'auth'], function () {
    //buat root untuk dasboard
    Route::get('/dashboard', [Dashboardcontroller::class,'index'])->name('admin.dashboard.index');
    Route::resource('/penyelenggara', PenyelenggaraController::class, ['as' => 'admin'] );
    Route::resource('/acara', AcaraController::class, ['as' => 'admin'] );
    Route::resource('/partisipan', PartisipanController::class, ['as' => 'admin'] );
    
    });


});
