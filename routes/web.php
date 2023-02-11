<?php

use App\Http\Controllers\LabourController;
use App\Http\Controllers\MainController;
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
// Getting main page of application
Route::get('/', [MainController::class, 'index']);

// Displaying profile page of labour
Route::get('/labour/profile/{profile}', [LabourController::class, 'index']);

// Getting all jobs for labour
Route::get('/labour/jobs', [LabourController::class, 'jobs']);

// Getting detail of single job for labour
Route::get('/labour/jobs/{job}', [LabourController::class, 'details']);

// Getting portfolios of labour
Route::get('/labour/portfolio/{portfolio}', [LabourController::class, 'portfolios']);

Route::get('/login', function () {
    return view('components/forms/login');
});

Route::get('/register', function () {
    return view('components/forms/register');
});