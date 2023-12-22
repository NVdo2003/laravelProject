{{-- @extends('order.master')--}}
{{--@section('content')--}}

{{--    <div class="col-sm-12 col-xl-9">--}}
{{--        <div class="bg-secondary rounded h-100 p-4">--}}
{{--            <h6 class="mb-4">Add Order</h6>--}}
{{--            <form method="post" action="{{route('order.store')}}">--}}
{{--                @csrf--}}

{{--                <div class="row mb-3">--}}
{{--                    <label class="col-sm-2 col-form-label">Date</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control" name="OrderDate">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row mb-3">--}}
{{--                    <label class="col-sm-2 col-form-label">Status</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control" name="Status">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Type Section -->--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label" for="admins_id">Employee</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <select class="form-control"  name="admins_id" required>--}}
{{--                            @foreach ($admins as $admin)--}}
{{--                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Category Section -->--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label" for="customers_id">Customer</label>--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <select class="form-control" id="customers_id" name="customers_id" required>--}}
{{--                            @foreach ($customers as $customer)--}}
{{--                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Brand Section -->--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label" for="payment_methods_id">Payment</label>--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <select class="form-control" id="payment_methods_id" name="payment_methods_id" required>--}}
{{--                            @foreach ($payment_methods as $payment_method)--}}
{{--                                <option value="{{ $payment_method->id }}">{{ $payment_method->Method }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-primary">Add</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection --}}
