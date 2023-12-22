@extends('admin.master')
@section('content')
    <a href="{{ route('admin.create') }}" class="btn btn-danger">Add Admin</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Admin Table</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Pass</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admin as $ad)
                        <tr>
                            <td>{{ $ad->id }}</td>
                            <td>{{ $ad->name }}</td>
                            <td>{{ $ad->password }}</td>
                            <td>{{ $ad->phone_number }}</td>
                            <td>{{ $ad->email }}</td>
                            <td><a href=" {{ route('admin.edit', $ad->id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form method="post" action="{{ route('admin.destroy', $ad->id)}}">
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
