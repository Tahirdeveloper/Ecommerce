@extends('Admin/layout')

@section('main_section')
<div class="mb-5">
@if(session()->has('alert'))
    <p class="alert alert-success">
        {{session()->get('alert')}}
    </p>
    @endif
    <h2>Categories</h2>
    <a href="{{url('admin/category/manage_category')}}"><button class="btn btn-success my-2">+Add categroy</button></a>
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->category_slug}}</td>
                            <td>
                                <a href="{{route('admin.category',['id'=>$category->id])}}"><button class="btn btn-danger">Delete</button></a>
                                <a href="{{route('admin.category',['id'=>$category->id])}}"><button class="btn btn-primary">Edit</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection