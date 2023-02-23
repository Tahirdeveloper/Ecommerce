<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;

class CouponController extends Controller
{
    public function coupon()
    {
        return view('admin.coupon');
    }
    public function manage_coupon($id = "")
    {
        $result = [];
        $array = coupon::where(['id' => $id])->get();
        if ($id > 0) {
            $result['data']['title'] = $array['0']->title;
            $result['data']['code'] = $array['0']->code;
            $result['data']['value'] = $array['0']->value;
            $result['data']['id'] = $array['0']->id;
        } else {
            $result['data']['title'] = "";
            $result['data']['code'] = "";
            $result['data']['value'] = "";
            $result['data']['id'] = "";
        }
        return view('admin.manage_coupon', compact('result'));
    }
    public function insert_coupon(Request $request)
    {
        $validator = validator(
            $request->all(),
            [
                'title' => 'required|max:255',
                'code' => 'required|unique:coupons,code,' . $request->post('id') . ',id',
                'value' => 'required|max:255',

            ]
        );

        if ($validator->fails()) {
            // If validation fails, redirect back with the errors
            return redirect()->back()->withErrors($validator);
        }
        $id = $request->post('id');
        if ($id > 0) {
            $result = coupon::find($id);
        } else {

            $result = new coupon;
        }
        $result->title = $request->post('title');
        $result->code = $request->post('code');
        $result->value = $request->post('value');
        $result->status =1;

        if ($result->save()) {
            $message = $id > 0 ? "coupon updated successfully!" : "coupon inserted successfully!";
            session()->flash('alert', $message);
        }

        return redirect('admin/coupon');
    }
    public function fetch_coupon()
    {
        $coupons = coupon::all();
        return view('admin/coupon', ['coupons' => $coupons]);
    }
    public function delete_coupon($id)
    {
        $coupon = coupon::find($id);
        if (!is_null($coupon)) {
            if ($coupon->delete()) {
                session()->flash('delete', 'coupon deleted successfully!');
                return redirect('admin/coupon');
            } else {
                session()->flash('delete', 'coupon not deleted!');
                return redirect('admin/coupon');
            }
        }
        return redirect('admin/coupon');
    }

    public function coupon_status($status, $id)
    {
        $coupon = coupon::find($id);
        if (!is_null($coupon)) {
            $coupon->status = $status;
            $coupon->save();
            return redirect('admin/coupon');
        }
        return redirect('admin/coupon');
    }
}
