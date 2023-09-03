<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('keluar');
Route::post('/logoff', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

// Route::group(['middleware' => ['auth']], function() {
//     Route::post('/logoff', 'LoginController@logout')->name('logout');
// });

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    // Route::POST('/logoff', [App\Http\Controllers\Admin\LoginController::class, 'logout']);

     // Kriteria routes
     Route::controller(App\Http\Controllers\Admin\KriteriaController::class)->group(function (){
        Route::get('/kriteria', 'index');
        Route::get('/kriteria/create', 'create');
        Route::post('/kriteria/create', 'store');
        Route::get('/kriteria/{kriteria}/edit', 'edit');
        Route::put('/kriteria/{kriteria_id}', 'update');
        Route::get('/kriteria/{kriteria_id}/delete', 'destroy');
    });

    // Alternative routes
    Route::controller(App\Http\Controllers\Admin\AlternativeController::class)->group(function (){
        Route::get('/alternatif', 'index');
        Route::get('/alternatif/create', 'create');
        Route::post('/alternatif/create', 'store');
        Route::post('/alternatif/show', 'showSelectedWarga');
        Route::get('/alternatif/show', 'ShowSelectedWarga');
        Route::get('/alternatif/{alternatif}/edit', 'edit');
        Route::put('/alternatif/{alternatif}', 'update');
        Route::put('/alternatif/{alternatif}', 'update');
    });

     // Perhitungan routes
     Route::controller(App\Http\Controllers\Admin\PerhitunganController::class)->group(function (){
        Route::get('/perhitungan', 'index');
        Route::get('/perhitungan/create', 'create');
        Route::post('/perhitungan', 'store');
        Route::get('/perhitungan/{perhitungan}/edit', 'edit');
        Route::put('/perhitungan/{perhitungan_id}', 'update');;
    });

    // Warga routes
    Route::controller(App\Http\Controllers\Admin\WargaController::class)->group(function (){
        Route::get('/warga', 'index');
        Route::get('/warga/create', 'create');
        Route::post('/warga/create', 'store');
        Route::get('/warga/{warga_id}/edit', 'edit');
        Route::put('/warga/{warga_id}', 'update');
        Route::get('/warga/{warga_id}/delete', 'destroy');
    });

    // User routes
    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function (){
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::post('/users/create', 'store');
        Route::get('/users/{user_id}/edit', 'edit');
        Route::put('/users/{user_id}', 'update');
        Route::get('/users/{user_id}/delete', 'destroy');
        // Route::post('/users/logout', 'logOff');
        // Route::get('/users/logout', 'logOff');
    });

});

// Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

//     Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

//      // Kriteria routes
//      Route::controller(App\Http\Controllers\Admin\KriteriaController::class)->group(function (){
//         Route::get('/kriteria', 'index');
//         Route::get('/kriteria/create', 'create');
//         Route::post('/kriteria/create', 'store');
//         Route::get('/kriteria/{kriteria}/edit', 'edit');
//         Route::put('/kriteria/{kriteria_id}', 'update');
//         Route::get('/kriteria/{kriteria_id}/delete', 'destroy');
//     });

//     // Alternative routes
//     Route::controller(App\Http\Controllers\Admin\AlternativeController::class)->group(function (){
//         Route::get('/alternatif', 'index');
//         Route::get('/alternatif/create', 'create');
//         Route::post('/alternatif/create', 'store');
//         Route::post('/alternatif/show', 'showSelectedWarga');
//         Route::get('/alternatif/show', 'ShowSelectedWarga');
//         Route::get('/alternatif/{alternatif}/edit', 'edit');
//         Route::put('/alternatif/{alternatif}', 'update');
//         Route::put('/alternatif/{alternatif}', 'update');
//     });

//      // Perhitungan routes
//      Route::controller(App\Http\Controllers\Admin\PerhitunganController::class)->group(function (){
//         Route::get('/perhitungan', 'index');
//         Route::get('/perhitungan/create', 'create');
//         Route::post('/perhitungan', 'store');
//         Route::get('/perhitungan/{perhitungan}/edit', 'edit');
//         Route::put('/perhitungan/{perhitungan_id}', 'update');;
//     });

//     // Warga routes
//     Route::controller(App\Http\Controllers\Admin\WargaController::class)->group(function (){
//         Route::get('/warga', 'index');
//         Route::get('/warga/create', 'create');
//         Route::post('/warga/create', 'store');
//         Route::get('/warga/{warga_id}/edit', 'edit');
//         Route::put('/warga/{warga_id}', 'update');
//         Route::get('/warga/{warga_id}/delete', 'destroy');
//     });

//     // User routes
//     Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function (){
//         Route::get('/users', 'index');
//         Route::get('/users/create', 'create');
//         Route::post('/users/create', 'store');
//     });

// });