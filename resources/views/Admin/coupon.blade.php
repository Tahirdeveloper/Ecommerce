@extends('Admin/layout')
@section('page_title','Coupon')
@section('main_section')
<div class="mb-5">
    @if(session()->has('alert'))
    <p class="alert alert-success">
        {{session()->get('alert')}}
    </p>
    @endif
    @if(session()->has('delete'))
    <p class="alert alert-success">
        {{session()->get('delete')}}
    </p>
    @endif
    <h3 class="mb-4">Coupons</h3>
    <a href="{{url('admin/coupon/manage_coupon')}}"><button class="btn btn-primary my-2">+Add Coupon</button></a>
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Coupon Title</th>
                            <th>Coupon Code</th>
                            <th>Coupon Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$coupon->id}}</td>
                            <td>{{$coupon->title}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->value}}</td>
                            <td style="padding-left:0px">
                                <a href="{{route('admin.coupon.manage_coupon',['id'=>$coupon->id])}}" class="btn btn-primary">Edit</a>
                                @if($coupon->status==1)
                                <a href="{{ route('admin.coupon.status', ['status' => 0, 'id' => $coupon->id]) }}" class="btn btn-success">Active</a>
                                @elseif($coupon->status==0)
                                <a href="{{ route('admin.coupon.status', ['status' => 1, 'id' => $coupon->id]) }}" class="btn btn-warning">Deactive</a>
                                @endif
                                <a href="{{route('admin.coupon.delete',['id'=>$coupon->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection