@extends('backend.layouts.master')

@section('title', 'All Products')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alerts')
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><strong>All Product</strong></h3>

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
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category Name</th>
                                <th>Manufacture</th>
                                <th>Create Date</th>
                                <th class="text-center">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ asset('images/products/' . $product->product_image) }}" style="width:100px;"></td>
                                <td>{!! $product->product_name !!}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->manufacture->manufacture_name }}</td>
                                <td>{{ $product->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if(($product->public_status) == 1)
                                        <span class="btn btn-xs btn-success">Active</span>
                                        @else
                                        <span class="btn btn-xs btn-secondary">Unactive</span>
                                        @endif
                                </td>
                                <td>
                                    @if(($product->public_status) == 1)
                                    <a class="btn btn-success btn-sm" href="{{ url("admin/unactive_product/$product->id") }}">
                                        <i class="fas fa-toggle-on"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-danger btn-sm" href="{{ url("admin/active_product/$product->id") }}">
                                        <i class="fas fa-toggle-off"></i>
                                    </a>
                                    @endif
                                    <a class="btn btn-info btn-sm" href="{{ url("admin/product/$product->id/edit") }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Are you sure to delete this?')" href="{{ url("admin/product/$product->id/delete") }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection