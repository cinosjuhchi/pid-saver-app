<?php

use App\Models\Photo;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DownloadController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get("/", [DashboardController::class,"index"])->middleware('auth')->name('dashboard');
Route::get('/autentikasi', [AuthenticateController::class, 'index'])->name('login');
Route::post('login', [AuthenticateController::class,'login'])->name('authlogin');
Route::get('/logout', [AuthenticateController::class,'logout'])->middleware('auth')->name('logout');
Route::post('upload-photo', [UploadController::class,'upload'])->middleware('auth')->name('upload-photo');
Route::get('/preview/{slug}', [PhotoController::class, 'show'])->middleware('auth')->name('preview');
Route::post('add-folder', [FolderController::class, 'store'])->middleware('auth')->name('add-folder');
Route::get('/download/{slug}', [DownloadController::class, 'downloadImage'])->middleware('auth')->name('download-image');
Route::get('/folders/{slug}', [FolderController::class,'show'])->middleware('auth')->name('folder-show');
