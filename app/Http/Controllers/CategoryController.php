<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Admin/category');
    }
    public function manage_category()
    {
        return view('Admin/manage_category');
    }
}
