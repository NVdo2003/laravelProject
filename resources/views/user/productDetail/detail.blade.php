<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        href="https://myshoes.vn/image/catalog/logo/logo-myshoes-nho.png"
        rel="icon"
    />
    <title>LapTop</title>
    {{--    <link rel="stylesheet" href="/Public/Icons/fontawesome/css/all.min.css" />--}}
    <link rel="stylesheet" href=" {{asset('user/Icons/fontawesome/css/all.min.css')}} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/detail.css')}}" />
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
                <form class="search-wrapper" action="{{ route('search') }}" method="POST">
                    @csrf
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
                        <div class="cart-empty">
                            <span>Lịch Sử</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-wrapper">
            <div class="menu-default">
                <ul class="main-menu">
                    <a href="{{ route('user.home.index')}}" class="item-link">
                        <i class='bx bxs-home-heart'></i>
                        <span class="item-name">HOME</span>
                    </a>
                    @foreach ($type as $laptop)
                        @if ($laptop->id == 1)
                            <li class="menu-item hvr-float-shadow position-relative">
                                <a href="{{ route('user.type.tp', ['id' => $laptop->id]) }}" class="item-link">
                                    <i class='bx bx-laptop'></i>
                                    <span class="item-name">{{ $laptop->Type_name }}</span>
                                </a>
                                <div class="sub-menu z-3 position-absolute w-100 text-center">
                                    @php
                                        $displayedCateIds = []; // Danh sách các cate_id đã được hiển thị
                                    @endphp
                                    @foreach ($product as $item)
                                        @if ($item->id == 1 && !in_array($item->cate_id, $displayedCateIds))
                                            <ul class="list-group">
                                                <a href="{{ route('user.category.cat', ['id' => $item->cate_id]) }}">
                                                    <li class="list-group-item p-2">{{ $item->Category_name }}</li>
                                                </a>
                                            </ul>
                                            @php
                                                $displayedCateIds[] = $item->cate_id; // Đánh dấu rằng cate_id đã được hiển thị
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </li>

                        @endif
                        @if ($laptop->id == 2)
                            <li class="menu-item hvr-float-shadow position-relative">
                                <a href="{{ route('user.type.tp', ['id' => $laptop->id]) }}" class="item-link">
                                    <i class='bx bx-headphone'></i>
                                    <span class="item-name">{{ $laptop->Type_name }}</span>
                                </a>
                                <div class="sub-menu z-3 position-absolute w-100 text-center">
                                    @php
                                        $displayedCateIds = []; // Danh sách các cate_id đã được hiển thị
                                    @endphp
                                    @foreach ($product as $item)
                                        @if ($item->id == 2 && !in_array($item->cate_id, $displayedCateIds))
                                            <ul class="list-group">
                                                <a href="{{ route('user.category.cat', ['id' => $item->cate_id]) }}">
                                                    <li class="list-group-item p-2">{{ $item->Category_name }}</li>
                                                </a>
                                            </ul>
                                            @php
                                                $displayedCateIds[] = $item->cate_id; // Đánh dấu rằng cate_id đã được hiển thị
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif
                        @if ($laptop->id == 3)
                            <li class="menu-item hvr-float-shadow position-relative">
                                <a href="{{ route('user.type.tp', ['id' => $laptop->id]) }}" class="item-link">
                                    <i class='bx bx-desktop'></i>
                                    <span class="item-name">{{ $laptop->Type_name }}</span>
                                </a>
                                <div class="sub-menu z-3 position-absolute w-100 text-center">
                                    @php
                                        $displayedCateIds = []; // Danh sách các cate_id đã được hiển thị
                                    @endphp
                                    @foreach ($product as $item)
                                        @if ($item->id == 3 && !in_array($item->cate_id, $displayedCateIds))
                                            <ul class="list-group">
                                                <a href="{{ route('user.category.cat', ['id' => $item->cate_id]) }}">
                                                    <li class="list-group-item p-2">{{ $item->Category_name }}</li>
                                                </a>
                                            </ul>
                                            @php
                                                $displayedCateIds[] = $item->cate_id; // Đánh dấu rằng cate_id đã được hiển thị
                                            @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif

                        @if ($laptop->id == 5)
                            <li class="menu-item hvr-float-shadow position-relative">
                                <a href="" class="item-link">
                                    <i class='bx bx-memory-card'></i>
                                    <span class="item-name">{{ $laptop->Type_name }}</span>
                                </a>
                                <div class="sub-menu z-3 position-absolute w-100 text-center">

                                    @foreach ($product as $item)
                                        @if ($item->id == 5)
                                            <ul class="list-group">
                                                <li class="list-group-item p-2">{{ $item->Category_name }}</li>
                                            </ul>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif

                        @if ($laptop->id == 4)
                            <li class="menu-item hvr-float-shadow position-relative">
                                <a href class="item-link">
                                    <i class='bx bx-dollar'></i>
                                    <span class="item-name">{{ $laptop->Type_name }}</span>
                                </a>
                                <div class="sub-menu z-3 position-absolute w-100 text-center">
                                    @foreach ($product as $item)
                                        @if ($item->id == 4)
                                            <ul class="list-group">
                                                <li class="list-group-item p-2">{{ $item->Category_name }}</li>
                                            </ul>
                                        @endif
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        </div>
        </div>
    </header>
    <div class="body">
        <div class="row g-0">
            <div class="col-12">
                <div class="content">
                    @foreach ($version as $products)

                    <div class="product-info">
                        <div class="product-left">
                            <div class="product-img">
                                <img
                                    src="{{ asset(Storage::url('public/admin/'. $products->image)) }}"
                                    alt
                                />
                            </div>
                        </div>
                        <div class="product-right">
                            <div class="product-name">
                                {{ $products->Version_name }}
                            </div>
                            <div class="countdown-wrapper">
                                <h5 class="countdown-title">
                                    ⚡ GIÁ SALE HAPPY WOMEN'S DAY 4.3 - 8.3 ⚡
                                </h5>
                                @php
                                    $version_details = $products->Version_details;
                                    // Kiểm tra xem $product_name có phải là chuỗi hay không
                                    if (is_string($version_details)) {
                                        // Tách chuỗi thành mảng bằng dấu phân tách (ví dụ: dấu phẩy)
                                        $version_details_array = explode('; ', $version_details);
                                        // In ra từng phần tử của mảng
                                        foreach ($version_details_array as $item) {
                                            echo $item . '<br>';
                                        }
                                    } else {
                                        // Nếu không phải chuỗi, in ra giá trị ban đầu
                                        echo $version_details;
                                    }
                                @endphp
                            </div>
                            <div class="product-price-group">
                                <div class="price-wrapper">
                                    <div class="product-price-new hvr-float">{{ number_format($products->price, 0, ',', '.') }}₫</div>
                                </div>
                            </div>
                            <form class="product-options">
                                <div class="button-group-page">
                                    <a href="{{ route('user.cart.cart', ['id' => $products->id]) }}" class="button-cart hvr-sweep-to-right center-text">
                                        THÊM VÀO GIỎ
                                    </a>
                                    <br>
                                    <a href="{{ route('user.cart.cart', ['id' => $products->id]) }}" class="button-buy hvr-sweep-to-left center-text">
                                        MUA HÀNG NGAY
                                    </a>
                                </div>
                                <div class="hotline hvr-shrink">
                                    Hotline:<span> 0973 711 868</span>
                                </div>
                                <div class="content-top">
                                    <ul class="list-group list-group-horizontal">
                                        <li class="list-group-item list-group-item--2">
                                            <i class="fa-solid fa-circle-check"></i>
                                            <span>Hàng chính hãng, chât lượng cao</span>
                                        </li>
                                        <li class="list-group-item list-group-item--2">
                                            <i class="fa-solid fa-rotate"></i>
                                            <span>Đổi hàng 30 ngày, thủ tục đơn giản</span>
                                        </li>
                                        <li class="list-group-item list-group-item--2">
                                            <i class="fa-solid fa-truck"></i>
                                            <span>Miễn phí giao hành với đơn > 500k</span>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="product-tabs">
                        <div class="row g-0">
                            <div class="col-12">
                                <div class="tab-container">
                                    <ul class="nav-tabs">
                                        <li class="tab-item tab--active">
                                            <span>MÔ TẢ SẢN PHẨM</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tab-pane show">
                                    <p>
                                        XGEAR là một trang web hàng đầu cung cấp các sản phẩm liên quan đến laptop, bao gồm cả linh kiện và phụ kiện. Với cam kết cung cấp sản phẩm và dịch vụ chất lượng hàng đầu, XGEAR đã khẳng định vị thế của mình là một tên tuổi đáng tin cậy trong lĩnh vực công nghệ và máy tính.
                                        <br>
                                        Phục vụ đa dạng khách hàng từ những người đam mê công nghệ đến các chuyên gia, XGEAR tự hào với bộ sưu tập đa dạng gồm laptop chất lượng cao, các linh kiện tiên tiến và một loạt phụ kiện đa dạng. Cho dù bạn đang tìm kiếm những mẫu laptop mới nhất từ các thương hiệu nổi tiếng hay muốn nâng cấp hệ thống hiện tại với các sản phẩm bổ sung cao cấp, XGEAR cung cấp một lựa chọn đa dạng để đáp ứng nhu cầu và sở thích khác nhau.
                                    </p>
                                    <h4>
                                        tại XGEAR được nhập khẩu chính hãng. Full box, đầy
                                        đủ phụ kiện.
                                    </h4>
                                    <div class="detail-img">
                                        </div>
                                        <p>{{ $products->Version_details }}</p>
                                    </div>
                                    <div class="tab-pane">
                                        <div class="text-alert">
                                            Không có đánh giá cho sản phẩm này
                                        </div>
                                        <div class="mb-3">
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleFormControlInput1"
                                                placeholder="Tên bạn"
                                            />
                                        </div>
                                        <div class="mb-3">
                            <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                rows="3"
                                placeholder="Đánh giá của bạn"
                            ></textarea>
                                    </div>
                                    <div class="text-note">
                                        Lưu ý: <span> Không hỗ trợ HTML!</span>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100">
                                        TIẾP TỤC
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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

<script src="{{asset('Js/Client/showImage.js')}}"></script>
<script src="{{asset('Js/Client/handleSlideShow.js')}}"></script>
<script src="{{asset('Js/Client/setCountdown.js')}}"></script>
<script src="{{asset('Js/Client/handleUITabs.js')}}"></script>
<script src="{{asset('Js/Client/handleQuantity.js')}}"></script>
<script src="{{asset('Js/Client/handleCardSlider.js')}}"></script>
<script src="{{asset('Js/Client/toogleListProduct.js')}}"></script>
<script src="{{asset('Js/Client/detail/handleCheckboxSize.js')}}"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
></script>
</body>
</html>
