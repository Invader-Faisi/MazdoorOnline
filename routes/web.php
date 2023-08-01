<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LabourController;
use App\Http\Controllers\EmployerController;

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
 * Commen Route
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

// Route for logout
Route::get('/logout', [MainController::class, 'Logout']);

// Route for about us
Route::get('/about-us', function () {
    return view('about-us');
});

// Route for contact us
Route::get('/contact-us', function () {
    return view('contact-us');
});

//Common routes for employer and labour
Route::middleware('auth_common')->group(function () {
    // Route for both of labour and Employer profile updating 
    Route::post('/profile', [MainController::class, 'UpdateProfile']);

    // Rating for both of Labour and Employer rating
    Route::post('/rating', [MainController::class, 'SaveRating']);

    // Getting detail of single job for labour
    Route::get('/labour/job/{id}', [LabourController::class, 'GetSingleJob']);

    // Displaying single portfolio details for Employer
    Route::get('/employer/labour/{id}/{jobid?}/{bid?}', [EmployerController::class, 'GetLabourPortfolio']);
});

/**
 * 
 *  All Routes below are used for admin
 * 
 */

Route::middleware('auth_admin')->group(function () {
    // Getting main page of admin
    Route::get('/admin', [AdminController::class, 'index']);

    // Updating Admin actions
    Route::post('/admin/action', [AdminController::class, 'Actions']);

    // Admin adding categories
    Route::post('/admin/category', [AdminController::class, 'AddCategory']);
});


/**
 * 
 *  All Routes below are used for Labour
 * 
 */

Route::middleware('auth_labour')->group(function () {

    // Displaying profile page of labour
    Route::get('/labour/profile', [LabourController::class, 'index']);

    // Getting all jobs for labour
    Route::get('/labour/jobs', [LabourController::class, 'GetAllJobs']);

    // Getting portfolios of labour
    Route::get('/labour/portfolios', [LabourController::class, 'GetLabourPortfolios']);

    // Creating portfolio of labour
    Route::post('/labour/portfolio/create', [LabourController::class, 'CreatePortfolio']);

    // Update portfolio of labour
    Route::post('/labour/portfolio/update/{id}', [LabourController::class, 'UpdatePortfolio']);

    // Add biding by labour
    Route::post('/labour/bid', [LabourController::class, 'AddBiding']);

    // Getting assigned jobs
    Route::get('labour/assigned/jobs', [LabourController::class, 'GetAssignedJobs']);

    // Getting complete page
    Route::get('labour/job/complete/{id}', [LabourController::class, 'GetJobDone']);

    // Job done
    Route::post('labour/job/complete', [LabourController::class, 'JobDone']);
});

/**
 * 
 *  All Routes below are employer for Labour
 * 
 */

Route::middleware('auth_employer')->group(function () {
    // Displaying profile page of Employer
    Route::get('/employer/profile', [EmployerController::class, 'index']);

    // Getting jobs posted by employer
    Route::get('/employer/jobs', [EmployerController::class, 'GetEmployerJobs']);

    // Posting job by employer
    Route::post('/employer/job', [EmployerController::class, 'CreateJob']);

    // Assigning job to labour
    Route::post('/employer/job/assign', [EmployerController::class, 'AssignJob']);

    // Getting bids from labour on posted job
    Route::get('/employer/bids', [EmployerController::class, 'GetBiding']);

    // Getting assigned jobs
    Route::get('employer/assigned/jobs', [EmployerController::class, 'GetAssignedJobs']);
});
