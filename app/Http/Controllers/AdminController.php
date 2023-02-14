<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Models\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/login');

    }
    public function dashboard()
    {
        return view('Admin/dashboard');
    }
    public function auth(Request $request)
    {
        $email= $request->post('email');
        $password= $request->post('password');
        
        $result=Admin::where(['email'=>$email,'password'=>$password])->get();
        if(isset($result['0']->id))
        {
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result['0']->id);
            return view('Admin/dashboard');
        }
        else {
            $request->session()->put('errorMessage', 'Invalid email or password');
            return redirect()->back()->withInput();
        }


    }
}
