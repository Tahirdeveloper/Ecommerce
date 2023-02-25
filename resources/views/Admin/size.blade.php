@extends('Admin/layout')
@section('page_title','Size')
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
    <h3 class="mb-4">Size</h3>
    <a href="{{url('admin/size/manage_size')}}"><button class="btn btn-primary my-2">+Add size</button></a>
    <div class="row my-2">
        <div class="col-lg-12">
            <div class="table-responsive table--no-card m-b-30">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>size</th>
                            <th style="width: 50px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($size as $size)
                        <tr>
                            <td>{{$size->id}}</td>
                            <td>{{$size->size}}</td>
                            <td style="padding-left:0px">
                                <a href="{{route('admin.size.manage_size',['id'=>$size->id])}}" class="btn btn-primary">Edit</a>
                                @if($size->status==1)
                                <a href="{{ route('admin.size.status', ['status' => 0, 'id' => $size->id]) }}" class="btn btn-success">Active</a>
                                @elseif($size->status==0)
                                <a href="{{ route('admin.size.status', ['status' => 1, 'id' => $size->id]) }}" class="btn btn-warning">Deactive</a>
                                @endif
                                <a href="{{route('admin.size.delete',['id'=>$size->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection