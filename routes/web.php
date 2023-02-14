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


/**
 * 
 *  All Routes below are for general use
 * 
 */

// Getting main page of application
Route::get('/', [MainController::class, 'index']);
//Route::get('/', [MainController::class, 'index'])->middleware('auth');

// Route for getting registeration form
Route::get('/register/{type}', [MainController::class, 'GetRegistrationForm']);

// Route for registering user
Route::post('/register', [MainController::class, 'SaveUser']);

// Route for getting login for user
Route::get('/login', [MainController::class, 'Login']);

// Route for logging in
Route::post('/login', [MainController::class, 'AuthenticateUser']);

// Route for both of labour and Employer profile updating 
Route::post('/profile', [MainController::class, 'UpdateProfile'])->middleware('auth_common');

// Rating for both of Labour and Employer rating
Route::post('/rating', [MainController::class, 'SaveRating'])->middleware('auth_common');

// Route for logout
Route::get('/logout', [MainController::class, 'Logout']);


/**
 * 
 *  All Routes below are used for Labour
 * 
 */

// Displaying profile page of labour
Route::get('/labour/profile', [LabourController::class, 'index'])->middleware('auth_labour');

// Getting all jobs for labour
Route::get('/labour/jobs', [LabourController::class, 'GetAllJobs'])->middleware('auth_labour');

// Getting detail of single job for labour
Route::get('/labour/job/{id}', [LabourController::class, 'GetSingleJob'])->middleware('auth_labour');

// Getting portfolios of labour
Route::get('/labour/portfolio', [LabourController::class, 'GetLabourPortfolios'])->middleware('auth_labour');

// Creating portfolio of labour
Route::post('/labour/portfolio', [LabourController::class, 'CreateLabourPortfolio'])->middleware('auth_labour');

// Add biding by labour
Route::post('/labour/bid', [LabourController::class, 'AddBiding'])->middleware('auth_labour');


/**
 * 
 *  All Routes below are employer for Labour
 * 
 */

// Displaying profile page of Employer
Route::get('/employer/profile', [EmployerController::class, 'index'])->middleware('auth_employer');

// Displaying all portfolios for Employer
Route::get('/employer/labours', [EmployerController::class, 'GetAllLabours'])->middleware('auth_employer');

// Displaying single portfolio details for Employer
Route::get('/employer/labour/{id}', [EmployerController::class, 'GetSingleLabour'])->middleware('auth_employer');

// Getting jobs posted by employer
Route::get('/employer/jobs', [EmployerController::class, 'GetEmployerJobs'])->middleware('auth_employer');