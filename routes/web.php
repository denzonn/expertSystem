<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiseaseController;
use App\Http\Controllers\Admin\SymptomDiseaseController;
use App\Http\Controllers\Admin\SymptomsController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
})->middleware('aldreadyAuth');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('disease', DiseaseController::class);
    Route::resource('symptom', SymptomsController::class);

    Route::get('get-disease', [DiseaseController::class, 'getData'])->name('diseaseData');
    Route::get('get-symptoms', [SymptomsController::class, 'getData'])->name('symptomData');
});

Route::middleware(['auth'])->group(function() {
    Route::get('home', [DiagnoseController::class, 'index'])->name('home');
    Route::get('diagnose', [DiagnoseController::class, 'diagnose'])->name('diagnose');
    Route::get('history', [DiagnoseController::class, 'history'])->name('history');
    Route::get('history/{result_id}', [DiagnoseController::class, 'historyDetail'])->name('history-detail');

    Route::post('diagnose', [DiagnoseController::class, 'store'])->name('diagnose-store');
    Route::get('diagnose-result', [DiagnoseController::class, 'diagnoseResult'])->name('diagnose-result');

    Route::get('get-history', [DiagnoseController::class, 'getData'])->name('historyData');
});

require __DIR__.'/auth.php';
