<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\Portfolio;
use App\Models\Rating;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        $portfolios = Portfolio::all();
        $data['jobs'] = $jobs;
        $data['portfolios'] = $portfolios;
        return view('index')->with($data);
    }

    public function ratings(Request $request)
    {
        $rating = new Rating();
        $rating->ratings = $request['ratings'];
        $rating->rating_by = $request['rating_by'];
        /*
        if (session('user_type') == "Labour") {
            $rating->employer_id = $request['ratedid'];
            $rating->labour_id = session('user_id');
        }
        if (session('user_type') == "Employer") {
            $rating->labour_id = $request['ratedid'];
            $rating->employer_id = session('user_id');
        }
        */
        $rating->employer_id = $request['ratedid'];
        $rating->labour_id = 3;

        $rating->save();

        return redirect()->back()->with('success', 'Ratings Added Successfully');
    }
}
