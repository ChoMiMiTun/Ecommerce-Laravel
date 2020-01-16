@extends('backend.layouts.master')

@section('title', 'All Manufacture')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alerts')
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><strong>All Manufacture</strong></h3>

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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Public Status</th>
                                <th>Create Date</th>
                                <th class="text-center">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($manufactures as $manufacture)
                            <tr>
                                <td>{{ $manufacture->id }}</td>
                                <td>{{ $manufacture->manufacture_name }}</td>
                                <td>{!! $manufacture->manufacture_description !!}</td>
                                <td>{{ $manufacture->public_status }}</td>
                                <td>{{ $manufacture->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if(($manufacture->public_status) == 1)
                                    <a class="btn btn-success btn-sm" href="{{ url("admin/unactive_manufacture/$manufacture->id") }}">
                                        active
                                    </a>
                                    @else
                                    <a class="btn btn-secondary btn-sm" href="{{ url("admin/active_manufacture/$manufacture->id") }}">
                                        unactive
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    @if(($manufacture->public_status) == 1)
                                    <a class="btn btn-success btn-sm" href="{{ url("admin/unactive_manufacture/$manufacture->id") }}">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-secondary btn-sm" href="{{ url("admin/active_manufacture/$manufacture->id") }}">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-info btn-sm" href="{{ url("admin/manufacture/$manufacture->id/edit") }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Are you sure to delete this?')" href="{{ url("admin/manufacture/$manufacture->id/delete") }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $manufactures->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection