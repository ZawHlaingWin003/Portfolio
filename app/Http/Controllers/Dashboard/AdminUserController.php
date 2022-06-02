<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.adminusers.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.adminusers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);

        return back()->with('success', 'User Created Successfully');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $admin_user)
    {
        if(auth()->user()->id !== $admin_user->id){
            abort(403);
        };
        return view('dashboard.adminusers.edit', compact('admin_user'));
    }


    public function update(Request $request, User $admin_user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$admin_user->id,
            'phone' => 'required|unique:users,phone,'.$admin_user->id,
            'password' => 'required|min:8'
        ]);

        $admin_user->name = $request->name;
        $admin_user->email = $request->email;
        $admin_user->password = bcrypt($request->password);
        $admin_user->phone = $request->phone;
        $admin_user->update();

        return redirect()->route('admin_users.index')->with('success', 'User Updated Successfully');
    }

    public function destroy(User $admin_user)
    {
        if(auth()->user()->id !== $admin_user->id){
            abort(403);
        };
        $admin_user->delete();

        return redirect('/');
    }
}
