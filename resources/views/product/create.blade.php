@extends('product.master')
@section('content')

    <div class="col-sm-12 col-xl-9">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Add Product</h6>
            <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf

                {{--product Name--}}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="product_name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price">
                    </div>
                </div>
                <!-- Type Section -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="types_id">Type</label>
                    <div class="col-sm-10">
                        <select class="form-control"  name="types_id" required>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->Type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Category Section -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="categories_id">Category</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="categories_id" name="categories_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->cate_id }}">{{ $category->Category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Brand Section -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="brands_id">Brand</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="brands_id" name="brands_id" required>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->brand_id }}">{{ $brand->Brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
