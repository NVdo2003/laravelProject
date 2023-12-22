<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\PaymentMethods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = DB::table('orders')
            ->leftjoin('admins','orders.admins_id', "=", 'admins.id')
            ->join('customers','orders.customers_id', "=", 'customers.id')
            ->join('payment_methods','orders.payment_methods_id', "=", 'payment_methods.id')
            ->select(
                'orders.id',
                'orders.OrderDate',
                'orders.Status',
                'customers.name as customer_name',
                'customers.id as customer_id',
                'admins.id as admin_id',
                'admins.name as admin_name',      // Alias cho trường name từ bảng admins
                'customers.email',
                'payment_methods.Method'
            )->get();

        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = Admin::all();
        $customers = Customer::all();
        $payment_methods = PaymentMethods::all();

        return view('order.create', compact('admins', 'customers', 'payment_methods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $validatedData = $request->validate([
            'OrderDate' => 'required|datetime',
            'Status' => 'required|integer',
            'admins_id' => 'required|integer',
            'customers_id' => 'required|integer',
            'payment_methods_id' => 'required|integer',
        ]);

        Order::create($validatedData);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $admins = Admin::all();
        $customers = Customer::all();
        $payment_methods = PaymentMethods::all();

        return view('order.edit', [
            'order' =>$order,
            'admins' => $admins,
            'customers' =>$customers,
            'payment_methods' => $payment_methods
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus($id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::find($id);

        $admin = Auth::guard('admins')->user();
        $order->admins_id = $admin->id;
        // Kiểm tra trạng thái hiện tại và thay đổi nó
        if ($order->Status === 'Shipping') {
            $order->Status = 'Đã Nhận Hàng';
        } elseif ($order->Status === 'Pending') {
            $order->Status = 'Confirmed';
        } elseif ($order->Status === 'Confirmed') {
            $order->Status = 'Shipping';
        }

        // Lưu thay đổi
        $order->save();

        // Chuyển hướng lại đến trang danh sách đơn hàng
        return redirect()->route('order.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }

    public function orderDetail($customer_id, $order_id){

        $orderDt = DB::table('orders')
            ->join('detailed_orders', 'orders.id', "=", 'detailed_orders.orders_id' )
            ->join('versions', 'detailed_orders.versions_id', "=", 'versions.id' )
            ->join('customers','orders.customers_id', "=", 'customers.id')
            ->select(
                'orders.id',
                'orders.OrderDate',
                'versions.Version_name',
                'versions.image',
                'detailed_orders.Amount',
                'detailed_orders.PriceVersion',
                'customers.id as customer_id ',
                'customers.name',
                'customers.address',
                'customers.phone_number',
                'customers.email'
            )
            ->where('customers.id', $customer_id)
            ->where('orders.id', $order_id)
            ->get();

        return view('orderDt.index' ,[
            'orderDt' => $orderDt,


        ]);
    }
}
