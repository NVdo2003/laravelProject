{{-- 
@extends('order.master')
@section('content')

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Order</h6>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('order.update', $order) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="OrderDate" class="form-label">Date</label>
                    <input type="text" class="form-control" id="OrderDate" name="OrderDate" value="{{ $order->OrderDate }}" required>
                </div>
                <div class="mb-3">
                    <label for="Status" class="form-label">Status</label>
                    <input type="text" class="form-control" id="Status" name="Status" value="{{ $order->Status }}" required>
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label for="admins_id" class="form-label">Employee</label>
                    <select class="form-select" id="admins_id" name="admins_id" required>
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}" @if ($admin->id == $order->admins_id) selected @endif>{{ $admin->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="customers_id" class="form-label">Customer</label>
                    <select class="form-select" id="customers_id" name="customers_id" required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" @if ($customer->id == $order->customers_id) selected @endif>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Brand -->
                <div class="mb-3">
                    <label for="payment_methods_id" class="form-label">Payment</label>
                    <select class="form-select" id="payment_methods_id" name="payment_methods_id" required>
                        @foreach ($payment as $paymen)
                            <option value="{{ $paymen->id }}" @if ($paymen->id == $order->payment_methods_id) selected @endif>{{ $paymen->Method }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
@endsection --}}
