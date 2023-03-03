<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\products;

class ProductsController extends Controller
{
    // public function product()
    // {
    //     return view('admin.product');
    // }
    public function manage_product($id = "")
    {
        $result = [];
        $array = products::where(['id' => $id])->get();
        if ($id > 0) {
            $result['data']['product_name'] = $array[0]->p_name;
            $result['data']['description'] = $array[0]->p_desc;
            $result['data']['image'] = $array[0]->p_image;
            $result['data']['product_price'] = $array[0]->p_price;
            $result['data']['product_slug'] = $array[0]->p_slug;
            $result['data']['sku'] = $array[0]->sku;
            $result['data']['cat_id'] = $array[0]->cat_id;
            $result['data']['status'] = 1;

            $result['data']['id'] = $array[0]->id;
        } else {
            $result['data']['product_name'] = "";
            $result['data']['description'] = "";
            $result['data']['image'] = "";
            $result['data']['product_price'] = "";
            $result['data']['product_slug'] = "";
            $result['data']['sku'] = "";
            $result['data']['cat_id'] = "";
            $result['data']['id'] = "";
        }
        $categories = DB::table('categories')->where('status', 1)->get();
        return view('admin.manage_product', compact('result', 'categories'));
    }
    public function insert_product(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'product_name' => 'required|max:255',
                'description' => 'required|max:550',
                'product_image' => 'mimes:jpeg,png,jpg,svg,pdf',
                'product_price' => 'required',
                'product_slug' => 'required|unique:products,p_slug,' . $request->post('id') . ',id'
            ]
        );

        if ($validator->fails()) {
            // If validation fails, redirect back with the errors
            return redirect()->back()->withErrors($validator);
        }
        $id = $request->post('id');
        if ($id > 0) {
            $result = products::find($id);
        } else {

            $result = new products;
        }
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $file_name = time() . '.' . $image->extension();
            $image->storeAs('/public/media', $file_name);
            $result->p_image = $file_name;
        }
        $result->p_name = $request->post('product_name');
        $result->p_desc = $request->post('description');
        $result->p_price = $request->post('product_price');
        $result->p_slug = $request->post('product_slug');
        $result->sku = $request->post('sku');

        if ($result->save()) {
            $message = $id > 0 ? "product updated successfully!" : "product inserted successfully!";
            session()->flash('alert', $message);
        }

        return redirect('admin/product');
    }
    public function fetch_product()
    {
        $products = products::all();
        return view('admin/product', ['products' => $products]);
    }
    public function delete_product($id)
    {
        $product = products::find($id);
        if (!is_null($product)) {
            if ($product->delete()) {
                session()->flash('delete', 'product deleted successfully!');
                return redirect('admin/product');
            } else {
                session()->flash('delete', 'product not deleted!');
                return redirect('admin/product');
            }
        }
        return redirect('admin/product');
    }
    public function status($status, $id)
    {
        $product = products::find($id);
        if (!is_null($product)) {
            $product->status = $status;
            $product->save();
            session()->flash('delete', 'product status updated successfully!');
            return redirect('admin/product');
        }
        return redirect('admin/product');
    }
}
