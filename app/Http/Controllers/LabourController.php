<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Labour;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class LabourController extends Controller
{
    public function index($id)
    {
        $profile = Labour::find($id);
        $data = compact('profile');
        return view('labour.index')->with($data);
    }

    public function jobs()
    {
        $jobs = Job::all();
        $data = compact('jobs');
        return view('labour.jobs')->with($data);
    }

    public function details($id)
    {
        $job = Job::find($id);
        $data = compact('job');
        return view('labour.jobDetails')->with($data);
    }

    public function portfolios($id)
    {
        $portfolios = Portfolio::all()->where('labour_id', $id);
        $data = compact('portfolios');
        return view('labour.portfolio')->with($data);
    }
}