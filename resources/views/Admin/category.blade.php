@extends('Admin/layout')
@section('page_title','Categories')
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
    <h3 class="mb-4">Categories</h3>
    <a href="{{url('admin/category/manage_category')}}"><button class="btn btn-primary my-2">+Add categroy</button></a>
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
                                <a href="{{route('admin.category.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                                <a href="{{route('admin.category.manage_category',['id'=>$category->id])}}" class="btn btn-primary">Edit</a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection