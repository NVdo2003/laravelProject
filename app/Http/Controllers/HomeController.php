<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailedOrders;
use App\Models\Order;
use App\Models\PaymentMethods;
use App\Models\Type;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function index(){
        $product = DB::table('products')
            ->join('types','products.types_id', "=", 'types.id')
            ->join('categories','products.categories_id', "=", 'categories.cate_id')
            ->join('brands','products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id as product_id',
                'products.product_name',
                    'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.Brand_name',
                'brands.brand_id'
            )->get();


        $category = DB::table('categories')->get();
        $type = DB::table('types')->get();
        $brand = DB::table('brands')->get();

        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->join('brands','products.brands_id','=','brands.brand_id')
            ->join('categories', 'products.categories_id','=','categories.cate_id')
            ->join('types','products.types_id', "=", 'types.id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'products.id as product_id',
                'brands.Brand_name',
                'categories.Category_name',
                'categories.cate_id',
                'types.id as type_id'

            )->get();


        return view('user.home.index',[
            'product' => $product,
            'type' =>$type,
            'brand' =>$brand,
            'version' => $version,
            'category' => $category

        ]);
    }

    /*public function seach(Request $request){
        $product = DB::table('product');
        $version = DB::table('version');
        $searchQuery = $request->input('search_query');
        if($searchQuery){
            $product->where('products.product_name', 'like', '%' . $searchQuery . '%');
            $version->where('versions.Version_name', 'like', '%' . $searchQuery . '%');
        }
    }*/
    public function searchProductByName(Request $request)
    {
        $searchQuery = $request->input('by');
        $category = DB::table('categories')->get();
        $type = DB::table('types')->get();
        $brand = DB::table('brands')->get();
        $product = DB::table('products')
            ->join('types', 'products.types_id', "=", 'types.id')
            ->join('categories', 'products.categories_id', "=", 'categories.cate_id')
            ->join('brands', 'products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id as product_id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.Brand_name',
                'brands.brand_id'
            )
            ->get();
        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->join('brands','products.brands_id','=','brands.brand_id')
            ->join('categories', 'products.categories_id','=','categories.cate_id')
            ->join('types','products.types_id', "=", 'types.id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'products.id as product_id',
                'brands.Brand_name',
                'categories.Category_name',
                'categories.cate_id',
                'types.id as type_id'

            )->where('versions.Version_name', 'LIKE', '%' . $searchQuery . '%')
            ->get();
        return view('user.category.cat', [
            'product' => $product,
            'type' =>$type,
            'brand' =>$brand,
            'version' => $version,
            'category' => $category
            ]);
    }
    public function detail($id)
    {


        $product = DB::table('products')
            ->join('types','products.types_id', "=", 'types.id')
            ->join('categories','products.categories_id', "=", 'categories.cate_id')
            ->join('brands','products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.Category_name',
                'categories.cate_id',
                'brands.Brand_name',
                'brands.brand_id'
            )->get();

        $type = DB::table('types')->get();

        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->join('brands','products.brands_id','=','brands.brand_id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'brands.Brand_name'
            )->where('versions.id', "=" ,$id)
            ->get();




        return view('user.productDetail.detail',[
            'product' => $product,
            'type' =>$type,
            'version' => $version
        ]);

    }



    public function cat($id)
    {

        $product = DB::table('products')
            ->join('types','products.types_id', "=", 'types.id')
            ->join('categories','products.categories_id', "=", 'categories.cate_id')
            ->join('brands','products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.Brand_name',
                'brands.brand_id'
            )

            ->get();

        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();

        $type = DB::table('types')->get();

        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->join('brands','products.brands_id','=','brands.brand_id')
            ->join('categories', 'products.categories_id','=','categories.cate_id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'brands.Brand_name',
                'categories.cate_id',
                'brands.brand_id'
            )->where('categories.cate_id', $id)
            ->get();

        return view('user.category.cat',[
            'product' => $product,
            'type' =>$type,
            'category' =>$category,
            'brand' => $brand,
            'version' => $version
        ]);
    }


    public function pversion($id)
    {

        $product = DB::table('products')
            ->join('types','products.types_id', "=", 'types.id')
            ->join('categories','products.categories_id', "=", 'categories.cate_id')
            ->join('brands','products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id as product_id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.Brand_name',
                'brands.brand_id'
            )

            ->get();

        $category = DB::table('categories')->get();
        $brand = DB::table('brands')->get();

        $type = DB::table('types')->get();

        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->join('brands','products.brands_id','=','brands.brand_id')
            ->join('categories', 'products.categories_id','=','categories.cate_id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'products.id as product_id',
                'brands.Brand_name',
                'categories.cate_id',
                'brands.brand_id'
            )->where('products.id', $id)
            ->get();


        return view('user.productVersion.pversion',[
            'product' => $product,
            'type' =>$type,
            'category' =>$category,
            'brand' => $brand,
            'version' => $version
        ]);
    }


    public function brand($id) {

        $product = DB::table('products')
            ->join('types','products.types_id', "=", 'types.id')
            ->join('categories','products.categories_id', "=", 'categories.cate_id')
            ->join('brands','products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.brand_id',
                'brands.Brand_name'
            )

            ->get();

        $category = DB::table('categories')->get();

        $type = DB::table('types')->get();

        $brand = DB::table('brands')->get();

        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->join('brands','products.brands_id','=','brands.brand_id')
            ->join('categories', 'products.categories_id','=','categories.cate_id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'brands.Brand_name',
                'categories.cate_id',
                'brands.brand_id'
            )->where('brands.brand_id','=', $id)
            ->get();

        return view('user.category.cat',[
            'product' => $product,
            'type' =>$type,
            'category' =>$category,
            'version' => $version,
            'brand' => $brand
        ]);
    }

    public function type($id) {

        $product = DB::table('products')
            ->join('types','products.types_id', "=", 'types.id')
            ->join('categories','products.categories_id', "=", 'categories.cate_id')
            ->join('brands','products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.brand_id',
                'brands.Brand_name'
            )

            ->get();

        $category = DB::table('categories')->get();

        $type = DB::table('types')->get();

        $brand = DB::table('brands')->get();

        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->join('brands','products.brands_id','=','brands.brand_id')
            ->join('categories', 'products.categories_id','=','categories.cate_id')
            ->join('types','products.types_id', "=", 'types.id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'brands.Brand_name',
                'categories.cate_id',
                'brands.brand_id',
                'types.id'
            )->where('types.id','=', $id)
            ->get();

        return view('user.category.cat',[
            'product' => $product,
            'type' =>$type,
            'category' =>$category,
            'version' => $version,
            'brand' => $brand
        ]);
    }


    public function cart($id)
    {

        $product = DB::table('products')
            ->join('types', 'products.types_id', "=", 'types.id')
            ->join('categories', 'products.categories_id', "=", 'categories.cate_id')
            ->join('brands', 'products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.brand_id',
                'brands.Brand_name'
            )
            ->get();

        $category = DB::table('categories')->get();

        $type = DB::table('types')->get();

        $brand = DB::table('brands')->get();

        $payment = PaymentMethods::all();
        $order = DB::table('orders')
            ->join('admins','orders.admins_id', "=", 'admins.id')
            ->join('customers','orders.customers_id', "=", 'customers.id')
            ->join('payment_methods','orders.payment_methods_id', "=", 'payment_methods.id')
            ->select(
                'orders.id',
                'orders.OrderDate',
                'orders.Status',
                'admins.name',
                'customers.name',
                'payment_methods.Method'
            )->get();

        $version = DB::table('versions')
            ->join('products', 'versions.products_id', "=", 'products.id')
            ->join('brands', 'products.brands_id', '=', 'brands.brand_id')
            ->join('categories', 'products.categories_id', '=', 'categories.cate_id')
            ->join('types', 'products.types_id', "=", 'types.id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
                'brands.Brand_name',
                'categories.cate_id',
                'brands.brand_id',
                'types.id'
            )->where('versions.id', '=', $id)
               ->first(); // Sử dụng first() để lấy kết quả đầu tiên


        if ($version) {
            $cart[$version->id] = [
                'Version_name' => $version->Version_name,
                'image' => $version->image,
                'price' => $version->price,
                'quantity' => 1,
                'Version_details' => $version->Version_details,
                'product_name' => $version->product_name,
                'Brand_name' => $version->Brand_name,
                'cate_id' => $version->cate_id,
                'brand_id' => $version->brand_id,

            ];
            $cartInSession = Session::get('cart', []); // Lấy giỏ hàng hiện tại, nếu không tồn tại, tạo một mảng trống.

            // Kiểm tra xem sản phẩm với $id đã tồn tại trong giỏ hàng hay chưa
            if (array_key_exists($id, $cartInSession)) {
                // Sản phẩm đã tồn tại, tăng số lượng lên 1
                $cartInSession[$id]['quantity']++;
            } else {
                // Sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                $cartInSession[$id] = [
                    'id' => $id,
                    'Version_name' => $version->Version_name,
                    'image' => $version->image,
                    'price' => $version->price,
                    'quantity' => 1,
                    'Version_details' => $version->Version_details,
                    'product_name' => $version->product_name,
                    'Brand_name' => $version->Brand_name,
                    'cate_id' => $version->cate_id,
                    'brand_id' => $version->brand_id,
                ];
            }

            Session::put('cart', $cartInSession);
        }
        $totalPrice = 0;
        foreach ($cart as $version) {
            $totalPrice += $version['quantity'] * $version['price'];
        }




        return view('user.cart.cart',compact('totalPrice' ),[
            'product' => $product,
            'type' => $type,
            'category' => $category,
            'version' => $version,
            'brand' => $brand,
            'order' => $order,
            'payment'=> $payment,
            'cart' => $cart


        ]);
    }

    public function showCart(){

        $cart = Session::get('cart');
        if (!$cart || count($cart) === 0) {
            return redirect()->route('user.home.index');
        }
        // Tính toán lại tổng tiền
        $totalPrice = 0;
        foreach ($cart as $version) {
            $totalPrice += $version['quantity'] * $version['price'];
        }
        $payment = PaymentMethods::all();


        $product = DB::table('products')
            ->join('types', 'products.types_id', "=", 'types.id')
            ->join('categories', 'products.categories_id', "=", 'categories.cate_id')
            ->join('brands', 'products.brands_id', "=", 'brands.brand_id')
            ->select(
                'products.id',
                'products.product_name',
                'products.image',
                'products.price',
                'types.id',
                'categories.cate_id',
                'categories.Category_name',
                'brands.brand_id',
                'brands.Brand_name'
            )
            ->get();

        $category = DB::table('categories')->get();

        $type = DB::table('types')->get();



        return view('user.cart.cart', compact('totalPrice', 'payment', 'cart','category','product','type',));

    }
