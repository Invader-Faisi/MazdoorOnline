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
        $jobs = Job::where('status', 'Active')->paginate(3);
        $portfolios = Portfolio::where('status', 'Approved')->paginate(3);
        $data['jobs'] = $jobs;
        $data['portfolios'] = $portfolios;

        return view('index')->with($data);
    }

    public function GetRegistrationForm($type)
    {
        $user = $type;
        $data = compact('user');
        return view('forms.register')->with($data);
    }

    public function SaveUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:employers,email| unique:labours,email',
            'address' => 'required',
            'contact' => 'required',
            'password' => 'required  | confirmed | min:5',
            'password_confirmation' => 'required',
        ]);

        $type = $request['type'];
        $user = null;

        if ($type == "labour") {
            $user = new Labour();
        } elseif ($type == "employer") {
            $user = new Employer();
        }

        if ($user != null) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->address = $request['address'];
            $user->contact = $request['contact'];
            $user->password = md5($request['password_confirmation']);
            $result = $user->save();

            if ($result) {
                $login = new Login();
                $login->email = $request['email'];
                $login->password = md5($request['password_confirmation']);
                $login->type = $type;
                $saved = $login->save();
                if ($saved) {
                    return redirect('/login')->with('message', 'Registered Successfully ! Please Login to Continue');
                }
            }
        }
    }

    public function Login()
    {
        return view('forms.login');
    }

    public function AuthenticateUser(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);

        $email = $request['email'];
        $password = md5($request['password']);

        $login = Login::where('email', $email)->where('password', $password)->first();

        if ($login) {
            session()->put('email', $login->email);
            session()->put('user_type', $login->type);

            if ($login->type == "employer") {
                $emp = Employer::select('id', 'name')->where('email', $login->email)->first();
                session()->put('user_id', $emp->id);
                session()->put('user_name', $emp->name);

                return redirect('employer/profile')->with('message', 'Welcome ' . $emp->name);
            }

            if ($login->type == "labour") {
                $labour = Labour::select('id', 'name')->where('email', $login->email)->first();
                session()->put('user_id', $labour->id);
                session()->put('user_name', $labour->name);
                return redirect('labour/profile')->with('message', 'Welcome ' . $labour->name);
            }

            if ($login->type == "admin") {
                return redirect('admin/index')->with('message', 'Welcome Admin');
            }
        } else {
            return redirect()->back()->with('error', 'Email or Password not Valid');
        }
    }

    public function UpdateProfile(Request $request)
    {
        $id = session()->get('user_id');
        $type = session()->get('user_type');
        $user = null;

        if ($type == "labour") {
            $user = Labour::find($id);
        } elseif ($type == "employer") {
            $user = Employer::find($id);
        }

        if ($user != null) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->address = $request['address'];
            $user->contact = $request['contact'];
            $user->password = md5($request['password_confirmation']);
            $result = $user->save();

            if ($result) {
                session()->put('user_name', $user->name);
                return redirect()->back()->with('message', 'Profile Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        }
    }

    public function SaveRating(Request $request)
    {
        $rating = new Rating();
        $rating->ratings = $request['ratings'];
        $rating->rating_by = $request['rating_by'];
        $rating->assigned_job_id = $request['assigned_job_id'];

        $rating->save();

        return redirect()->back()->with('message', 'Ratings Added Successfully');
    }

    public function Logout()
    {
        session()->flush();
        return redirect('/');
    }
}