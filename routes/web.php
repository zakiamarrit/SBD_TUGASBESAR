<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\UnitController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login')
    ->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
Route::post('/login/auth', [App\Http\Controllers\LoginController::class, 'auth'])->name('login.auth')
    ->middleware([\App\Http\Middleware\OnlyGuestMiddleware::class]);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
    ->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index')
        ->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('add', [AdminController::class, 'create'])->name('admin.create')
        ->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('store', [AdminController::class, 'store'])->name('admin.store')
        ->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit')
        ->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update')
        ->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete')
        ->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
});

Route::prefix('obat')->group(function () {
    Route::get('/', [ObatController::class, 'index'])->name('obat.index')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('add', [ObatController::class, 'create'])->name('obat.create')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('store', [ObatController::class, 'store'])->name('obat.store')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('edit/{id}', [ObatController::class, 'edit'])->name('obat.edit')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('update/{id}', [ObatController::class, 'update'])->name('obat.update')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('delete/{id}', [ObatController::class, 'delete'])->name('obat.delete')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
});

Route::prefix('unit')->group(function () {
    Route::get('/', [UnitController::class, 'index'])->name('unit.index')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('add', [UnitController::class, 'create'])->name('unit.create')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('store', [UnitController::class, 'store'])->name('unit.store')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('edit/{id}', [UnitController::class, 'edit'])->name('unit.edit')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('update/{id}', [UnitController::class, 'update'])->name('unit.update')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('delete/{id}', [UnitController::class, 'delete'])->name('unit.delete')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
});

Route::prefix('histori')->group(function () {
    Route::get('/', [HistoriController::class, 'index'])->name('histori.index')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('add', [HistoriController::class, 'create'])->name('histori.create')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('store', [HistoriController::class, 'store'])->name('histori.store')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::get('edit/{id}', [HistoriController::class, 'edit'])->name('histori.edit')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('update/{id}', [HistoriController::class, 'update'])->name('histori.update')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
    Route::post('delete/{id}', [HistoriController::class, 'delete'])->name('histori.delete')->middleware([\App\Http\Middleware\OnlyAdminMiddleware::class]);
});




// Route::get('/', [AdminController::class, 'index'])->name('admin.index');
// Route::get('add', [AdminController::class, 'create'])->name('admin.create');
// Route::post('store', [AdminController::class, 'store'])->name('admin.store');
// Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
// Route::post('update/{id}', [AdminController::class, 'update'])->name('admin.update');
// Route::post('delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');


// Route::resource('obat', ObatController::class);
// Route::get('add', [ObatController::class, 'index'])->name('obat.index');



// Route::resource('histori', HistoriController::class);
// Route::resource('add', [HistoriController::class])->name('histori.create');
