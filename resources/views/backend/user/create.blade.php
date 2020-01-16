@extends('backend.layouts.master')

@section('title', 'Create User')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            @include('alerts')
            <!-- general form elements -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Add New User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ url('admin/user') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mt-3">
                            <label for="name" class="col-md-2">User Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="email" class="col-md-2">Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="password" class="col-md-2">Password</label>
                            <div class="col-md-10">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                        <label class="col-md-2">Image</label>
                            <div class="col-md-10">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2">
                            <label for="check" class="form-check-label">Public Status</label>
                            </div>
                            <div class="col-md-10">
                                <input type="checkbox" class="form-check-input" id="check" name="status" value="1" style="margin-left:2px;">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection