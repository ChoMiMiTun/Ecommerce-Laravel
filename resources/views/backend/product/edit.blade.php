@extends('backend.layouts.master')

@section('title', 'Create Product')

@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            @include('alerts')
            <!-- general form elements -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Add New Product</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ url("admin/product/$product->id/edit") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mt-3">
                            <label for="name" class="col-md-2">Product Name</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="name" name="product_name" value="{{ $product->product_name }}">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-md-2">Category</label>
                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" name="category_id">
                                    <option selected="selected">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-md-2">Manufacture</label>
                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" name="manufacture_id">
                                    <option selected="selected">Select Manufacture</option>
                                    @foreach($manufactures as $manufacture)
                                    <option value="{{ $manufacture->id }}" {{ $manufacture->id == $product->id ? 'selected' : '' }}>
                                        {{ $manufacture->manufacture_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="product_description" class="col-md-2">Description</label>
                            <div class="col-md-10">
                                <textarea class="textarea" id="product_description" name="product_description">{{ $product->product_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="product_short_description" class="col-md-2">Short Description</label>
                            <div class="col-md-10">
                                <textarea class="textarea" id="product_short_description" name="product_short_description">
                                {{ $product->product_short_description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="product_price" class="col-md-2">Product Price</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="product_price" name="product_price" value="{{ $product->product_price }}">
                            </div>
                        </div>

                        <!-- <div class="box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center">Nina Mcintire</h3>

                                    </div> -->

                        <div class="form-group row mt-2">

                            <div class="col-md-2">Image</div>
                            <div class="col-md-4">
                                <img class="profile-user-img img-fluid" src="{{  asset('images/products/' . $product->product_image) }}" alt="" style="width: 400px;">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="product_image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-md-2">Product Size</label>
                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" name="product_size">
                                    <option selected="selected">Select Product Size</option>

                                    <option value="{{ $product->product_size }}" {{ $product->product_size ? 'selected' : '' }}>
                                        {{ $product->product_size }}
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="product_color" class="col-md-2">Product Color</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="product_color" name="product_color">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-md-2">Public Status</label>
                            <div class="col-md-4">
                                <select class="form-control select2" style="width: 100%;" name="public_status"
                                @if(($product->public_status) == 'public')
                                    Public
                                    else
                                    Unpublic
                                @endif
                                >
                                    <option selected="selected">Select Status</option>

                                    

                                </select>
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