<?php
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/mahasiswa', function (){
    return 'Selamat Datang';
});

Route::view('master','template/master');

// Route Untuk Mahasiswa
Route::get('data-mahasiswa', [MahasiswaController::class, 'index']);
Route::get('add-mahasiswa', [MahasiswaController::class, 'create']);

// tugas
Route::get('data-blog',[BlogController::class, 'index']);
Route::get('add-blog',[BlogController::class, 'create']);
Route::post('getData',[BlogController::class, 'ambilData'])->name('blog.getData');