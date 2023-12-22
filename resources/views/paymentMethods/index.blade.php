@extends('paymentMethods.master')
@section('content')
    <a href="{{ route('paymentMethods.create') }}" class="btn btn-danger">Add PaymentMethods</a>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">PaymentMethods Table</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Method</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paymentMethods as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->Method }}</td>
                            <td><a href=" {{ route('paymentMethods.edit', $payment->id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form method="post" action="{{ route('paymentMethods.destroy', $payment->id)}}">
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
