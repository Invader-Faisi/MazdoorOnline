<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\Portfolio;
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
}
