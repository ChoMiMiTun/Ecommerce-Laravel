<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use App\Category;
use App\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

use function PHPSTORM_META\map;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(5);
        return view('backend.product.index', compact('products'));
    }

    public function unactive_product($id)
    {
        DB::table('products')
        ->where('id', $id)
        ->update(['public_status' => 0]);

        return redirect('admin/product')->with('status', 'Unactive Product Successfully!');
    }

    public function active_product($id)
    {
        DB::table('products')
        ->where('id', $id)
        ->update(['public_status' => 1]);

        return redirect('admin/product')->with('status', 'Active Product Successfully!');
    }

    public function create()
    {
        $categories = Category::all();
        $manufactures = Manufacture::all();
        return view('backend.product.create', compact('categories', 'manufactures'));
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_short_description = $request->product_short_description;
        $product->product_price = $request->product_price;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->public_status = $request->public_status;

        if($request->hasFile('product_image')){
            $product_image = $request->file('product_image');
            $productImgName = time() . '.' . $product_image->getClientOriginalExtension();
            $path = public_path('images/products');
            $product_image->move($path, $productImgName);
            $product->product_image = $productImgName;
        }

        //dd($product);

        $product->save();
        return redirect('admin/product')->with('status', 'Product Created Successfully!');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categories = Category::all();
        $manufactures = Manufacture::all();
        $product = Product::findOrFail($id);
        return view('backend.product.edit', compact('categories', 'manufactures', 'product'));

    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_short_description = $request->product_short_description;
        $product->product_price = $request->product_price;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;

        if($request->hasFile('product_image')){
            $product_image = $request->file('product_image');
            $productImgName = time() . '.' . $product_image->getClientOriginalExtension();
            $path = public_path('images/products');
            $product_image->move($path, $productImgName);
            $product->product_image = $productImgName;
        }

        //dd($product);

        $product->save();
        return redirect('admin/product')->with('status', 'Product Created Successfully!');
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        return redirect('admin/product')->with('status', 'Product Deleted Successfully!');
    }
}
