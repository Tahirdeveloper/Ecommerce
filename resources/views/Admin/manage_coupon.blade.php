@extends('Admin/layout')
@section('page_title','Coupon')
@section('main_section')
<div class="mb-3 text-center">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h3>Manage Coupons</h3>
</div>
<a href="{{url('admin/coupon')}}" class="btn btn-info my-2 " style="margin-left: 125px;">Back</a>
<div class="row">
    <div class="col-lg-9" style="margin-left:125px">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.coupon.view')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="coupon" class="control-label mb-1">Coupon Title</label>
                        <input id="coupon" name="title" type="text" class="form-control" value="{{$result['data']['title']}}" required>
                    </div>
                    <div class="form-group has-success">
                        <label for="code" class="control-label mb-1">Coupon Code</label>
                        <input id="code" name="code" type="text" class="form-control cc-name valid" value="{{$result['data']['code']}}" required>
                    </div>
                    <div class="form-group has-success">
                        <label for="code" class="control-label mb-1">Coupon Value</label>
                        <input id="value" name="value" type="text" class="form-control cc-name valid" value="{{$result['data']['value']}}" required>
                    </div>
                    <input type="hidden" name="id" value="{{$result['data']['id']}}">
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection