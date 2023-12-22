@extends('version.master')
@section('content')
    <a href="{{ route('version.create') }}" class="btn btn-danger">Add Version</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Type Version</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name Version</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Version Details</th>
                        <th scope="col">Product</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($version as $ver)
                        <tr>
                            <td>{{ $ver->id }}</td>
                            <td>{{ $ver->Version_name }}</td>
                            <td>
                                <img src="{{ asset(Storage::url('public/admin/'. $ver->image))}}" width="190px" height="150px">
                            </td>
                            <td>{{ $ver->price }}</td>
                            <td>{{ $ver->quantity }}</td>
                            <td>{{ $ver->Version_details }}</td>
                            <td>{{ $ver->product_name }}</td>
                            <td><a href=" {{ route('version.edit', $ver->id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                {{-- <form method="post" action="{{ route('version.destroy', $ver->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-warning">Delete</button>
                                </form> --}}
                                <button class="btn btn-warning" onclick="showDeleteConfirmation({{ $ver->id }})">Delete</button>
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
            function showDeleteConfirmation(versionId) {
                var deleteUrl = "{{ route('version.destroy', ':id') }}";
                deleteUrl = deleteUrl.replace(':id', versionId);
        
                // Đặt action của form xóa sản phẩm với URL tương ứng
                document.getElementById('deleteProductForm').setAttribute('action', deleteUrl);
        
                // Hiển thị modal xác nhận
                $('#deleteConfirmationModal').modal('show');
            }
        </script>
@endsection