//    public function deleteCart(){
//        Session::forget('cart');
//        return redirect()->back();
//    }
    public function updateCart(Request $request) {

        $cart = Session::get('cart');//cai ses nay dang rong
        foreach ($request->input('quantity') as $id => $newQuantity) {
            if (isset($cart[$id])) {
                // Cập nhật số lượng cho sản phẩm trong giỏ hàng
                $cart[$id]['quantity'] = $newQuantity;
            }
        }
        Session::put('cart', $cart);


        return redirect()->route('home.showCart');
    }






    public function deleteCart(Request $request, $id){
        $cart = $request->session()->get('cart');

        // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
        if (isset($cart[$id])) {
            // Xóa sản phẩm ra khỏi giỏ hàng
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
        }
        $cart = Session::get('cart');
        if (isset($cart[$id])) {
            // Lấy giá của phiên bản đã xóa
            $removedPrice = $cart[$id]['quantity'] * $cart[$id]['price'];

            // Xóa phiên bản ra khỏi giỏ hàng
            unset($cart[$id]);



        }

        return redirect()->back();
    }
    public function buyNow(Request $request)
    {
        // Check if the user is logged in
        $customer = Auth::guard('customers')->user();

        $admin = Auth::guard('admins')->user();

        if (!$customer) {
            return redirect()->route('user.loginRegister');
        }

        $cart = $request->session()->get('cart', []);

        // Create a new order
        $order = new Order([
            'Status' => "Pending", // Set the initial status (you can change this)
            'OrderDate' => now(),
            'payment_methods_id' => $request->input('payment_methods_id'), // Assuming you have a select input for payment method
            'admins_id' => null, // Set the admin ID (you can change this)
            'customers_id' => $customer->id,
        ]);

        $order->save();

        // Create order details
        $orderDetails = [];

        foreach ($cart as $cartItem) {

            $orderDetails[] = new DetailedOrders([
                'Amount' => $cartItem['quantity'],
                'PriceVersion' => $cartItem['price'],
                'versions_id' => $cartItem['id'], // You should have the product_detail_id in your cart item
            ]);
        }

        $order->orderDetails()->saveMany($orderDetails);

        // Clear the cart after the purchase is completed
        $request->session()->forget('cart');

        return redirect()->route('user.cartHistory.history');
    }

    public function cartHistory(){
        $customer = Auth::guard('customers')->user();

        $orders = DB::table('orders')
            ->where('orders.customers_id', $customer->id)
                ->select(
                    'orders.id',
                    'orders.OrderDate',
                )
            ->get();
//        foreach ($orders as $order) {
//            if ($order->Status === 'Pending' || $order->Status === 'Confirmed') {
//                // Cập nhật trạng thái đơn hàng thành 'Cancelled'
//                DB::table('orders')
//                    ->where('id', $order->id)
//                    ->update(['Status' => 'Cancelled']);
//            }
//        }

        return view('user.cartHistory.history' ,[
            'customer' => $customer,
            'orders' => $orders,


        ]);
    }

    public function cartDt(Request $request,$order_id){
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
            ->where('orders.id', $order_id)
            ->get();

        $order = Order::find($order_id);

        $totalPrice = 0;
        foreach ($orderDt as $dt) {
            $totalPrice +=  ($dt-> Amount * $dt-> PriceVersion);
        }


        return view('user.cartDt.history' ,compact('totalPrice', 'order' ),[
            'orderDt' => $orderDt,


        ]);
    }
    public function cancelOrder(Request $request, $order_id)
    {
        // Kiểm tra trạng thái đơn hàng
        $order = Order::find($order_id);


        if ($order->Status === 'Shipping') {
            return redirect()->back()->with('error', 'Không thể hủy đơn hàng ở trạng thái Shipping');
        }

        if ($order->Status === 'Pending' || $order->Status === 'Confirmed') {
            // Cập nhật trạng thái đơn hàng thành 'Cancelled'
            $order->update(['Status' => 'Cancelled']);
            return redirect()->back()->with('success', 'Đơn hàng đã được hủy');
        }

        return redirect()->back();
    }

}
