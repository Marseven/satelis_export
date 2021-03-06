<?php

use App\Http\Controllers\ExportController;
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

Route::get('/', [ExportController::class, 'index'])->name('home');
Route::post('import', [ExportController::class, 'import'])->name('import');
Route::get('export', [ExportController::class, 'export'])->name('export');
Route::get('download', [ExportController::class, 'download'])->name('download');
Route::get('reset', [ExportController::class, 'reset'])->name('reset');
