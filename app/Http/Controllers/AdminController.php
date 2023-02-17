<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {

            return view('Admin/login');
        }
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return view('Admin/dashboard');
            } else {
                $request->session()->put('errorPassword', 'Incorrect password');
                return redirect()->back()->withInput();
            }
        } else {
            $request->session()->put('errorEmail', 'Invalid email');
            return redirect()->back()->withInput();
        }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // public function update()
    // {
    //     $r=Admin::find(1);
    //     $password='123';
    //     $r->password=Hash::make($password);
    //     $r->save();
    // }
}
