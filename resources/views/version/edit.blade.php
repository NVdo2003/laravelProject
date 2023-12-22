{{--@extends('product.master')
@section('content')

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Type</h6>
            <form method="post" action="{{ route('product.update', $product) }}">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label for="types_id" class="form-label">Type</label>
                    <select class="form-select" id="types_id" name="types_id" required>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @if ($type->id == $product->types_id) selected @endif>{{ $type->Type_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="categories_id" class="form-label">Category</label>
                    <select class="form-select" id="categories_id" name="categories_id" required>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $product->categories_id) selected @endif>{{ $category->Category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand -->
                <div class="mb-3">
                    <label for="brands_id" class="form-label">Brand</label>
                    <select class="form-select" id="brands_id" name="brands_id" required>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @if ($brand->id == $product->brands_id) selected @endif>{{ $brand->Brand_name }}</option>
                        @endforeach
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
@endsection--}}
@extends('version.master')
@section('content')

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Product</h6>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('version.update', $version) }}" enctype="multipart/form-data"">
                @csrf
                @method('PUT')

            
                <div class="mb-3">
                    <label for="Version_name" class="form-label"> Name</label>
                    <input type="text" class="form-control" id="Version_name" name="Version_name" value="{{ $version->Version_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="" required>
                    <img src="{{ asset(Storage::url('public/admin/'. $version->image))}}" width="170px" height="150px">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $version->price }}" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $version->quantity }}" required>
                </div>
                <div class="mb-3">
                    <label for="Version_details" class="form-label">Name Details</label>
                    <input type="text" class="form-control" id="Version_details" name="Version_details" value="{{ $version->Version_details }}" required>
                </div>

         
                <div class="mb-3">
                    <label for="products_id" class="form-label">Product</label>
                    <select class="form-select" id="products_id" name="products_id" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" @if ($product->id == $version->products_id) selected @endif>{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
@endsection
