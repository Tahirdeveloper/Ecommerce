@extends('Admin/layout')
@section('page_title','size')
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
    <h3>Manage size</h3>
</div>
<a href="{{url('admin/size')}}" class="btn btn-info my-2 " style="margin-left: 125px;">Back</a>
<div class="row">
    <div class="col-lg-9" style="margin-left:125px">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.size.view')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="size" class="control-label mb-1">size</label>
                        <input id="size" name="size" type="text" class="form-control" value="{{$result['data']['size']}}" required>
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