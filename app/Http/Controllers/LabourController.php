<?php

namespace App\Http\Controllers;

use App\Models\Biding;
use App\Models\Job;
use App\Models\Labour;
use Illuminate\Http\Request;

class LabourController extends Controller
{

    private function GetLabourId()
    {
        return session()->get('user_id');
    }

    public function index()
    {
        $id = $this->GetLabourId();
        $profile = Labour::find($id);
        $data = compact('profile');
        return view('labour.index')->with($data);
    }

    public function GetAllJobs()
    {
        $jobs = Job::simplePaginate(3);
        $data = compact('jobs');
        return view('labour.jobs')->with($data);
    }

    public function GetSingleJob($id)
    {
        $job = Job::find($id);
        $data = compact('job');
        return view('labour.jobDetails')->with($data);
    }

    public function GetLabourPortfolios()
    {
        $id = $this->GetLabourId();
        $labour = Labour::find($id);
        $portfolios = $labour->GetPortfolios;
        $data = compact('portfolios');
        return view('labour.portfolio')->with($data);
    }

    public function AddBiding(Request $request)
    {
        $bid = new Biding();
        $bid->bid = $request['bid'];
        $bid->job_id = $request['job_id'];
        $bid->labour_id = 2;
        $bid->save();
        return redirect()->back()->with('message', 'Bid Added Successfully');
    }
}