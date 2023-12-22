@extends('category.master')
@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-danger">Add Category</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Category Table</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $cate)
                        <tr>
                            <td>{{ $cate->cate_id }}</td>
                            <td>{{ $cate->Category_name }}</td>
                            <td><a href=" {{ route('category.edit', $cate->cate_id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form method="post" action="{{ route('category.destroy', $cate->cate_id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-warning">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
