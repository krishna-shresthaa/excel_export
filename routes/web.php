<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/json', [JsonController::class, 'json'])->name('json');
    Route::post('/json/upload', [JsonController::class, 'upload'])->name('json.upload');
    Route::get('/excel', [ExcelController::class, 'excel'])->name('excel');
    Route::post('/excel/export', [ExcelController::class, 'export'])->name('excel.export');
    Route::get('/excel/download/{file}', [ExcelController::class, 'download'])->name('excel.download');

});

require __DIR__.'/auth.php';
