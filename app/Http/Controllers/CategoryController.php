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
    public function manage_category($id = "")
    {
        $result = [];
            $array = Category::where(['id' => $id])->get();
            if ($id > 0) {
                $result['data']['category_name'] = $array['0']->category_name;
                $result['data']['category_slug'] = $array['0']->category_slug;
                $result['data']['id'] = $array['0']->id;
            } else {
                $result['data']['category_name'] = "";
                $result['data']['category_slug'] = "";
                $result['data']['id'] = "";
            }
        return view('admin.manage_category', compact('result'));
    }
    public function insert_category(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'category_name' => 'required|max:255',
                'category_slug' => 'required|unique:categories,category_slug,'.$request->post('id').',id'
            ]
        );

        if ($validator->fails()) {
            // If validation fails, redirect back with the errors
            return redirect()->back()->withErrors($validator);
        }
        $id = $request->post('id');
        if ($id > 0) {
            $result = Category::find($id);
        } else {

            $result = new Category;
        }
        $result->category_name = $request->post('category_name');
        $result->category_slug = $request->post('category_slug');
        if ($result->save()) {
            $message = $id > 0 ? "Category updated successfully!" : "Category inserted successfully!";
            session()->flash('alert', $message);
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
            if ($category->delete()) {
                session()->flash('delete', 'category deleted successfully!');
                return redirect('admin/category');
            } else {
                session()->flash('delete', 'category not deleted!');
                return redirect('admin/category');
            }
        }
        return redirect('admin/category');
    }

    // public function edit_category(Request $request, $id)
    // {
    //     $category = Category::find($id);
    //     if (!is_null($category)) {
    //         if ($request->isMethod('post')) {
    //             $category->category_name = $request->post('category_name');
    //             $category->category_slug = $request->post('category_slug');
    //             if ($category->save()) {
    //                 session()->flash('alert', 'Category updated successfully!');
    //                 return redirect('admin/category');
    //             }
    //         }
    //     }

    //     return view('admin.manage_category', ['category' => $category]);
    // }
}
