<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        return view('admin.category');
    }
    public function manage_category()
    {
        return view('Admin/manage_category');
    }
}
