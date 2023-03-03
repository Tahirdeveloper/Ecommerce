@extends('Admin/layout')
@section('page_title','Manage Products')
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
<a href="{{url('admin/product')}}" class="btn btn-info my-2 " style="margin-left: 125px;">Back</a>
<div class="row">
    <div class="col-lg-9" style="margin-left:125px">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.product.view')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="cc-payment" class="control-label mb-1">Product Name</label>
                            <input id="cc-pament" name="product_name" type="text" class="form-control" value="{{$result['data']['product_name']}}" required>
                        </div>
                        <div class="form-group has-success col-md-6">
                            <label for="cc-name" class="control-label mb-1">Product Slug</label>
                            <input id="cc-name" name="product_slug" type="text" class="form-control cc-name valid" value="{{$result['data']['product_slug']}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="cc-payment" class="control-label mb-1">Product Image</label>
                            <input id="image" name="image" type="file" class="form-control" value="{{$result['data']['image']}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="price" class="control-label mb-1">Product Price</label>
                            <input id="price" name="product_price" type="text" class="form-control" value="{{$result['data']['product_price']}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="sku" class="control-label mb-1">Product Sku</label>
                            <input id="sku" name="sku" type="text" class="form-control" value="{{$result['data']['sku']}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="select" class="control-label mb-1">Category</label>
                            <select class="form-control" type="text" name="cat_id">
                                @foreach($categories as $list)
                                <option value="{{ $list->id }}" {{ $result['data']['cat_id'] == $list->id ? 'selected' : '' }}>
                                    {{$list->category_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Product Description</label>
                        <textarea id="desc" name="description" type="text" class="form-control" value="{{$result['data']['description']}}" required> </textarea>
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