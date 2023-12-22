<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        href="https://myshoes.vn/image/catalog/logo/logo-myshoes-nho.png"
        rel="icon"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <title>LapTop</title>
    {{--    <link rel="stylesheet" href="/Public/Icons/fontawesome/css/all.min.css" />--}}
    <link rel="stylesheet" href=" {{asset('user/Icons/fontawesome/css/all.min.css')}} ">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href="{{asset('user/Css/Client/base/reset.css')}}"
    />
    <link
        rel="stylesheet"
        type="text/css"
        href=" {{asset('user/Css/Client/base/root.css')}}"
    />
    <link rel="stylesheet" href="{{asset('user/Css/Client/Effects/hover.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/cart.css')}}" />
</head>
<body>
<div class="site-wrapper">
    <header class="header">
        <div class="header-wrapper">
            <div class="header-navbar">
                <div class="logo-wrapper">
                    <a href="{{ route('user.home.index')}}">
                        <img
                            src="https://static.ybox.vn/2022/5/1/1653287716717-LOGO%20XGEAR%20FINAL%20black.png"
                            alt
                            class="logo-img"
                        />
                    </a>
                </div>
                <form class="search-wrapper" action method="POST">
                    <input type="text" name="by" placeholder="Tìm kiếm sản phẩm..." />
                    <button type="submit" class="search-btn">
                        <i class='bx bx-search-alt'></i>
                    </button>
                </form>
                <div class="classic-wrapper">
                    @if(Auth::guard('customers')->check())
                        <div class="accounts">
                            <a href="?controller=login&action=login" class="accounts-link">
                                <i class='bx bxs-user'></i>
                                <div class="links-text">
                                    <span>Tài khoản</span>
                                    <span>{{ Auth::guard('customers')->user()->name }}</span>
                                </div>
                            </a>
                            <div class="dropdown-menu-accounts">
                                <span class="login"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                                <a href="{{ route('user.login.logout') }}">Logout</a></span>
                            </div>
                        </div>
                    @else
                        <div class="accounts">
                            <a href="?controller=login&action=login" class="accounts-link">
                                <i class='bx bxs-user'></i>
                                <div class="links-text">
                                    <span>Tài khoản</span>
                                    <span>Đăng nhập/ Đăng ký</span>
                                </div>
                            </a>
                        </div>
                    @endif
                    <div class="cart">
                        <a href="{{ route('home.showCart') }}" class="cart-link hvr-icon-grow">
                            <i class='bx bx-cart-alt'></i>
                        </a>
                        <span class="quantity">!</span>
                        <div class="cart-empty">
                            <span>Giỏ Hàng</span>
                        </div>
                    </div>
                    <div class="cart">
                        <a href="{{ route('user.cartHistory.history') }}" class="cart-link hvr-icon-grow">
                            <i class='bx bx-cart-download' ></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</div>
</header>


