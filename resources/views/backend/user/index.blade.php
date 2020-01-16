@extends('backend.layouts.master')

@section('title', 'All User')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alerts')
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><strong>All User</strong></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Create Date</th>
                                <th class="text-center">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->image }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>status</td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="#">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{ url("admin/user/$user->id/edit") }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure to delete this?')"
                                    href="{{ "admin/user/$user->id/delete" }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    Paganite
                </div>
            </div>
        </div>
    </div>
</div>
@endsection