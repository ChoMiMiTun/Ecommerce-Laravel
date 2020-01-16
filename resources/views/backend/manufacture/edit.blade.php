@extends('backend.layouts.master')

@section('title', 'Edit Manufacture')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            @include('alerts')
            <!-- general form elements -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><strong>Add New Manufacture</strong></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ url("admin/manufacture/$manufacture->id/edit") }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mt-3">
                            <label for="manufacture_name" class="col-md-2">Manufacture Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="manufacture_name" name="manufacture_name" value="{{ $manufacture->manufacture_name }}">
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="manufacture_description" class="col-md-2">Description</label>
                            <div class="col-md-10">
                                <textarea class="textarea" id="content" name="manufacture_description">
                                {{ $manufacture->manufacture_description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                                <label class="form-check-label" for="check">Public Status</label>
                            </div>
                            <div class="col-md-10">
                                <input type="checkbox" class="form-check-input" id="check" name="public_status" value="1" style="margin-left:2px;" 
                                @if(($manufacture->public_status) == 1)
                                checked
                                @endif
                                >
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection