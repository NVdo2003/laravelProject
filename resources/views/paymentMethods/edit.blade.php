@extends('paymentMethods.master')
@section('content')

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit PaymentMethods</h6>
            <form method="post" action="{{ route('paymentMethods.update', $paymentMethods) }}">
                @csrf
                @method('PUT')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Method" value="{{$paymentMethods->Method}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
@endsection
