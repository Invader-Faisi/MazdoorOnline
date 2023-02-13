<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index()
    {
        $id = session()->get('user_id');
        $profile = Employer::find($id);
        $data = compact('profile');
        return view('employer.index')->with($data);
    }

    public function GetAllPortfolios()
    {
        $portfolios = Portfolio::simplePaginate(3);
        $data = compact('portfolios');
        return view('employer.portfolios')->with($data);
    }

    public function GetSinglePortfolio($id)
    {
        $portfolio = Portfolio::find($id);
        $data = compact('portfolio');
        return view('employer.portfolioDetails')->with($data);
    }

    public function GetEmployerJobs()
    {
        $id = session()->get('user_id');
        $jobs = Job::all()->where('employer_id', $id);
        $data = compact('jobs');
        return view('employer.postJob')->with($data);
    }
}