@extends('order.master')
@section('content')
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Manage Order</h6>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Email Customer</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Confirm</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $orde)
                        <tr>
                            <td>{{ $orde->id }}</td>
                            <td>{{ $orde->OrderDate }}</td>
                            <td>
                                @if($orde->Status === 'Shipping')
                                    <span class="btn btn-success btn-sm rounded-pill ">{{ $orde->Status }}</span>
                                @elseif($orde->Status === 'Pending')
                                    <span class="btn btn-danger btn-sm rounded-pill">{{ $orde->Status }}</span>
                                @elseif($orde->Status === 'Confirmed')
                                    <span class="btn btn-info btn-sm rounded-pill">{{ $orde->Status }}</span>
                                @elseif($orde->Status === 'Đã Nhận Hàng')
                                    <span class="btn btn-info btn-sm rounded-pill shippingStatus" id="shippingStatus{{ $orde->id }}">{{ $orde->Status }}</span>
                                @elseif($orde->Status === 'Cancelled')
                                    <span class="btn btn-warning btn-sm rounded-pill">{{ $orde->Status }}</span>
                                @else
                                    <span>{{ $orde->Status }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $orde->admin_name }}
                            </td>
                            <td>{{ $orde->customer_name }}</td>
                            <td>{{ $orde->email }}</td>
                            <td>{{ $orde->Method  }}</td>
                            <td>
                                <form action="{{ route('order.updateStatus', $orde->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info okButton" data-order-id="{{ $orde->id }}">OK</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('orderDt.index', ['customer_id' => $orde->customer_id, 'order_id' => $orde->id])}}" class="btn btn-danger">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div id="shippingAlert" style="display: none;">
            Bạn đang vận chuyển!
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".okButton").click(function(e) {
                    // Ngăn chặn hành động mặc định của nút OK
                    e.preventDefault();

                    // Lấy ID đơn hàng từ thuộc tính data
                    var orderId = $(this).data('order-id');

                    // Kiểm tra xem trạng thái có phải là "Shipping" hay không
                    if ($("#shippingStatus" + orderId).length) {
                        // Hiển thị thông báo nếu đang ở trạng thái "Shipping"
                        alert("Khách đã nhận được hàng!");
                    } else {
                        // Nếu không phải trạng thái "Shipping", tiếp tục hành động mặc định
                        $(this).closest("form").submit();
                    }
                });
            });
        </script>
@endsection
