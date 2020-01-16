<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->paginate(2);
        return view('backend.category.index', compact('category'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $url = public_path('images/category');
            $image->move($url, $imgName);
            $category->image = $imgName;
        }

        $category->title = $request->title;
        $category->content = $request->content;
        $category->status = $request->status;

        $category->save();

        return redirect('admin/category')->with('status', 'Category Created Successfully!');
    }

    public function unactive_cat($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update(['status' => 0]);

        return redirect('admin/category')->with('status', 'Category Unactive Succssfully!');
    }

    public function active_cat($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update(['status' => 1]);

        return redirect('admin/category')->with('status', 'Category Actived Succssfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->content = $request->content;
        $category->status = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $url = public_path('images/category');
            $image->move($url, $imgName);

            $previousImg = $url . $category->image;

            if (file_exists($previousImg)) {
                unlink($previousImg);
            }
            $category->image = $imgName;
        }

        $category->save();

        return redirect('admin/category')->with('status', 'Category Updated Successfully!');
    }

    public function destroy($id)
    {
        DB::table('Categories')
        ->where('id', $id)
        ->delete();
        return redirect('admin/category')->with('status', 'Category Deleted Successfully!');
    }
}
