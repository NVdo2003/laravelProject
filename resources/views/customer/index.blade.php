@extends('customer.master')
@section('content')
    <a href="{{ route('customer.create') }}" class="btn btn-danger">Add Customer</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Customer Table</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Pass</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer as $cus)
                        <tr>
                            <td>{{ $cus->id }}</td>
                            <td>{{ $cus->name }}</td>
                            <td>{{ $cus->password }}</td>
                            <td>{{ $cus->phone_number }}</td>
                            <td>{{ $cus->email }}</td>
                            <td>{{ $cus->address }}</td>
                            <td><a href=" {{ route('customer.edit', $cus->id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form method="post" action="{{ route('customer.destroy', $cus->id)}}">
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
