<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    private function GetEmployerId()
    {
        return session()->get('user_id');
    }

    public function index()
    {
        $id = $this->GetEmployerId();
        $profile = Employer::find($id);
        $data = compact('profile');
        return view('employer.index')->with($data);
    }

    public function GetAllLabours()
    {
        $portfolios = Portfolio::simplePaginate(3);
        $data = compact('portfolios');
        return view('employer.portfolios')->with($data);
    }

    public function GetSingleLabour($id)
    {
        $portfolio = Portfolio::find($id);
        $data = compact('portfolio');
        return view('employer.portfolioDetails')->with($data);
    }

    public function GetEmployerJobs()
    {
        $id = $this->GetEmployerId();
        $emp = Employer::find($id);
        $jobs = $emp->GetJobs;
        $data = compact('jobs');
        return view('employer.postJob')->with($data);
    }
}