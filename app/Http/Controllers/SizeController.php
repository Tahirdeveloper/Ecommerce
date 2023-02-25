<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\size;
class SizeController extends Controller
{
    public function size()
    {
        return view('admin.size');
    }
    public function manage_size($id = "")
    {
        $result = [];
        $array = size::where(['id' => $id])->get();
        if ($id > 0) {
            $result['data']['size'] = $array['0']->size;
            $result['data']['id'] = $array['0']->id;
        } else {
            $result['data']['size'] = "";
            $result['data']['id'] = "";
        }
        return view('admin.manage_size', compact('result'));
    }
    public function insert_size(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'size' => 'required|unique:coupons,code,' . $request->post('id') . ',id',

            ]
        );

        if ($validator->fails()) {
            // If validation fails, redirect back with the errors
            return redirect()->back()->withErrors($validator);
        }
        $id = $request->post('id');
        if ($id > 0) {
            $result = size::find($id);
        } else {

            $result = new size;
        }
        $result->size = $request->post('size');
        $result->status = 1;

        if ($result->save()) {
            $message = $id > 0 ? "size updated successfully!" : "size inserted successfully!";
            session()->flash('alert', $message);
        }

        return redirect('admin/size');
    }
    public function fetch_size()
    {
        $size = size::all();
        return view('admin/size', ['size' => $size]);
    }
    public function delete_size($id)
    {
        $size = size::find($id);
        if (!is_null($size)) {
            if ($size->delete()) {
                session()->flash('delete', 'size deleted successfully!');
                return redirect('admin/size');
            } else {
                session()->flash('delete', 'size not deleted!');
                return redirect('admin/size');
            }
        }
        return redirect('admin/size');
    }

    public function size_status($status, $id)
    {
        $size = size::find($id);
        if (!is_null($size)) {
            $size->status = $status;
            $size->save();
            return redirect('admin/size');
        }
        return redirect('admin/size');
    }
}
