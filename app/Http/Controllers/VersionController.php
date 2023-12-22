<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Specifications;
use App\Models\Version;
use App\Http\Requests\StoreVersionRequest;
use App\Http\Requests\UpdateVersionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $version = DB::table('versions')
            ->join('products','versions.products_id', "=", 'products.id')
            ->select(
                'versions.id',
                'versions.Version_name',
                'versions.image',
                'versions.price',
                'versions.quantity',
                'versions.Version_details',
                'products.product_name',
            )->get();

        return view('version.index', compact('version'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('version.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVersionRequest $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        if(!Storage::exists('public/admin'.$image)){
            Storage::putFileAs('public/admin', $request->file('image'), $image);
        }

        // Tạo sản phẩm mới và cập nhật trường image trong cơ sở dữ liệu
        $version = new Version();
        $version->Version_name = $request->input('Version_name');
        $version->image = $image; // Gán tên tệp hình ảnh vào trường 'image'
        $version->price = $request->input('price');
        $version->quantity = $request->input('quantity');
        $version->Version_details = $request->input('Version_details');
        $version->products_id = $request->input('products_id');
        $version->save();

        return redirect()->route('version.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Version $version)
    {
        // $specifications = Specifications::all();
        // $products = Product::all();
        // return view('specifications.index', compact('specifications', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Version $version)
    {
        $products = Product::all();

        return view('version.edit', [
            'version' =>$version,
            'products' =>$products,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVersionRequest $request, Version $version)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            if (!Storage::exists('public/admin' . $image)) {
                Storage::putFileAs('public/admin', $request->file('image'), $image);
            }
        } else {
            $image = $version->image;
        }

        $version->update([
            'Version_name' => $request->input('Version_name'),
            'image' => $image,
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'Version_details' => $request->input('Version_details'),
            'products_id' => $request->input('products_id'),
        ]);

        return redirect()->route('version.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Version $version)
    {
        $version->delete();

        return redirect()->route('version.index');
    }

//    public function detail()
//    {
//        $version = DB::table('versions')
//            ->join('products','versions.products_id', "=", 'products.id')
//            ->select(
//                'versions.id',
//                'versions.Version_name',
//                'versions.image',
//                'versions.price',
//                'versions.quantity',
//                'versions.Version_details',
//                'products.product_name',
//            )->get();
//
//        return view('user.productDetail.detail', compact('version'));
//    }
//    public function addToCart(Version $version){
//
//        $cart = array();
//        $cart[$version->id]['Version_name'] = $version->Version_name;
//        $cart[$version->id]['image'] = $version->image;
//        $cart[$version->id]['price'] = $version->price;
//        $cart[$version->id]['quantity'] = $version->quantity;
//        dd($cart);
//        Session::put('cart', $cart);
//        return view('user.cart.cart');
//    }
}
