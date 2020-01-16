<?php

namespace App\Http\Controllers\Backend;

use App\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManufactureRequest;

class ManufactureController extends Controller
{
 
    public function index()
    {
        $manufactures = Manufacture::orderBy('id', 'desc')->paginate(2);
        return view('backend.manufacture.index', compact('manufactures'));

    }

    public function create()
    {
        return view('backend.manufacture.create');
    }

    public function store(ManufactureRequest $request)
    {
        $manufacture = new Manufacture();
        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->manufacture_description = $request->manufacture_description;
        $manufacture->public_status = $request->public_status;

        //dd($manufacture);

        $manufacture->save();

        return redirect('admin/manufacture')->with('status', 'Manufacture Created Successfully!');

    }

    public function unactive_manufacture($id)
    {
        DB::table('manufactures')
            ->where('id', $id)
            ->update(['public_status' => 0]);

            return redirect('admin/manufacture')->with('status', 'Unactive Manufacture Successfully!');
    }

    public function active_manufacture($id)
    {
        DB::table('manufactures')
            ->where('id', $id)
            ->update(['public_status' => 1]);

        return redirect('admin/manufacture')->with('status', 'Active Manufacture Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $manufacture = Manufacture::find($id);

        return view('backend.manufacture.edit', compact('manufacture'));
        
    }

    public function update(ManufactureRequest $request, $id)
    {
        $manufacture = Manufacture::find($id);
        $manufacture->manufacture_name = $request->manufacture_name;
        $manufacture->manufacture_description = $request->manufacture_description;
        $manufacture->public_status = $request->public_status;

        //dd($manufacture);

        $manufacture->save();

        return redirect('admin/manufacture')->with('status', 'Manufacture Updated Successfully!');
    }

    public function destroy($id)
    {
        DB::table('manufactures')
            ->where('id', $id)
            ->delete();

            return redirect('admin/manufacture')->with('status', 'Deleted Manufacture Successfully!');
    }
}