<div class="body">
    <div class="checkout-cart">
        <div class="row g-0">
            <div class="col-7-5">
                <div class="cart-desc">
                    <h1>Giỏ hàng của bạn</h1>
                    <form method="POST" action="{{ route('home.updateCart') }}" class="cart-table cart-form">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10%">Hình ảnh</th>
                                <th style="width: 30%">Tên sản phẩm</th>
                                <th style="width: 10%">Số lượng</th>
                                <th style="width: 20%">Cập nhật</th>
                                <th style="width: 10%">Đơn giá</th>
                                <th style="width: 10%">Tổng cộng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Session::has('cart'))

                                <!-- Kiểm tra nếu $cart là mảng -->
                                @if (count(Session::get('cart')) > 0)
                                    @foreach (Session::get('cart') as $id => $version)

                                        <tr>
                                            <td>
                                                <img class="td-img" src="{{ asset(Storage::url('public/admin/' . $version['image'])) }}">
                                            </td>
                                            <td>
                                                <a href="#" class="td-name">{{ $version['Version_name'] }}</a>
                                            </td>
                                            <td class="td-quantity">
                                                <div class="product-quantity">
                                                    {{--<input name="quantity[{{ $id }}]" class="test" type="number" min="1" value="{{ $version['quantity'] }}">--}}
                                                    <input name="quantity[{{ $id }}]" class="test" type="number" min="1" value="{{ $version['quantity'] }}" id="quantity-{{ $id }}">

                                                    <span class="plus hvr-fade-for-icon" onclick="increaseQuantity({{ $id }})">+</span>
                                                    <span class="minus hvr-fade-for-icon" onclick="decreaseQuantity({{ $id }})">-</span>
                                                    @csrf
                                                </div>
                </div>
                </td>
                <td>
                    <a href="{{ route('home.deleteCart', ['id' => $id]) }}" class="td-delete">
                        Xóa
                    </a>
                </td>
                <td>{{ number_format($version['price']) }}₫</td>
                <td>{{ number_format($version['quantity'] * $version['price']) }}₫</td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="6">Không có sản phẩm nào trong giỏ hàng</td>
                    </tr>
                @endif
                <!-- Xử lý khi $cart không phải là mảng, ví dụ hiển thị thông báo hoặc thực hiện các xử lý khác -->
                                         @endif
                </tbody>
                </table>

                <div class="submit-btn">
                    <button href="" type="submit" class="update-cart">Cập nhật giỏ hàng</button>
                    <a href="{{ route('user.cartHistory.history') }}" type="submit" class="update-cart">Lịch Sử Đơn Hàng</a>
                </div>

                </form>

            </div>
        </div>

        <div class="col-4-2 ms-5">
            <form class="cart-payment" method="POST" action="{{ route('home.buy')}} ">
                @csrf
                <div class="panels-total">
                    <h4>Thanh toán tại đây !</h4>
                    <div class="cart-total">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td style="font-weight: 700;">Thành tiền:</td>
                                <td>
                                    <input class="td-input" type="text" readonly value="{{number_format($totalPrice) }} ₫">
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label for="paymentMethod" style="font-size: 13px">Chọn phương thức thanh toán:</label>
                    <select style="font-size: 15px ; margin-bottom: 50px; color: #fa4300" class="form-control" name="payment_methods_id" id="paymentMethod">
                        <option value="" selected disabled>Hãy chọn phương thức thanh toán</option>
                        @foreach($payment as $or)
                            <option style="font-size: 15px"  value="{{ $or->id }}">{{ $or->Method }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="btn-payment">
                    <button id="paymentButton" >Thanh toán</button>
                </div>

            </form>
        </div>
    </div>
</div>
<form class="col-md-5 ml-8" id="paymentForm">
    <div class="cart-page-total" id="qrCodeSection" style="display: none">
        <h2>QR Code</h2>
        <ul style="width: 251.6px; margin-left: 150px;">
            <li>
                <img src="{{ asset(Storage::url('public/admin/QR.jpg' )) }}" style="width: 100%;">
                <span>ND chuyển khoản: Tên + email TK</span>
            </li>
        </ul>
        {{--                                    <button type="submit" style="width: 150px; text-align: center;" id="buyNowButton">Buy Now</button>--}}
    </div>
</form>
</div>
<footer>
    <div class="footer">
        <div class="footer-wrapper">
            <div class="row g-0">
                <div class="col-6">
                    <div class="title-module">
                        <h3 class="title-register">ĐĂNG KÝ NHẬN THÔNG TIN</h3>
                        <p>
                            Đăng ký ngay để được cập nhật sớm nhất những thông tin hữu
                            ích, ữu đãi vô cùng hấp dẫn và những món quà bất ngờ từ
                            Myshoes.vn!
                        </p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="newsletter-form">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control newsletter-email"
                                placeholder="Nhập email của bạn "
                            />
                            <div class="input-group-append d-flex">
                                <button class="btn btn-danger btn-register" type="button">
                                    <i class="fa-solid fa-envelope"></i>Đăng Ký
                                </button>
                            </div>
                        </div>
                        <div class="form-check mt-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value
                                id="flexCheckChecked"
                            />
                            <label class="form-check-label" for="flexCheckChecked">
                                Tôi đã đọc và đồng ý với <span>Chính sách bảo mật</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-wrapper">
            <div class="row g-0 mt-3">
                <div class="col-5">
                    <div class="block-address">
                        <h3>LAPTOP CHÍNH HÃNG</h3>
                        <div class="block-header">
                            <img
                                src="https://xgear.net/wp-content/uploads/2023/06/Logo-Xgear-300.png"
                                alt
                            />
                            <div class="block-wrapper">
                      <span
                      >Website được định hướng trở thành hệ thống thương mại
                        điện tử bán giày chính hãng hàng đầu Việt Nam.</span
                      >
                                <span>Showroom: 249 Xã Đàn, Đống Đa, Hà Nội</span>
                                <span>Hotline: 0973711868</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2-3">
                    <div class="about-us">
                        <h3>VỀ CHÚNG TÔI</h3>
                        <ul>
                            <li>
                                <a style="color: #fff" href="?redirect=about"
                                >Giới thiệu</a
                                >
                            </li>
                            <li><a>Điều khoản sử dụng</a></li>
                            <li><a>Chính sách bảo mật</a></li>
                            <li><a>Tin tức myshoes</a></li>
                            <li><a>Cơ hội việc làm</a></li>
                            <li><a>Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-2-3">
                    <div class="about-us">
                        <h3>KHÁCH HÀNG</h3>
                        <ul>
                            <li><a>Hướng dẫn mua hàng</a></li>
                            <li><a>Chính sách đổi trả</a></li>
                            <li><a>Chính sách bảo hành</a></li>
                            <li><a>Khách hàng thân thiết</a></li>
                            <li><a>Hướng dẫn chọn size</a></li>
                            <li><a>Chương trình khuyến mại</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-2-3">
                    <div class="about-us certificate">
                        <h3>KHÁCH HÀNG</h3>
                        <div class="certificate-img">
                            <img
                                src="https://images.dmca.com/Badges/DMCA_logo-grn-btn150w.png?ID=1ed4cd9e-5ee4-4b63-95dc-c70388edd3cb"
                                alt
                            />
                            <img
                                src="https://myshoes.vn/image/catalog/logo/logo-bct.png"
                                alt
                                width="60%"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-wrapper">
            <div class="copyright">Copyright © 2023 Mygroup Tech.,JSC</div>
        </div>
    </div>
</footer>
</div>

<script src="{{asset('/Views/Client/cart/handleMoreQuantity.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Thêm mã JavaScript để xử lý sự kiện click -->
<script>
    function increaseQuantity($id) {
        var inputElement = document.getElementById('quantity-' + $id);
        console.log('quantity-' + $id)
        var currentValue = parseInt(inputElement.value);
        if (!isNaN(currentValue)) {
            inputElement.value = currentValue + 1;
        }
    }

    function decreaseQuantity($id) {
        var inputElement = document.getElementById('quantity-' + $id);
        var currentValue = parseInt(inputElement.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            inputElement.value = currentValue - 1;
        }
    }


</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const paymentButton = document.getElementById("paymentButton");

        if (paymentButton) {
            paymentButton.addEventListener("click", function (event) {
                const paymentMethod = document.getElementById("paymentMethod");
                if (paymentMethod.value === '') {
                    event.preventDefault(); // Ngăn chặn hành vi mặc định của nút
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Vui lòng chọn phương thức thanh toán!',
                    });
                }
            });
        }
    });
