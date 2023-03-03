@extends('Admin/layout')
@section('page_title','Products')
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
    <h3 class="mb-4">Products</h3>
    <a href="{{url('admin/product/manage_product')}}"><button class="btn btn-primary my-2">+Add Product</button></a>
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>product Name</th>
                            <th>product Description</th>
                            <th>product Image</th>
                            <th>product Price</th>
                            <th>product Slug</th>
                            <th>Sku</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->p_name}}</td>
                            <td>{{$product->p_desc}}</td>
                            <td><img src="{{asset('/storage/media/'.$product->p_image)}}" alt=""></td>
                            <td>{{$product->p_price}}</td>
                            <td>{{$product->p_slug}}</td>
                            <td>{{$product->sku}}</td>
                            <td>{{$product->cat_id}}</td>

                            <td>
                                <a href="{{route('admin.product.manage_product',['id'=>$product->id])}}" class="btn btn-primary">Edit</a>
                                @if($product->status==1)
                                <a href="{{ route('admin.product.status', ['status' => 0, 'id' => $product->id]) }}" class="btn btn-success">Active</a>
                                @elseif($product->status==0)
                                <a href="{{ route('admin.product.status', ['status' => 1, 'id' => $product->id]) }}" class="btn btn-warning">Deactive</a>
                                @endif
                                <a href="{{route('admin.product.delete',['id'=>$product->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection