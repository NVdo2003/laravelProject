<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('customer.index', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        /*$data = $request->all();
        Customer::create($data);
        return Redirect::route('customer.index');*/
        $password = Hash::make($request->input('password'));
            DB::table('customers')->insert([
                'name' => $request->input('name'),
                'password' => $password,
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
            ]);
        return Redirect::route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $id )
    {
        /*$data = $request->all();
        $customer->update($data);
        return Redirect::route('customer.index');*/
        $password = Hash::make($request->input('password'));

            DB::table('customers')->where('id', $id)->update([
                'name' => $request->input('name'),
                'password' => $password,
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
            ]);

        return Redirect::route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return Redirect::route('customer.index');
    }
    public function login(){
        return view('user.login.login');

    }
    public function loginProcess(Request $request)
    {
        $accountCustomer = $request->only(['email','password']);

        if (Auth::guard('customers')->attempt($accountCustomer)){
            $customer = Auth::guard('customers')->user();
            Auth::login($customer);
            session(['customers' => $customer]);
            return redirect()->route('user.home.index');
        }
        else {
            return redirect()->back();
        }
    }
    public function logout()
    {

        // Đăng xuất khỏi guard 'customer'
        Auth::guard('customers')->logout();

        // Xóa session dành cho guard 'customer'
        session()->forget(Auth::guard('customers')->getName());

        // Chuyển hướng đến trang đăng nhập
        return redirect()->route('user.login.login');
    }

    public function rset(Request $request){
        $password = Hash::make($request->input('password'));
        DB::table('customers')->insert([
            'name' => $request->input('name'),
            'password' => $password,
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);
        return Redirect::route('user.login.login');
    }
    public function hi()
    {
        return view('user.login.rset', [
        ]);
    }
}
