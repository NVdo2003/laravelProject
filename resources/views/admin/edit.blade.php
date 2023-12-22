@extends('admin.master')
@section('content')

    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Edit Admin</h6>
            <form method="post" action="{{ route('admin.update', $admin) }}">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$admin->name}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Pass</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" value="{{$admin->password}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone_number" value="{{$admin->phone_number}}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="{{$admin->email}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>

            </form>
        </div>
    </div>
@endsection
