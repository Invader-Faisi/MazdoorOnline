<?php

namespace App\Http\Controllers;

use App\Models\Assigned_Job;
use App\Models\Employer;
use App\Models\Portfolio;
use App\Models\Job;
use App\Models\Biding;
use App\Models\Rating;
use App\Models\Labour;
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
        $ratings = Rating::where('rating_by', 'Labour')->where('employer_id', $id)->avg('ratings');
        $data = compact('profile', 'ratings');
        return view('employer.index')->with($data);
    }

    public function GetLabourPortfolio($id, $jobid = null, $bidid = null, $assigned = false)
    {
        $labour = Labour::find($id);
        dd($labour);
        $portfolio = Portfolio::where('labour_id', $id)->get();
        $bid = Biding::find($bidid);
        $ratings = Rating::where('rating_by', 'Employer')->where('labour_id', $id)->avg('ratings');
        $data = compact('labour', 'portfolio', 'jobid', 'bid', 'assigned', 'ratings');
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

    public function CreateJob(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'location' => 'required',
            'rate' => 'required',
            'job_rate' => 'required  | min:1',
            'description' => 'required',
        ]);
        $job = new Job();
        $job->category = $request['category'];
        $job->title = $request['title'];
        $job->location = $request['location'];
        $job->rate = $request['rate'];
        $job->job_rate = $request['job_rate'];
        $job->description = $request['description'];
        $job->employer_id = $this->GetEmployerId();
        $result = $job->save();

        if ($result) {
            return redirect()->back()->with('message', 'Job Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function AssignJob(Request $request)
    {
        dd($request->all());
        if ($request['job_id'] && $request['labour_id'] && $request['biding_id'] != null) {
            $job = Job::find($request['job_id']);
            $job->status = "Assigned";
            $result = $job->save();
            if ($result) {
                $assignment = new Assigned_Job();
                $assignment->job_id = $request['job_id'];
                $assignment->labour_id = $request['labour_id'];
                $assignment->biding_id = $request['biding_id'];
                $assignment->save();
                return redirect('employer/assigned/jobs')->with('message', 'Job assigned successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong!!');
            }
        }
    }

    public function GetBiding()
    {
        $id = $this->GetEmployerId();
        $emp = Employer::find($id);
        $jobs = $emp->GetJobs;
        $data = compact('jobs');
        return view('employer.bidings')->with($data);
    }

    public function GetAssignedJobs()
    {
        $id = $this->GetEmployerId();
        $emp = Employer::find($id);
        $jobs = $emp->GetJobs;
        $data = compact('jobs');
        return view('employer.assignedJobs')->with($data);
    }
}
