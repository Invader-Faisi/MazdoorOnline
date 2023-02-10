<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class LabourController extends Controller
{
    public function index()
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
}
