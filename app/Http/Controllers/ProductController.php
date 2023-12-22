<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Type;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
                'types.Type_name',
                'categories.Category_name',
                'brands.Brand_name'
            )->get();


        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy danh sách loại (types), danh mục (categories) và thương hiệu (brands) để sử dụng trong form
        $types = Type::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('product.create', compact('types', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $image = $request->file('image')->getClientOriginalName();
        if(!Storage::exists('public/admin'.$image)){
            Storage::putFileAs('public/admin', $request->file('image'), $image);
        }

        // Tạo sản phẩm mới và cập nhật trường image trong cơ sở dữ liệu
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->image = $image; // Gán tên tệp hình ảnh vào trường 'image'
        $product->price = $request->input('price');
        $product->types_id = $request->input('types_id');
        $product->categories_id = $request->input('categories_id');
        $product->brands_id = $request->input('brands_id');
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
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
                'types.Type_name',
                'categories.Category_name',
                'brands.Brand_name'
            )->get();
        return view('user.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('product.edit', [
            'product' =>$product,
            'types' => $types,
            'category' =>$categories,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product , )
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            if (!Storage::exists('public/admin' . $image)) {
                Storage::putFileAs('public/admin', $request->file('image'), $image);
            }
        } else {
            $image = $product->image;
        }

        // Cập nhật thông tin sản phẩm
        $product->update([
            'product_name' => $request->input('product_name'),
            'image' => $image,
            'price' => $request->input('price'),
            'types_id' => $request->input('types_id'),
            'categories_id' => $request->input('categories_id'),
            'brands_id' => $request->input('brands_id'),
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được xóa thành công.');
    }

}
