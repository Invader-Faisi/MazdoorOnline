<?php

namespace App\Http\Controllers;

use App\Models\Assigned_Job;
use App\Models\Biding;
use App\Models\Job;
use App\Models\Labour;
use App\Models\Portfolio;
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
        $jobs = Job::where('status', 'Active')->paginate(3);
        $data = compact('jobs');
        return view('labour.jobs')->with($data);
    }

    public function GetSingleJob($id)
    {
        $labour = $this->GetLabourId();
        $job = Job::find($id);
        $portfolio = Portfolio::find($labour);
        $data = compact('job', 'portfolio');
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

    public function CreatePortfolio(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'experience' => 'required',
            'skills' => 'required',
            'hourly_rate' => 'required  | min:1',
        ]);
        $portfolio = new Portfolio();

        $portfolio->name = $request['name'];
        $portfolio->experience = $request['experience'];
        $portfolio->skills = $request['skills'];
        $portfolio->hourly_rate = $request['hourly_rate'];
        $portfolio->labour_id = $this->GetLabourId();

        $result = $portfolio->save();

        if ($result) {
            return redirect()->back()->with('message', 'Portfolio Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function AddBiding(Request $request)
    {
        $bid = new Biding();
        $bid->bid = $request['bid'];
        $bid->job_id = $request['job_id'];
        $bid->labour_id = session()->get('user_id');
        $bid->save();
        return redirect()->back()->with('message', 'Bid Added Successfully');
    }

    public function GetAssignedJobs()
    {
        $id = $this->GetLabourId();
        $labour = labour::find($id);
        $jobs = $labour->GetMyJobs;        
        $data = compact('jobs');
        return view('labour.assignedJobs')->with($data);
    }

    public function GetJobDone($id)
    {
        $job = Job::find($id);
        $data = compact('job');
        return view('labour.jobDone')->with($data);
    }

    public function JobDone(Request $request)
    {
        if($request['job_id'] != null || $request['job_id'] != "")
        {
            $id = $request['job_id'];
            $jobdone = Assigned_Job::find($id);
            $jobdone->status = 'Completed';
            $jobdone->save();
            return redirect('/labour/assigned/jobs')->with('message','Job Completed Successfully');
        }else
        {
            return redirect('/labour/assigned/jobs')->with('error','Something went wrong');
        }
    }
}
