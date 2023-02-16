<?php

namespace App\Http\Controllers;

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
        $jobs = Job::where('status','Active')->paginate(3);
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
}
