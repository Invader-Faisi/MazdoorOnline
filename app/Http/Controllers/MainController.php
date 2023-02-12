<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\Login;
use App\Models\Labour;
use App\Models\Rating;
use App\Models\Employer;
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

    public function GetRegistrationForm($type)
    {
        $user = $type;
        $data = compact('user');
        return view('components/forms/register')->with($data);
    }

    public function SaveUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'address' => 'required',
            'contact' => 'required',
            'password' => 'required  | confirmed',
            'password_confirmation' => 'required',
        ]);

        $type = $request['type'];
        $user = null;

        if($type == "labour")
        {
            $user = new Labour();
        }elseif($type == "employer")
        {
            $user = new Employer();
        }

        if($user != null)
        {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->address = $request['address'];
            $user->contact = $request['contact'];
            $user->password = md5($request['password_confirmation']);
            $result = $user->save();

            if($result){
                $login = new Login();
                $login->email = $request['email'];
                $login->password = md5($request['password_confirmation']);
                $login->type = $type;
                $saved = $login->save();
                if($saved)
                {
                    $response = "Registered Successfully ! Please Login to Continue";
                    $data = compact('response');
                    return view('components/forms/login')->with($data);
                }
            }
            
        }

    }

    public function SaveRating(Request $request)
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
