@extends('product.master')
@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-danger">Add product</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Product Table</h6>
                <table id="tbIndex" class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Type</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col"></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $produc)
                        <tr>
                            <td>{{ $produc->id }}</td>
                            <td>{{ $produc->product_name }}</td>
                            <td>
                                <img src="{{ asset(Storage::url('public/admin/'. $produc->image))}}" width="190px" height="150px">
                            </td>
                            <td>{{ $produc->price }}</td>
                            <td>{{ $produc->Type_name }}</td>
                            <td>{{ $produc->Category_name }}</td>
                            <td>{{ $produc->Brand_name   }}</td>
                            <td><a href=" {{ route('product.edit', $produc->id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                {{-- <form method="post" action="{{ route('product.destroy', $produc->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-warning">Delete</button>
                                </form> --}}
                                <button class="btn btn-warning" onclick="showDeleteConfirmation({{ $produc->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="btn btn-secondary">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm product deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this product?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <form method="post" id="deleteProductForm" action="">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">OK</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showDeleteConfirmation(productId) {
                var deleteUrl = "{{ route('product.destroy', ':id') }}";
                deleteUrl = deleteUrl.replace(':id', productId);

                // Đặt action của form xóa sản phẩm với URL tương ứng
                document.getElementById('deleteProductForm').setAttribute('action', deleteUrl);

                // Hiển thị modal xác nhận
                $('#deleteConfirmationModal').modal('show');
            }
        </script>
@endsection

