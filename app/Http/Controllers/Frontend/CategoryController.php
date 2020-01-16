<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        //$category = Category::all();
        //return view('frontend.layouts.master', compact('category'));
        return view('frontend.layouts.master');
    }
   
    public function unactive_cat($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update(['status' => 0]);
    }

    public function active_cat($id)
    {
        DB::table('categories')
            ->where('id', $id)
            ->update(['status' => 1]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
