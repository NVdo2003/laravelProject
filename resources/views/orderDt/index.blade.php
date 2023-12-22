@extends('order.master')
@section('content')
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Manage Order</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Customer</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($orderDt->count() > 0)
                        <tr>
                            <td>{{ $orderDt[0]->name }}</td>
                            <td>{{ $orderDt[0]->address }}</td>
                            <td>{{ $orderDt[0]->phone_number }}</td>
                            <td>{{ $orderDt[0]->email }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Version</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderDt as $or)
                        <tr>
                            <td>
                                <img src="{{ asset(Storage::url('public/admin/'. $or->image))}}" width="190px" height="150px">
                            </td>
                            <td>{{ $or->Version_name }}</td>
                            <td>{{ $or->Amount }}</td>
                            <td>{{ $or->PriceVersion }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection
