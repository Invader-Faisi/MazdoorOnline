<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Portfolio;
use App\Models\Job;
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

    public function GetBiding()
    {
        $id = $this->GetEmployerId();
        $emp = Employer::find($id);
        $jobs = $emp->GetJobs;
        $data = compact('jobs');
        return view('employer.bidings')->with($data);
    }
}
