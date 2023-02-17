<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

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
    public function insert_category(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'category_name' => 'required|max:255',
                'category_slug' => 'required|unique:categories,category_slug'
            ]
        );

        if ($validator->fails()) {
            // If validation fails, redirect back with the errors
            return redirect()->back()->withErrors($validator);
        }

        $result = new Category;
        $result->category_name = $request->post('category_name');
        $result->category_slug = $request->post('category_slug');
        if ($result->save()) {
            session()->flash('alert', 'Category inserted successfully!');
        }

        return redirect('admin/category');
    }
    public function fetch_category()
    {
        $categories = Category::all();
        return view('admin/category', ['categories' => $categories]);
    }
    public function delete_category($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
           if( $category->delete())
           {
            session()->flash('delete','category deleted successfully!');
           }
           else{
            session()->flash('delete','category not deleted!');
           }
        }
        return redirect('admin/category');
    }
}
