<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukkanController;
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

// Route::get('/dashboard', function () {
//     return view('windmill-dashboard.public.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/tambah-masuk', [DashboardController::class, 'tambahmasuk'])->name('tambahmasuk');
Route::post('/insert-masuk', [DashboardController::class, 'insertmasuk'])->name('insertmasuk');
// route::get('pemasukkan', [DashboardController::class,'index'])->middleware(['auth','verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('dashboard', [DashboardController::class,'index'])->middleware(['auth','verified']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// route::get('/pemasukkan', [DashboardController::class,'index'])->middleware(['auth','verified']);
route::get('/pemasukkan/store', [DashboardController::class,'store'])->middleware(['auth','verified']);
route::delete('/dashboard/{id_pemasukan}', [DashboardController::class,'delete'])->middleware(['auth','verified']);

route::get('/pemasukkan', [PemasukkanController::class,'index']);
require __DIR__.'/auth.php';
