<?php

use App\Http\Controllers\PagesController;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\PreventBackHistory;



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

Route::prefix('warga')->name('warga.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login','login.login')->name('login');
        Route::view('/registrasi','registrasi.registrasi')->name('registrasi');
        Route::post('/registrasi', [PagesController::class, 'create'])->name('create');
        Route::post('/check', 'App\Http\Controllers\PagesController@check');
        
    });

    Route::middleware(['auth:web'])->group(function(){
        // Route::view('/home','/warga/home')->name('home');
        Route::get('/home', 'App\Http\Controllers\CitizensController@index');
        Route::post('/logout', 'App\Http\Controllers\CitizensController@logout');
        Route::get('/data_diri', 'App\Http\Controllers\CitizensController@tampil');
        Route::get('/create', 'App\Http\Controllers\CitizensController@create');
        Route::post('/store', 'App\Http\Controllers\CitizensController@store');
        Route::get('/{citizen}/edit', 'App\Http\Controllers\CitizensController@edit');
        Route::patch('/{citizen}/update', 'App\Http\Controllers\CitizensController@update');
        Route::get('/notifikasi', 'App\Http\Controllers\CitizensController@notification');
        Route::get('/notifikasi/view/{pengumuman}', 'App\Http\Controllers\PengumumansController@viewPengumuman');
        Route::get('/notifikasi/download/{pengumuman}', 'App\Http\Controllers\PengumumansController@unduhPengumuman');
        
    });

});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest'])->group(function(){
        Route::view('/login','/admin/login')->name('login');
        Route::post('/check', 'App\Http\Controllers\AdminsController@check');
    });

    Route::middleware(['auth:admin'])->group(function(){
        
        Route::get('/home', 'App\Http\Controllers\AdminsController@index');
        Route::post('/logout', 'App\Http\Controllers\AdminsController@logout');
        
        Route::get('/pengumuman', 'App\Http\Controllers\PengumumansController@index');

        Route::get('/verifikasi', 'App\Http\Controllers\AdminsController@verifikasi');
        Route::get('/terdaftar', 'App\Http\Controllers\AdminsController@terdaftar');
        Route::get('/{citizen}', 'App\Http\Controllers\AdminsController@show');
        Route::get('/terdaftar/{citizen}', 'App\Http\Controllers\AdminsController@shows');
        Route::patch('/{citizen}', 'App\Http\Controllers\AdminsController@update');
        Route::get('/delete/{citizen}', 'App\Http\Controllers\AdminsController@destroy');

        Route::get('/pengumuman/download/{pengumuman}', 'App\Http\Controllers\AdminsController@unduhPengumuman');
        Route::get('/pengumuman/create', 'App\Http\Controllers\PengumumansController@create');
        Route::post('/pengumuman', 'App\Http\Controllers\PengumumansController@store');
        Route::get('/pengumuman/edit/{pengumuman}', 'App\Http\Controllers\PengumumansController@edit');
        Route::get('/pengumuman/delete/{pengumuman}', 'App\Http\Controllers\PengumumansController@destroy');
        Route::patch('/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumansController@update');
    });

});



// ============= admin

// Route::get('admin/login', 'App\Http\Controllers\AdminsController@login');
// Route::get('/admin/home', 'App\Http\Controllers\AdminsController@index');
// Route::post('/admin/logout', 'App\Http\Controllers\AdminsController@logout');

// Route::get('/admin/verifikasi', 'App\Http\Controllers\AdminsController@verifikasi');
// Route::get('/admin/terdaftar', 'App\Http\Controllers\AdminsController@terdaftar');
// Route::get('/admin/{citizen}', 'App\Http\Controllers\AdminsController@show');
// Route::get('/admin/terdaftar/{citizen}', 'App\Http\Controllers\AdminsController@shows');
// Route::patch('/admin/{citizen}', 'App\Http\Controllers\AdminsController@update');
// Route::get('/admin/delete/{citizen}', 'App\Http\Controllers\AdminsController@destroy');

// ============= pengumuman
// Route::get('/admin/pengumuman/create', 'App\Http\Controllers\PengumumansController@create');
// Route::get('/admin/pengumuman', 'App\Http\Controllers\PengumumansController@index');
// Route::post('/admin/pengumuman', 'App\Http\Controllers\PengumumansController@store');
// Route::get('/admin/pengumuman/edit/{pengumuman}', 'App\Http\Controllers\PengumumansController@edit');
// Route::get('/admin/pengumuman/delete/{pengumuman}', 'App\Http\Controllers\PengumumansController@destroy');
// Route::patch('/admin/pengumuman/{pengumuman}', 'App\Http\Controllers\PengumumansController@update');



// ============ pages
// Route::get('/', 'App\Http\Controllers\PagesController@login');
// Route::get('/warga/registrasi', 'App\Http\Controllers\PagesController@regis');
// Route::post('/warga/registrasi', 'App\Http\Controllers\PagesController@create');
// // Route::post('/registrasi', [PagesController::class, 'create'])->name('warga.create');
// Route::post('/warga/check', [PagesController::class, 'check'])->name('check');
// Route::post('/warga/logout', 'App\Http\Controllers\CitizensController@logout');


// ============= warga
// Route::get('/warga/home', 'App\Http\Controllers\CitizensController@index');
// Route::get('/warga/create', 'App\Http\Controllers\CitizensController@create');
// // Route::get('/warga/data_diri', 'App\Http\Controllers\CitizensController@tampil');
// Route::get('/students/{student}', 'App\Http\Controllers\StudentsController@show');
// Route::get('/warga/notifikasi', 'App\Http\Controllers\CitizensController@notification');
// Route::post('/warga', 'App\Http\Controllers\CitizensController@store');
// Route::get('/citizens/{citizen}/edit', 'App\Http\Controllers\CitizensController@edit');