</script>

{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function() {--}}
{{--        const paymentSelect = document.getElementById("payment_methods_id");--}}
{{--        const buyNowButton = document.getElementById("buyNowButton");--}}
{{--        const orderSuccessMessage = document.getElementById("orderSuccessMessage"); // Thêm dòng này--}}

{{--        let shouldSubmitForm = false;--}}

{{--        buyNowButton.addEventListener("click", function(e) {--}}
{{--            if (paymentSelect.value === "--- Chọn Phương Thức Thanh Toán ---") {--}}
{{--                Swal.fire({--}}
{{--                    icon: 'warning',--}}
{{--                    title: 'Thông báo!',--}}
{{--                    text: 'Bạn phải chọn Phương Thức Thanh Toán trước khi tiếp tục.',--}}
{{--                });--}}
{{--                shouldSubmitForm = false;--}}
{{--                e.preventDefault();--}}
{{--            } else {--}}
{{--                shouldSubmitForm = true;--}}
{{--            }--}}
{{--        });--}}

{{--        // Thêm sự kiện xử lý sau khi gửi form--}}
{{--        document.querySelector('form').addEventListener('submit', function(e) {--}}
{{--            if (!shouldSubmitForm) {--}}
{{--                e.preventDefault();--}}
{{--            } else {--}}
{{--                // Hiển thị thông báo đặt hàng thành công--}}
{{--                orderSuccessMessage.style.display = "block";--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}

{{--</script>--}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const paymentSelect = document.getElementById("paymentMethod");
        const buyNowButton = document.getElementById("paymentButton");
        const orderSuccessMessage = document.getElementById("orderSuccessMessage"); // Thêm dòng này

        let shouldSubmitForm = false;

        buyNowButton.addEventListener("click", function(e) {
            if (paymentSelect.value === "--- Chọn Phương Thức Thanh Toán ---") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Thông báo!',
                    text: 'Bạn phải chọn Phương Thức Thanh Toán trước khi tiếp tục.',
                });
                shouldSubmitForm = false;
                e.preventDefault();
            } else {
                shouldSubmitForm = true;
            }
        });

        // Thêm sự kiện xử lý sau khi gửi form
        document.querySelector('form').addEventListener('submit', function(e) {
            if (!shouldSubmitForm) {
                e.preventDefault();
            } else {
                // Hiển thị thông báo đặt hàng thành công
                orderSuccessMessage.style.display = "block";
            }
        });
    });

</script>
<script>
    // Function to toggle the visibility of the QR code section
    function toggleQRCodeSection(show) {
        var qrCodeSection = document.getElementById('qrCodeSection');
        qrCodeSection.style.display = show ? 'block' : 'none';
    }

    // Add an event listener to the payment dropdown
    document.getElementById('paymentMethod').addEventListener('change', function () {
        var selectedPaymentMethod = this.value;

        // console.log("Selected Payment Method: " + selectedPaymentMethod);

        // Check if the selected payment method is 'Chuyển Khoản' or 'Banking'
        if (selectedPaymentMethod === '2') {
            toggleQRCodeSection(true); // Show the QR code section
        } else {
            toggleQRCodeSection(false); // Hide the QR code section
        }
    });
</script>
</body>
</html>
