<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(4);
        return view('backend.user.index', compact('users'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        //$user->password = Hash::make($request->password);
        $user->password = bcrypt($request->password);
        $user->status = $request->status;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/user');
            move_uploaded_file($path, $imgName);
            $user = $imgName;
        }

        //dd($user);
        $user->save();
        
        return redirect('admin/user')->with('status', 'New User Create Successfully!');
    }

    public function unactive_cat($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 0]);

        return redirect('admin/user')->with('status', 'User Unactive Succssfully!');
    }

    public function active_cat($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['status' => 1]);

        return redirect('admin/user')->with('status', 'User Actived Succssfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/user');
            move_uploaded_file($path, $imgName);
            $user = $imgName;
        }

        //dd($user);
        $user->save();
        
        return redirect('admin/user')->with('status', 'User Updated Successfully!');

    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('backend.user.index')->with('status', 'User Delete Successfully!');

    }
}
