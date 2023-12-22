<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        href="https://myshoes.vn/image/catalog/logo/logo-myshoes-nho.png"
        rel="icon"
    />
    <title>Myshoes.vn - Giày Chính Hãng</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}" />
</head>
<body>
<div class="site-wrapper">
    <header class="header">
        <div class="header-wrapper">
            <div class="header-navbar">
                <div class="logo-wrapper">
                    <a href=" {{ route('user.home.index')}}">
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
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
                <div class="classic-wrapper">
                    <div class="accounts">
                        <a href="?controller=login&action=login" class="accounts-link">
                            <i class="fa-solid fa-user"></i>
                            <div class="links-text">
                                <span>Tài khoản</span>
                                <span>Đăng nhập/ Đăng ký</span>
                            </div>
                        </a>
                        <div class="dropdown-menu-accounts">
                  <span class="login"
                  ><i class="fa-solid fa-arrow-right-to-bracket"></i>Đăng
                    nhập</span
                  >
                            <span class="logout"
                            ><i
                                    class="fa-sharp fa-solid fa-arrow-right-from-bracket"
                                ></i
                                >Đăng ký</span
                            >
                        </div>
                    </div>
                    <div class="cart">
                        <a href="?redirect=cart" class="cart-link hvr-icon-grow">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                        <span class="quantity">!</span>
                        <div class="cart-empty">
                            <span>Không có sản phẩm trong giỏ hàng!</span>
                        </div>

                        <!-- <div class="cart-products">
                                        <div class="list-products-cart">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td class="td-img" scope="row">
                                                            <img src="https://myshoes.vn/image/cache/catalog/2023/lacoste/112/giay-lacoste-powercourt-1121-nam-den-01-60x60.jpg" alt="">
                                                        </td>
                                                        <td class="td-name hvr-grow">
                                                            <a>Giày Lacoste PowerCourt 1121 Nam - Đen</a>
                                                            <p>Chọn size nam: 39.5</p>
                                                        </td>
                                                        <td class="td-quantity">x1</td>
                                                        <td class="td-total">2.690.000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-img" scope="row">
                                                            <img src="https://myshoes.vn/image/cache/catalog/2023/lacoste/112/giay-lacoste-powercourt-1121-nam-den-01-60x60.jpg" alt="">
                                                        </td>
                                                        <td class="td-name hvr-grow">
                                                            <a>Giày Lacoste PowerCourt 1121 Nam - Đen</a>
                                                            <p>Chọn size nam: 39.5</p>
                                                        </td>
                                                        <td class="td-quantity">x1</td>
                                                        <td class="td-total">2.690.000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-img" scope="row">
                                                            <img src="https://myshoes.vn/image/cache/catalog/2023/lacoste/112/giay-lacoste-powercourt-1121-nam-den-01-60x60.jpg" alt="">
                                                        </td>
                                                        <td class="td-name hvr-grow">
                                                            <a>Giày Lacoste PowerCourt 1121 Nam - Đen</a>
                                                            <p>Chọn size nam: 39.5</p>
                                                        </td>
                                                        <td class="td-quantity">x1</td>
                                                        <td class="td-total">2.690.000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-img" scope="row">
                                                            <img src="https://myshoes.vn/image/cache/catalog/2023/lacoste/112/giay-lacoste-powercourt-1121-nam-den-01-60x60.jpg" alt="">
                                                        </td>
                                                        <td class="td-name hvr-grow">
                                                            <a>Giày Lacoste PowerCourt 1121 Nam - Đen</a>
                                                            <p>Chọn size nam: 39.5</p>
                                                        </td>
                                                        <td class="td-quantity">x1</td>
                                                        <td class="td-total">2.690.000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-img" scope="row">
                                                            <img src="https://myshoes.vn/image/cache/catalog/2023/lacoste/112/giay-lacoste-powercourt-1121-nam-den-01-60x60.jpg" alt="">
                                                        </td>
                                                        <td class="td-name hvr-grow">
                                                            <a>Giày Lacoste PowerCourt 1121 Nam - Đen</a>
                                                            <p>Chọn size nam: 39.5</p>
                                                        </td>
                                                        <td class="td-quantity">x1</td>
                                                        <td class="td-total">2.690.000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-img" scope="row">
                                                            <img src="https://myshoes.vn/image/cache/catalog/2023/lacoste/112/giay-lacoste-powercourt-1121-nam-den-01-60x60.jpg" alt="">
                                                        </td>
                                                        <td class="td-name hvr-grow">
                                                            <a>Giày Lacoste PowerCourt 1121 Nam - Đen</a>
                                                            <p>Chọn size nam: 39.5</p>
                                                        </td>
                                                        <td class="td-quantity">x1</td>
                                                        <td class="td-total">2.690.000₫</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="cart-totals">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td scope="row" style="width: 70%;">Thành tiền</td>
                                                        <td>11.150.000₫</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" style="width: 70%;">Tổng cộng</td>
                                                        <td>11.150.000₫</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="cart-buttons">
                                                <button type="button" class="btn btn-light"><a>XEM GIỎ HÀNG</a></button>
                                                <button type="button" class="btn btn-danger"><a>THANH TOÁN</a></button>
                                            </div>
                                        </div>
                                    </div> -->
                    </div>
                </div>
            </div>
            <div class="menu-wrapper">
                <div class="menu-default">
                    <ul class="main-menu">
                        <a href="{{ route('user.home.index')}}" class="item-link">
                            <span class="item-name">HOME</span>
                        </a>
                        @foreach ($type as $laptop)
                            @if ($laptop->id == 1)
                                <li class="menu-item hvr-float-shadow position-relative">
                                    <a href="{{ route('user.type.tp', ['id' => $laptop->id]) }}" class="item-link">
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
                                    <a href class="item-link">
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

            <div class="col-md-12">
                <div class="content">
                    <h1 class="page-title">Giày Chính Hãng</h1>
                    <div class="category-desc">
                        <img
                            src="https://myshoes.vn/image/cache/catalog/2022/banner/cata/giay-nike-chinh-hang-1140x500.png"
                            alt="Giày Adidas Chính Hãng"
                            title="Giày Adidas Chính Hãng"
                            class="category-image"
                        />
                    </div>
                    <div class="content-top">
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>Hàng chính hãng, chât lượng cao</span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa-solid fa-rotate"></i>
                                <span>Đổi hàng 30 ngày, thủ tục đơn giản</span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa-solid fa-truck"></i>
                                <span>Miễn phí giao hành với đơn > 500k</span>
                            </li>
                        </ul>
                    </div>

                    <div class="quick-link">
                        <div>
                            <a href="laptop-hp-compaq" data-href="laptop-hp-compaq" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-hp-149x40-1.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-asus" data-href="laptop-asus" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-asus-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-lenovo" data-href="laptop-lenovo" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-lenovo-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-acer" data-href="laptop-acer" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-acer-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-dell" data-href="laptop-dell" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-dell-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-msi" data-href="laptop-msi" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-msi-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-apple-macbook" data-href="laptop-apple-macbook" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-macbook-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-itel" data-href="laptop-itel" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-itel-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-gigabyte" data-href="laptop-gigabyte" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-gigabyte-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-surface" data-href="laptop-surface" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-surface-149x40-1.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-masstel" data-href="laptop-masstel" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/Masstel42-b0-200x48-1.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-lg" data-href="laptop-lg" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-lg-149x40.png" height="25" class="no-text">

                            </a>
                            <a href="laptop-singpc" data-href="laptop-singpc" data-index="0" class="box-quicklink__item bd-radius quicklink-logo">
                                <img src="//cdn.tgdd.vn/Brand/1/logo-singpc-149x40-1.jpg" height="25" class="no-text">

                            </a>
                        </div>

                    </div>
                    {{--                    <div class="main-products-wrapper">--}}
                    {{--                        <div class="products-filter">--}}
                    {{--                            <div class="select-group">--}}
                    {{--                                <div class="sort-by">--}}
                    {{--                                    <label for="input-sort">Sắp xếp theo:</label>--}}
                    {{--                                    <select id="input-sort">--}}
                    {{--                                        <option value>Mặc định</option>--}}
                    {{--                                        <option value>Tên (A - Z)</option>--}}
                    {{--                                        <option value>Tên (Z - A)</option>--}}
                    {{--                                        <option value>Giá (Thấp &gt; Cao)</option>--}}
                    {{--                                        <option value>Giá (Cao &gt; Thấp)</option>--}}
                    {{--                                        <option value>Đánh giá (Cao nhất)</option>--}}
                    {{--                                        <option value>Đánh giá (Thấp nhất)</option>--}}
                    {{--                                        <option value>Kiểu (A - Z)</option>--}}
                    {{--                                        <option value>Kiểu (Z - A)</option>--}}
                    {{--                                    </select>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    <!-- Product -->
                    <div class="main-products">
                        <div class="row g-0">
                            @foreach ($version as $products)
                                <div class="col-2-4">
                                    <div class="product-layout">
                                        <a href class="product-image">
                                            <a href="{{ route('user.productDetail.detail', ['id' => $products->id]) }}" class="product-image">
                                                <img
                                                    src="{{ asset(Storage::url('public/admin/'. $products->image)) }}"
                                                    width="100%"
                                                    height="238.387"
                                                    alt=""
                                                    title=""
                                                />
                                            </a>
                                        </a>
                                        <div class="product-caption">
                                            <div class="brand">
                                                <a href class="brand-title">{{ $products->Brand_name }}</a>
                                            </div>
                                            <div class="name">
                                                <a href="#">{{ $products->Version_name }}</a>
                                            </div>
                                            <div class="price">
                                                <span class="price-new">{{ number_format($products->price, 0, ',', '.') }}₫</span>
                                            </div>
                                        </div>
                                        <div class="tag">
                                            <span class="tag-new">New</span>
                                            <span class="tag-discount"></span>
                                        </div>
                                        <div class="product-layout--hover"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="pagination-results"></div>
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

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
></script>
</body>
</html>
