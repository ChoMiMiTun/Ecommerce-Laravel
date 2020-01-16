@extends('backend.layouts.master')

@section('title', 'All Category')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('alerts')
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><strong>All Category</strong></h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Create Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                                <td>{{ $cat->title }}</td>
                                <td>{!! $cat->content !!}</td>
                                <td>{{ $cat->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if(($cat->status) === 1)
                                    <span class="btn btn-xs btn-success">Active</span>
                                    @else
                                    <span class="btn btn-xs btn-secondary">Unactive</span>
                                    @endif

                                </td>
                                <td>
                                    @if(($cat->status) === 1)
                                    <a href="{{ url("admin/unactive_cat/$cat->id") }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-sm btn-danger" href="{{ url("admin/active_cat/$cat->id") }}">
                                        <i class="fa fa-toggle-off"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-sm btn-primary" href="{{ url("admin/category/$cat->id/edit") }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure to delete this?')" 
                                    href="{{ url("admin/category/$cat->id/delete") }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $category->links() }}
                </div>
            </div>
        </div>

        @endsection