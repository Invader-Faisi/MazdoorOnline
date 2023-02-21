<?php

namespace App\Http\Controllers;

use App\Models\Assigned_Job;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Labour;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $employers = Employer::all();
        $labours = Labour::all();
        $portfolios = Portfolio::all();
        $app_portfolio = Portfolio::where('status', 'Approved')->get();
        $jobs = Job::all();
        $app_job = Job::where('status', 'Active')->get();
        $complete_job = Assigned_Job::where('status', 'Completed')->get();
        $pending_job = Assigned_Job::where('status', 'Pending')->get();

        $data = compact('categories', 'employers', 'labours', 'portfolios', 'app_portfolio', 'jobs', 'app_job', 'complete_job', 'pending_job');
        return view('admin.index')->with($data);
    }

    public function AddCategory(Request $request)
    {
        $validate = $request->validate([
            'category' => 'required | unique:categories,category',
        ]);

        $category = new Category();
        $category->category = $request['category'];
        $result = $category->save();

        if ($result) {
            return redirect()->back()->with('message', 'Category Added Successfully');
        }
    }

    public function Actions(Request $request)
    {
        if ($request['entity'] != null || $request['entity'] == '') {
            $action = $request['entity'];

            if ($action == 'job') {
                $result = $this->UpdateJobs($request);
                if ($result) {
                    return redirect()->back()->with('message', 'Job ' . $request["action"] . ' Successfully');
                }
            }
            if ($action == 'portfolio') {
                $result = $this->UpdatePortfolios($request);
                if ($result) {
                    return redirect()->back()->with('message', 'Porfolio ' . $request["action"] . ' Successfully');
                }
            }
        }
    }

    private function UpdateJobs(Request $request)
    {
        $id = $request['id'];
        $action = $request['action'];
        $job = Job::find($id);
        if ($action == 'Remove') {
            $result = $job->delete();

            if ($result) {
                return true;
            }
        } else {
            $job->status = $action;
            $job->save();
            return true;
        }
    }

    private function UpdatePortfolios(Request $request)
    {
        $id = $request['id'];
        $action = $request['action'];
        $portfolio = Portfolio::find($id);
        if ($action == 'Remove') {
            $result = $portfolio->delete();

            if ($result) {
                return true;
            }
        } else {
            $portfolio->status = $action;
            $portfolio->save();
            return true;
        }
    }
}