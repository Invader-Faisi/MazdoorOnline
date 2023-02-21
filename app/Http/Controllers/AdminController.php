<?php

namespace App\Http\Controllers;

use App\Models\Assigned_Job;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Labour;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $employers = Employer::all();
        $labours = Labour::all();
        $portfolios = Portfolio::all();
        $app_portfolio = Portfolio::where('status', 'Approved')->get();
        $jobs = Job::all();
        $app_job = Job::where('status', 'Active')->get();
        $complete_job = Assigned_Job::where('status', 'Completed')->get();
        $pending_job = Assigned_Job::where('status', 'Pending')->get();

        $data = compact('employers', 'labours', 'portfolios', 'app_portfolio', 'jobs', 'app_job', 'complete_job', 'pending_job');
        return view('admin.index')->with($data);
    }
}