@extends('version.master')
@section('content')

    <div class="col-sm-12 col-xl-9">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Add Version</h6>
            <form method="post" action="{{route('version.store')}}" enctype="multipart/form-data">
                @csrf

                {{--product Name--}}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Version_name">
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
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="quantity">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name Details</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="Version_details">
                    </div>
                </div>

                <!-- Category Section -->
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="products_id">Product</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="products_id" name="products_id" required>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
