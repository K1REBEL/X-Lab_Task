<?php

use App\Http\Controllers\EmpController;
use App\Http\Controllers\JobController;
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
});

Route::resource('employees', EmpController::class);
Route::get('/employees/common/{job}', [EmpController::class, 'job_index'])->name('employees.common_job');

Route::resource('jobs', JobController::class);
