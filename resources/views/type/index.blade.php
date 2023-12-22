@extends('type.master')
@section('content')
    <a href="{{ route('type.create') }}" class="btn btn-danger">Add Type</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Type Table</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($type as $ty)
                        <tr>
                            <td>{{ $ty->id }}</td>
                            <td>{{ $ty->Type_name }}</td>
                            <td><a href=" {{ route('type.edit', $ty->id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form method="post" action="{{ route('type.destroy', $ty->id)}}">
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
