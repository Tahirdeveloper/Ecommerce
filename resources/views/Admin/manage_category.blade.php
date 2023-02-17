@extends('Admin/layout')

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
    <h3>Manage Categories</h3>
</div>
<a href="{{url('admin/category')}}"><button class="btn btn-success my-2 mx-5">Back</button></a>
<div class="row">
    <div class="col-lg-9" style="margin-left:125px">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.category')}}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                        <input id="cc-pament" name="category_name" type="text" class="form-control" value="{{$result['data']['category_name']}}" required>
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Category Slug</label>
                        <input id="cc-name" name="category_slug" type="text" class="form-control cc-name valid" value="{{$result['data']['category_slug']}}" required>
                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
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