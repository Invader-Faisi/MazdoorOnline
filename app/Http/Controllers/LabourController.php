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
        $profile = Labour::where('labour_id', $id)->first();
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
        $job = Job::where('job_id', $id)->first();
        $data = compact('job');
        return view('labour.jobDetails')->with($data);
    }

    public function portfolio($id)
    {
        $portfolios;
    }
}
