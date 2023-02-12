<?php

use App\Http\Controllers\EmployerController;
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

// Rating for both of Labour and Employer
Route::post('/rating', [MainController::class, 'ratings']);




// Displaying profile page of labour
Route::get('/labour/profile/{id}', [LabourController::class, 'index']);

// Getting all jobs for labour
Route::get('/labour/jobs', [LabourController::class, 'jobs']);

// Getting detail of single job for labour
Route::get('/labour/job/{id}', [LabourController::class, 'jobdetails']);

// Getting portfolios of labour
Route::get('/labour/portfolio/{id}', [LabourController::class, 'laboursportfolio']);

// Add biding by labour
Route::post('/labour/bid', [LabourController::class, 'addBiding']);




// Displaying profile page of Employer
Route::get('/employer/profile/{id}', [EmployerController::class, 'index']);

// Displaying portfolios for Employer
Route::get('/employer/portfolios', [EmployerController::class, 'portfolios']);

// Displaying portfolio details for Employer
Route::get('/employer/portfolio/{id}', [EmployerController::class, 'portfoliodetails']);




Route::get('/login', function () {
    return view('components/forms/login');
});

Route::get('/register', function () {
    return view('components/forms/register');
});