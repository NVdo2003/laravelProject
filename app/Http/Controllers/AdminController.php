<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        return view('admin.index', [
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
//        $data = $request->all();
//        Admin::create($data);
//        return Redirect::route('admin.index');
        $password = Hash::make($request->input('password'));
        DB::table('admins')->insert([
            'name' => $request->input('name'),
            'password' => $password,
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
        ]);
        return Redirect::route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('admin.edit', [
            'admin' => $admin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, $id)
    {
//        $data = $request->all();
//        $admin->update($data);
        $password = Hash::make($request->input('password'));

        DB::table('admins')->where('id', $id)->update([
            'name' => $request->input('name'),
            'password' => $password,
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
        ]);

        return Redirect::route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return Redirect::route('admin.index');
    }

    public function loginadmin(){
        return view('login.loginadmin');

    }

    public function loginProcesss(Request $request)
    {
        $accountAdmins = $request->only(['email','password']);

        if (Auth::guard('admins')->attempt($accountAdmins)){

            $admin = Auth::guard('admins')->user();
            Auth::login($admin);
            session(['admins' => $admin]);
            return view('Darkan.master');
        }
        else {
            return redirect()->back();
        }
    }
    public function logoutt()
    {

        // Đăng xuất khỏi guard 'customer'
        Auth::guard('admins')->logout();

        // Xóa session dành cho guard 'customer'
        session()->forget(Auth::guard('admins')->getName());

        // Chuyển hướng đến trang đăng nhập
        return redirect()->route('login.loginadmin');
    }
}
