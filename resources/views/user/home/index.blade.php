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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}" />
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
                            <a href="{{ route('user.login.login') }}" class="accounts-link">
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
        <div class="row">
            <div class="col-12 px-0">
                <div class="content">
                    <div class="category-desc">
                        <img
                            class="category-banner"
                            src="{{asset('user/Images/bannerlaptop2.jpg')}}"
                            alt
                        />
                        <img
                            src="{{asset('user/Images/bannerlaptop1.jpg')}}"
                            alt="Giày Adidas Chính Hãng"
                            title="Giày Adidas Chính Hãng"
                            class="category-image"
                        />
                        <img
                            class="category-banner"
                            src="{{asset('user/Images/bannerlaptop2.jpg')}}"
                            alt
                        />
                    </div>
                    <div class="content-top">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item hvr-icon-fade">
                                <i class="fa-solid fa-circle-check hvr-icon"></i>
                                <span>Hàng chính hãng, chât lượng cao</span>
                            </li>
                            <li class="list-group-item hvr-icon-spin">
                                <i class="fa-solid fa-rotate hvr-icon"></i>
                                <span>Đổi hàng 30 ngày, thủ tục đơn giản</span>
                            </li>
                            <li class="list-group-item hvr-icon-forward">
                                <i class="fa-solid fa-truck hvr-icon"></i>
                                <span>Miễn phí giao hành với đơn > 500k</span>
                            </li>
                        </ul>
                    </div>

                    <div class="main-products-wrapper">
                        <div class="title-wrapper">
                            <h3>THƯƠNG HIỆU NỔI BẬT</h3>
                            <div class="title-divider"></div>
                        </div>

                    </div>
                    @foreach($brand as $bran)
                        @if ($bran->brand_id == 1)
                            <div class="quick-link">
                                <div>
                                    <a href="{{ route('user.brand.br', ['id' => 1]) }}" data-href="laptop-acer" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="//cdn.tgdd.vn/Brand/1/logo-acer-149x40.png" height="25" class="no-text">
                                    </a>
                                    <a href="{{ route('user.brand.br', ['id' => 2]) }}" data-href="laptop-asus" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="//cdn.tgdd.vn/Brand/1/logo-asus-149x40.png" height="25" class="no-text">

                                    </a>
                                    <a href="{{ route('user.brand.br', ['id' => 3]) }}" data-href="laptop-hp-compaq" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="//cdn.tgdd.vn/Brand/1/logo-hp-149x40-1.png" height="25" class="no-text">

                                    </a>
                                    <a href="{{ route('user.brand.br', ['id' => 5]) }}" data-href="laptop-apple-macbook" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="//cdn.tgdd.vn/Brand/1/logo-macbook-149x40.png" height="25" class="no-text">

                                    </a>
                                    <a href="{{ route('user.brand.br', ['id' => 9]) }}" data-href="laptop-gigabyte" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="//cdn.tgdd.vn/Brand/1/logo-gigabyte-149x40.png" height="25" class="no-text">

                                    </a>
                                    <a href="{{ route('user.brand.br', ['id' => 7]) }}" data-href="laptop-msi" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="//cdn.tgdd.vn/Brand/1/logo-msi-149x40.png" height="25" class="no-text">

                                    </a>
                                    <a href="{{ route('user.brand.br', ['id' => 11]) }}" data-href="laptop-lenovo" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="https://robots.net/wp-content/uploads/2023/08/what-is-the-logitech-logo-1691401854.jpg" height="32" class="no-text">

                                    </a>

                                    <a href="{{ route('user.brand.br', ['id' => 10]) }}" data-href="laptop-itel" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                        <img src="data:image/png;base64,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" height="25" class="no-text">

                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="main-products-wrapper">
                        <div class="title-wrapper">
                            <h3 class="mb-3">LAPTOP MỚI</h3>
                            <div class="title-divider"></div>
                            <div class="subtitle">#NEW</div>
                        </div>

                        <div class="main-products">
                            <div class="row g-0">

                                @foreach ($version->sortByDesc('id') as $products)
                                    @if($products->type_id === 1)
                                    <div class="col-2-4">
                                        <div href="" class="product-layout">
                                            <a href="{{ route('user.productDetail.detail', ['id' => $products->id]) }}" class="product-image">
                                                <img
                                                    src="{{ asset(Storage::url('public/admin/'. $products->image)) }}"
                                                    width="100%"
                                                    height="238.387"
                                                    alt=""
                                                    title=""
                                                />
                                            </a>
                                            <div class="product-caption">
                                                <div class="brand">
                                                    <a href="#" class="brand-title">{{ $products->Brand_name }}</a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">{{ $products->Version_name }}</a>
                                                </div>
                                                <div class="price">
                                                    <span class="price-new">{{ number_format($products->price, 0, ',', '.') }}₫</span>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <span class="tag-new">#NEW</span>
                                                <span class="tag-discount"></span>
                                            </div>
                                            <div class="product-layout--hover"></div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="main-products-wrapper">
                        <div class="title-wrapper">
                            <h3 class="mb-3">COMPUTER COMPONENTS MỚI</h3>
                            <div class="title-divider"></div>
                            <div class="subtitle">#NEW</div>
                        </div>

                        <div class="main-products">
                            <div class="row g-0">
                                @foreach ($version->sortByDesc('id') as $products)
                                    @if($products->type_id === 2)
                                    <div class="col-2-4">
                                        <div href="" class="product-layout">
                                            <a href="{{ route('user.productDetail.detail', ['id' => $products->id]) }}" class="product-image">
                                                <img
                                                    src="{{ asset(Storage::url('public/admin/'. $products->image)) }}"
                                                    width="100%"
                                                    height="238.387"
                                                    alt=""
                                                    title=""
                                                />
                                            </a>
                                            <div class="product-caption">
                                                <div class="brand">
                                                    <a href="#" class="brand-title">{{ $products->Brand_name }}</a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">{{ $products->Version_name }}</a>
                                                </div>
                                                <div class="price">
                                                    <span class="price-new">{{ number_format($products->price, 0, ',', '.') }}₫</span>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <span class="tag-new">#NEW</span>
                                                <span class="tag-discount"></span>
                                            </div>
                                            <div class="product-layout--hover"></div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="main-products-wrapper">
                        <div class="title-wrapper">
                            <h3 class="mb-3">COMPUTER ACCESSORY MỚI</h3>
                            <div class="title-divider"></div>
                            <div class="subtitle">#NEW</div>
                        </div>

                        <div class="main-products">
                            <div class="row g-0">
                                @foreach ($version->sortByDesc('id') as $products)
                                    @if($products->type_id === 3)
                                    <div class="col-2-4">
                                        <div href="" class="product-layout">
                                            <a href="{{ route('user.productDetail.detail', ['id' => $products->id]) }}" class="product-image">
                                                <img
                                                    src="{{ asset(Storage::url('public/admin/'. $products->image)) }}"
                                                    width="100%"
                                                    height="238.387"
                                                    alt=""
                                                    title=""
                                                />
                                            </a>
                                            <div class="product-caption">
                                                <div class="brand">
                                                    <a href="#" class="brand-title">{{ $products->Brand_name }}</a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">{{ $products->Version_name }}</a>
                                                </div>
                                                <div class="price">
                                                    <span class="price-new">{{ number_format($products->price, 0, ',', '.') }}₫</span>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <span class="tag-new">#NEW</span>
                                                <span class="tag-discount"></span>
                                            </div>
                                            <div class="product-layout--hover"></div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Sản phẩm nổi bật -->
                    <div class="main-products-wrapper">
                        <div class="title-wrapper">
                            <h3>SẢN PHẨM NỔI BẬT</h3>
                            <div class="title-divider"></div>
                            <div class="subtitle">#FEATURE</div>
                        </div>
                        <div class="main-products">
                            <div class="row g-0">
                                @foreach ($product as $produc)
                                    <div class="col-2-4">
                                        <div class="product-layout">
                                            <a href="{{ route('user.productVersion.pversion', ['id' => $produc->product_id]) }}" class="product-image">
                                                <img
                                                    src="{{ asset(Storage::url('public/admin/'. $produc->image)) }}"
                                                    width="100%"
                                                    height="238.387"
                                                    alt=""
                                                    title=""
                                                />
                                            </a>
                                            <div class="product-caption">
                                                <div class="brand">
                                                    <a href="#" class="brand-title">{{ $produc->Brand_name }}</a>
                                                </div>
                                                <div class="name">
                                                    <a href="#">{{ $produc->product_name }}</a>
                                                </div>
                                                <div class="price">
                                                    <span class="price-new">{{ $produc->price}}₫</span>
                                                </div>
                                            </div>
                                            <div class="tag">
                                                <span class="tag-new">#NEW</span>
                                                <span class="tag-discount"></span>
                                            </div>
                                            <div class="product-layout--hover"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <!-- Thương hiệu nổi bật -->

                    <!-- Sản phẩm bạn vừa xem -->

                    </div>
                </div>
            </div>
        </div>
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

<script src=" {{asset('Js/Client/handleUITabs.js')}}"></script>
<script src="{{asset('Js/Client/handleCardSlider.js')}}"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
></script>

</body>
</html>
