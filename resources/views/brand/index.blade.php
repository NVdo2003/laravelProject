@extends('brand.master')
@section('content')
    <a href="{{ route('brand.create') }}" class="btn btn-danger">Add Brand</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Brand Table</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brand as $bran)
                        <tr>
                            <td>{{ $bran->brand_id}}</td>
                            <td>{{ $bran->Brand_name }}</td>
                            <td><a href=" {{ route('brand.edit',  $bran->brand_id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form method="post" action="{{ route('brand.destroy', $bran->brand_id)}}">
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
