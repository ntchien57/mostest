@extends($theme . '.shop_layout', ['title' => $product->name, 'header' => ['description' => $description, 'keyword' => $keyword, 'og_image' => $og_image]])
@push('style')
    <link href="{{ asset('css/guest/product/detail.css') }}" rel="stylesheet" type="text/css" />
    <link href='{{ asset('theme/200000292324/1001022916/14/slick.scss.css?v=11') }}' rel='stylesheet' type='text/css'
        media='all'>
@endpush
@section('content')
    <div class="page-title shop-page-title product-page-title">
        <div class="page-title-inner flex-row medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
                <div class="is-medium">
                    <nav class="woocommerce-breadcrumb breadcrumbs"><a href="{{ url('/') }}">Trang chủ</a> <span
                            class="divider">&#47;</span> <a
                            href="{{ url('shop/' . ktc_str_convert($product->category->name) . '_' . $product->category->id . '.html') }}">{{ $product->category->name }}</a>
                        <span class="divider">&#47;</span> <a>{{ $product->name }}</a>
                    </nav>
                </div>
            </div>
            <!-- .flex-left -->

            <div class="flex-col medium-text-center">
            </div>
            <!-- .flex-right -->
        </div>
        <!-- flex-row -->
    </div>
    <!-- .page-title -->

    <main id="main" class="">

        <div class="shop-container">

            <div class="container">
            </div>
            <!-- /.container -->
            <div id="product-1226"
                class="post-1226 product type-product status-publish has-post-thumbnail product_cat-am-chen-bat-trang product_cat-bo-am-chen-men-kem first instock shipping-taxable purchasable product-type-simple">
                <div class="row content-row row-divided row-large">

                    <div class="col large-9">
                        <div class="product-main">
                            <div class="row">
                                <div class="large-5 col">

                                    <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                        data-columns="4">

                                        <div class="badge-container is-larger absolute left top z-1">
                                        </div>
                                        <div class="image-tools absolute top show-on-hover right z-3">
                                        </div>

                                        <figure
                                            class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half"
                                            data-flickity-options='{
        "cellAlign": "center",
        "wrapAround": true,
        "autoPlay": false,
        "prevNextButtons":true,
        "adaptiveHeight": true,
        "imagesLoaded": true,
        "lazyLoad": 1,
        "dragThreshold" : 15,
        "pageDots": false,
        "rightToLeft": false       }'>
                                            <div data-thumb="{{ asset('documents/website/' . $product->image) }}"
                                                class="woocommerce-product-gallery__image slide first">
                                                <a><img width="400" height="482"
                                                        src="{{ asset('documents/website/' . $product->image) }}"
                                                        class="wp-post-image" alt=""
                                                        title="am-chen-men-kem-vuong-bac-135" data-caption=""
                                                        data-src="{{ asset('documents/website/' . $product->image) }}"
                                                        data-large_image="{{ asset('documents/website/' . $product->image) }}"
                                                        data-large_image_width="400" data-large_image_height="482"
                                                        srcset="{{ asset('documents/website/' . $product->image) }} 400w, {{ asset('documents/website/' . $product->image) }} 249w"
                                                        sizes="(max-width: 400px) 100vw, 400px"></a>
                                            </div>

                                            @if (count($product->images) > 0)
                                                @foreach ($product->images as $item)
                                                    <div data-thumb="{{ asset('documents/website/' . $item->image) }}"
                                                        class="woocommerce-product-gallery__image slide first">
                                                        <a><img width="400" height="482"
                                                                src="{{ asset('documents/website/' . $item->image) }}"
                                                                class="wp-post-image" alt=""
                                                                title="am-chen-men-kem-vuong-bac-135" data-caption=""
                                                                data-src="{{ asset('documents/website/' . $item->image) }}"
                                                                data-large_image="{{ asset('documents/website/' . $item->image) }}"
                                                                data-large_image_width="400" data-large_image_height="482"
                                                                srcset="{{ asset('documents/website/' . $item->image) }} 400w, {{ asset('documents/website/' . $item->image) }} 249w"
                                                                sizes="(max-width: 400px) 100vw, 400px"></a>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </figure>

                                        {{-- <div class="image-tools absolute bottom left z-3">
                                        <a href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small" title="Zoom">
                                            <i class="icon-expand"></i> </a>
                                    </div> --}}
                                    </div>


                                    <div class="product-thumbnails thumbnails slider-no-arrows slider row row-small row-slider slider-nav-small small-columns-4"
                                        data-flickity-options='{
      "cellAlign": "left",
      "wrapAround": false,
      "autoPlay": false,
      "prevNextButtons":true,
      "asNavFor": ".product-gallery-slider",
      "percentPosition": true,
      "imagesLoaded": true,
      "pageDots": false,
      "rightToLeft": false,
      "contain": true
  }'>
                                        <div class="col is-nav-selected first">
                                            <a>
                                                <img src="{{ asset('documents/website/' . $product->image) }}"
                                                    width="300" height="300" class="attachment-woocommerce_thumbnail">
                                            </a>
                                        </div>

                                        @if (count($product->images) > 0)
                                            @foreach ($product->images as $item)
                                                <div class="col">
                                                    <a>
                                                        <img src="{{ asset('documents/website/' . $item->image) }}"
                                                            width="300" height="300"
                                                            class="attachment-woocommerce_thumbnail"> </a>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <!-- .product-thumbnails -->

                                </div>


                                <div class="product-info summary entry-summary col col-fit product-summary">
                                    <h1 class="product-title entry-title" style="margin-bottom:0">
                                        {{ $product->name }}</h1>
                                    <div style="display:flex">
                                        <p>
                                            <i style="color:rgb(218, 181, 32)" class="icon-star"></i>
                                            <i style="color:rgb(218, 181, 32)" class="icon-star"></i>
                                            <i style="color:rgb(218, 181, 32)" class="icon-star"></i>
                                            <i style="color:rgb(218, 181, 32)" class="icon-star"></i>
                                            <i style="color:rgb(218, 181, 32)" class="icon-star"></i>
                                            (Viết đánh giá)&nbsp; | Tình trạng: <span style="color: rgb(45, 192, 152)">sẵn
                                                hàng</span> &nbsp; | Lượt xem: <span
                                                style="color: rgb(45, 192, 152)">100.000</span>
                                        </p>
                                    </div>

                                    <p style="font-weight:bold; margin-bottom: 7px; color:#000">Mã sản phẩm:
                                        &nbsp;&nbsp;&nbsp; {{ $product->product_code }}</p>
                                    <p style="font-weight:bold; margin-bottom: 7px; color:#000">Số lượng:
                                        &nbsp;&nbsp;&nbsp; {{ $product->quantity }}</p>

                                    {{-- <p><span style="font-weight:bold; border:none; color:#000">Chất liệu:</span><span style="padding-left:50px">{{ $product->material }}</span>   </p>

                                <p><span style="font-weight:bold; border:none; color:#000">  Họa tiết:</span><span style="padding-left:50px">{{ $product->pattern }}</span>   </p>

                                <p><span style="font-weight:bold; border:none; color:#000">Ghi chú:</span><span style="padding-left:50px">{{ $product->product_note }}</span>   </p> --}}


                                    <p style="font-weight:bold; margin-bottom: 7px; color:#000">Giá bán: &nbsp;&nbsp;&nbsp;

                                        @if ($product->flash_price > 0)
                                        <span style="font-size: 20px"
                                            class="woocommerce-Price-amount amount">{{ number_format($product->flash_price, 0, 0, '.') }}<span
                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                    @elseif ($product->price > 0)
                                            <span style="font-size: 20px"
                                                class="woocommerce-Price-amount amount">{{ number_format($product->price, 0, 0, '.') }}<span
                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                        @else
                                            <span class="woocommerce-Price-amount amount">Liên hệ</span>
                                        @endif
                                    </p>


                                    <div class="product-short-description">
                                        <p>{!! $product->description !!}</p>
                                    </div>
                                    {{-- <div class="note-san-pham"><span style="color: red; font-weight: bold">Chính sách bán hàng:</span><br> - Giao hàng toàn quốc, khách hàng thanh toán tiền vận chuyển<br> - Được kiểm tra sản phẩm khi nhận hàng.<br> - Thanh toán khi nhận hàng.<br>                                            - Nhận hàng từ 3-6 ngày (đối với đơn hàng lớn</div> --}}
                                    {{-- <p class="stock in-stock">Còn hàng</p> --}}


                                    <form class="cart" method="post" enctype='multipart/form-data'>
                                        <div class="quantity buttons_added">
                                            <input type="button" value="-" class="minus button is-form"> <label
                                                class="screen-reader-text" for="quantity_64535ec7072f5">Số lượng</label>
                                            <input type="number" id="quantity" class="input-text qty text"
                                                step="1" min="1" max="9999" name="quantity"
                                                value="1" title="SL" size="4" pattern="[0-9]*"
                                                inputmode="numeric" aria-labelledby="">
                                            <input type="button" value="+" class="plus button is-form">
                                        </div>

                                        <button type="button" onclick="buyNow({{ $product->id }})" value="1226"
                                            class="single_add_to_cart_button button alt">Mua hàng</button>

                                    </form>


                                    <div class="product_meta">


                                        <span class="posted_in">Danh mục: <a
                                                href="{{ url('shop/' . ktc_str_convert($product->category->name) . '_' . $product->category->id . '.html') }}"
                                                rel="tag">{{ $product->category->name }}</a></span>


                                    </div>


                                </div>
                                <!-- .summary -->
                            </div>
                            <!-- .row -->
                        </div>
                        <!-- .product-main -->
                        <div class="product-footer">

                            <div class="woocommerce-tabs container tabbed-content">
                                <ul class="product-tabs  nav small-nav-collapse tabs nav nav-uppercase nav-line nav-left">
                                    <li class="description_tab  active">
                                        <a href="#tab-description">Mô tả</a>
                                    </li>

                                </ul>
                                <div class="tab-panels">

                                    <div class="panel entry-content active" id="tab-description">


                                        <p>{!! $product->content !!}</p>
                                    </div>





                                </div>
                                <!-- .tab-panels -->
                            </div>
                            <!-- .tabbed-content -->


                            <div class="related related-products-wrapper product-section">

                                <h3
                                    class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
                                    Sản phẩm tương tự </h3>



                                <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>


                                    @if (count($products_other) > 0)
                                        @foreach ($products_other as $item)
                                            <div
                                                class="product-small col has-hover post-1230 product type-product status-publish has-post-thumbnail product_cat-am-chen-bat-trang product_cat-bo-am-chen-men-kem  instock shipping-taxable purchasable product-type-simple">
                                                <div class="col-inner">

                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box ">
                                                        <div class="box-image">
                                                            <div class="image-none">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="300" height="300"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                                                        alt=""
                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 300w, {{ asset('documents/website/' . $item->image) }} 150w, {{ asset('documents/website/' . $item->image) }} 180w, {{ asset('documents/website/' . $item->image) }} 600w"
                                                                        sizes="(max-width: 300px) 100vw, 300px"> </a>
                                                            </div>
                                                            <div class="image-tools is-small top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->

                                                        <div class="box-text box-text-products text-center grid-style-2">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                @if ($item->flash_price > 0)
                                                                    <span class="price"><span
                                                                            class="woocommerce-Price-amount amount">{{ number_format($item->flash_price, 0, 0, '.') }}<span
                                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                    </span>
                                                                @elseif($item->price > 0)
                                                                    <span class="price"><span
                                                                            class="woocommerce-Price-amount amount">{{ number_format($item->price, 0, 0, '.') }}<span
                                                                                class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                    </span>
                                                                @else
                                                                    <span class="price"><span
                                                                            class="woocommerce-Price-amount amount">Liên
                                                                            hệ</span>
                                                                    </span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                        @endforeach
                                    @else
                                        <h4>Sản phẩm đang cập nhật</h4>
                                    @endif




                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- col large-9 -->

                    <div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar ">

                        <aside id="custom_html-2" class="widget_text widget widget_custom_html">
                            <div class="textwidget custom-html-widget">Gọi ngay <b><a
                                        href="tel:{{ $configs['site_phone'] }}">{{ $configs['site_phone'] }}</a></b> để
                                đặt hàng ngay và nhận hàng miễn phí sau 2-3 ngày.</div>
                        </aside>
                        <aside id="woocommerce_products-2" class="widget woocommerce widget_products"><span
                                class="widget-title shop-sidebar">Sản phẩm mới nhất</span>
                            <div class="is-divider small"></div>
                            <ul class="product_list_widget">

                                @foreach ($products_new as $item)
                                    <li>
                                        <a
                                            href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                            <img width="180" height="180"
                                                src="{{ asset('documents/website/' . $item->image) }}"
                                                class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                alt=""
                                                srcset="{{ asset('documents/website/' . $item->image) }} 180w, {{ asset('documents/website/' . $item->image) }} 150w, {{ asset('documents/website/' . $item->image) }} 300w, {{ asset('documents/website/' . $item->image) }} 600w"
                                                sizes="(max-width: 180px) 100vw, 180px"> <span
                                                class="product-title">{{ $item->name }}</span>
                                        </a>

                                        @if ($item->flash_price > 0)
                                            <span
                                                class="woocommerce-Price-amount amount">{{ number_format($item->flash_price, 0, 0, '.') }}<span
                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                        @elseif($item->price > 0)
                                            <span
                                                class="woocommerce-Price-amount amount">{{ number_format($item->price, 0, 0, '.') }}<span
                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                        @else
                                            <span class="woocommerce-Price-amount amount">Liên hệ</span>
                                        @endif

                                    </li>
                                @endforeach


                            </ul>
                        </aside>
                    </div>
                    <!-- col large-3 -->

                </div>
                <!-- .row -->
            </div>


        </div>
        <!-- shop container -->

    </main>

    <script>
        document.body.classList.remove('home');
    </script>

@endsection

@push('scripts')
    <script src='{{ asset('theme/200000292324/1001022916/14/slick.min.js?v=11') }}' type='text/javascript'></script>

    <script>
        $(function() {
            $(".product-quantity button").on("click", function() {
                var $button = $(this);
                var $parent = $button.parent();
                var oldValue = $("#product-quantity-input").val();

                if ($button.attr('value') == "+") {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    // Don't allow decrementing below zero
                    if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 1;
                    }
                }
                // $parent.find('a.add-to-cart').attr('data-quantity', newVal);
                $("#product-quantity-input").val(newVal);
            });
        });
    </script>

    <script>
        $('.tabs-stage > div').hide();
        $('.tabs-stage div:first').show();
        $('.tabs-nav li:first').addClass('tab-active');

        // Change tab class and display content
        $('.tabs-nav a').on('click', function(event) {
            event.preventDefault();
            $('.tabs-nav li').removeClass('tab-active');
            $(this).parent().addClass('tab-active');
            $('.tabs-stage > div').hide();
            $($(this).attr('href')).show();
        });
    </script>

    <script>
        var product = {
            "available": true,
            "compare_at_price_max": 34000000.0,
            "compare_at_price_min": 34000000.0,
            "compare_at_price_varies": false,
            "compare_at_price": 34000000.0,
            "content": null,
            "description": null,
            "featured_image": "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear_e0547ca4f16f49fc9861b82c61b83ca6.png",
            "handle": "gel-tay-te-bao-chet-detclear-bright-peel-180ml-nhat-ban",
            "id": 1041063808,
            "images": [
                "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear_e0547ca4f16f49fc9861b82c61b83ca6.png",
                "https://product.hstatic.net/200000292324/product/tay-te-bao-chet-dang-gel-meishoku-khong-mui-180ml-xanh_ce7e6f3256974c5f95e23be61525fcb9.jpg",
                "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-huong-dau-berry-180ml_bcb9d97c245f4d8d9dea0c57db8d69d3.jpg",
                "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-mau-vang-huong-trai-cay_5894e2331b4342b99aaed3b778bb57c8.jpg"
            ],
            "options": ["Màu sắc"],
            "price": 23500000.0,
            "price_max": 23500000.0,
            "price_min": 23500000.0,
            "price_varies": false,
            "tags": ["Nhật", "daban_37"],
            "template_suffix": null,
            "title": "Gel tẩy tế bào chết Detclear Bright & Peel 180ml Nhật Bản",
            "type": "Kem/ gel",
            "url": "/products/gel-tay-te-bao-chet-detclear-bright-peel-180ml-nhat-ban",
            "pagetitle": "Gel tẩy tế bào chết Detclear Bright & Peel 180ml Nhật Bản (3 màu)",
            "metadescription": "Mua gel tẩy tế bào chết Detclear Bright & Peel 180ml Nhật Bản đủ 3 màu. Chính hãng, giá tốt nhất. Màu xanh không mùi, màu vàng hương trái cây, màu hồng hương dâu Berry.",
            "variants": [{
                "id": 1089570570,
                "barcode": null,
                "available": true,
                "price": 23500000.0,
                "sku": null,
                "option1": "Xanh không mùi",
                "option2": "",
                "option3": "",
                "options": ["Xanh không mùi"],
                "inventory_quantity": 1.0,
                "old_inventory_quantity": 1.0,
                "title": "Xanh không mùi",
                "weight": 0.0,
                "compare_at_price": 34000000.0,
                "inventory_management": null,
                "inventory_policy": "deny",
                "selected": false,
                "url": null,
                "featured_image": {
                    "id": 1263126923,
                    "created_at": "0001-01-01T00:00:00",
                    "position": 2,
                    "product_id": 1041063808,
                    "updated_at": "0001-01-01T00:00:00",
                    "src": "https://product.hstatic.net/200000292324/product/tay-te-bao-chet-dang-gel-meishoku-khong-mui-180ml-xanh_ce7e6f3256974c5f95e23be61525fcb9.jpg",
                    "variant_ids": [1089570570]
                }
            }, {
                "id": 1089570602,
                "barcode": null,
                "available": true,
                "price": 23500000.0,
                "sku": null,
                "option1": "Vàng hương trái cây",
                "option2": "",
                "option3": "",
                "options": ["Vàng hương trái cây"],
                "inventory_quantity": 1.0,
                "old_inventory_quantity": 1.0,
                "title": "Vàng hương trái cây",
                "weight": 0.0,
                "compare_at_price": 34000000.0,
                "inventory_management": null,
                "inventory_policy": "deny",
                "selected": false,
                "url": null,
                "featured_image": {
                    "id": 1263127971,
                    "created_at": "0001-01-01T00:00:00",
                    "position": 4,
                    "product_id": 1041063808,
                    "updated_at": "0001-01-01T00:00:00",
                    "src": "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-mau-vang-huong-trai-cay_5894e2331b4342b99aaed3b778bb57c8.jpg",
                    "variant_ids": [1089570602]
                }
            }, {
                "id": 1089570605,
                "barcode": null,
                "available": true,
                "price": 23500000.0,
                "sku": null,
                "option1": "Hồng hương berry",
                "option2": "",
                "option3": "",
                "options": ["Hồng hương berry"],
                "inventory_quantity": 1.0,
                "old_inventory_quantity": 1.0,
                "title": "Hồng hương berry",
                "weight": 0.0,
                "compare_at_price": 34000000.0,
                "inventory_management": null,
                "inventory_policy": "deny",
                "selected": false,
                "url": null,
                "featured_image": {
                    "id": 1263127696,
                    "created_at": "0001-01-01T00:00:00",
                    "position": 3,
                    "product_id": 1041063808,
                    "updated_at": "0001-01-01T00:00:00",
                    "src": "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-huong-dau-berry-180ml_bcb9d97c245f4d8d9dea0c57db8d69d3.jpg",
                    "variant_ids": [1089570605]
                }
            }],
            "vendor": "MEISHOKU",
            "published_at": "2022-07-29T09:32:03.79Z",
            "created_at": "2022-07-29T09:33:55.419Z",
            "not_allow_promotion": false
        };
        var selectCallback = function(variant, selector) {
            if (variant.available) {
                $('#pro-stock-tt').html('Còn hàng');
                $('.btn-soldout').hide();
            } else {
                $('#pro-stock-tt').html('Tạm hết hàng');
                $('.btn-soldout').show();
            }
            if (variant && variant.available) {

                if (variant.featured_image != null) {
                    var zong = Haravan.resizeImage(variant.featured_image.src, 'small').replace("https:", '');
                    var lar = $(".pd_slide_thumb img[src='" + zong + "']").parent().parent().trigger('click');
                }

                $('.product-image-feature').hide();
                $('.lazy-product-featured').show();
                //$(".product-thumb").children('a.zoomGalleryActive').removeClass('zoomGalleryActive');
                if (variant != null && variant.featured_image != null) {
                    $(".product-thumb a[data-image='" + Haravan.resizeImage(variant.featured_image.src, '1024x1024') +
                        "']").click();
                }
                $('.lazy-product-featured').hide();
                $('.product-image-feature').show();
                if (variant.sku != null) {
                    jQuery('.sku-number').html(variant.sku);
                }
                jQuery('.addnow').removeAttr('disabled');
                jQuery('.btn-soldout').hide();
                if (variant.price < variant.compare_at_price) {
                    jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, "") + "</span><del>" +
                        Haravan.formatMoney(variant.compare_at_price, "") + "</del>");
                    var pro_price_save = Haravan.formatMoney(variant.compare_at_price - variant.price, "");
                    var pro_sold = variant.price;
                    var pro_comp = variant.compare_at_price / 100;
                    var sale = 100 - (pro_sold / pro_comp);
                    var kq_sale = Math.round(sale);
                    jQuery('#surround .product-sale span').html("<label class='sale-lb'>Sale</label> " + kq_sale + '%');
                    $(".product-percent").show();
                    jQuery('.product-percent .percent').html(kq_sale);
                    jQuery('.product-percent .save').html(pro_price_save);
                } else {
                    $(".product-percent").hide();
                    if (variant.price == 0) {
                        jQuery('#price-preview').html("<span style='font-size:16px;'>Liên hệ</span>");
                    } else {
                        jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, " " + "</span>"));
                    }
                }
            } else {
                //
                if (variant.price < variant.compare_at_price) {
                    jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, " ") + "</span><del>" +
                        Haravan.formatMoney(variant.compare_at_price, " ") + "</del>");
                    var pro_price_save = Haravan.formatMoney(variant.compare_at_price - variant.price, " ");
                    var pro_sold = variant.price;
                    var pro_comp = variant.compare_at_price / 100;
                    var sale = 100 - (pro_sold / pro_comp);
                    var kq_sale = Math.round(sale);
                    jQuery('#surround .product-sale span').html("<label class='sale-lb'>Sale</label> " + kq_sale + '%');
                    $(".product-percent").show();
                    jQuery('.product-percent .percent').html(kq_sale);
                    jQuery('.product-percent .save').html(pro_price_save);
                } else {
                    $(".product-percent").hide();
                    if (variant.price == 0) {
                        jQuery('#price-preview').html("<span style='font-size:16px;'>Liên hệ</span>");
                    } else {
                        jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, " " + "</span>"));
                    }
                }
                //


                if (variant.sku != null) {
                    jQuery('.sku-number').html(variant.sku);
                }
                jQuery('.addnow').attr('disabled', 'disabled');
                jQuery('.btn-soldout').show();

                var message = variant ? "Tạm hết hàng" : "Không có hàng";
                jQuery('#price-preview').html("<span>" + Haravan.formatMoney(variant.price, " " + "</span>"));
                $('.lazy-product-featured').hide();
                $('.product-image-feature').show();
            }
        };
        jQuery(document).ready(function($) {

            new Haravan.OptionSelectors("product-select", {
                product: {
                    "available": true,
                    "compare_at_price_max": 34000000.0,
                    "compare_at_price_min": 34000000.0,
                    "compare_at_price_varies": false,
                    "compare_at_price": 34000000.0,
                    "content": null,
                    "description": null,
                    "featured_image": "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear_e0547ca4f16f49fc9861b82c61b83ca6.png",
                    "handle": "gel-tay-te-bao-chet-detclear-bright-peel-180ml-nhat-ban",
                    "id": 1041063808,
                    "images": [
                        "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear_e0547ca4f16f49fc9861b82c61b83ca6.png",
                        "https://product.hstatic.net/200000292324/product/tay-te-bao-chet-dang-gel-meishoku-khong-mui-180ml-xanh_ce7e6f3256974c5f95e23be61525fcb9.jpg",
                        "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-huong-dau-berry-180ml_bcb9d97c245f4d8d9dea0c57db8d69d3.jpg",
                        "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-mau-vang-huong-trai-cay_5894e2331b4342b99aaed3b778bb57c8.jpg"
                    ],
                    "options": ["Màu sắc"],
                    "price": 23500000.0,
                    "price_max": 23500000.0,
                    "price_min": 23500000.0,
                    "price_varies": false,
                    "tags": ["Nhật", "daban_37"],
                    "template_suffix": null,
                    "title": "Gel tẩy tế bào chết Detclear Bright & Peel 180ml Nhật Bản",
                    "type": "Kem/ gel",
                    "url": "/products/gel-tay-te-bao-chet-detclear-bright-peel-180ml-nhat-ban",
                    "pagetitle": "Gel tẩy tế bào chết Detclear Bright & Peel 180ml Nhật Bản (3 màu)",
                    "metadescription": "Mua gel tẩy tế bào chết Detclear Bright & Peel 180ml Nhật Bản đủ 3 màu. Chính hãng, giá tốt nhất. Màu xanh không mùi, màu vàng hương trái cây, màu hồng hương dâu Berry.",
                    "variants": [{
                        "id": 1089570570,
                        "barcode": null,
                        "available": true,
                        "price": 23500000.0,
                        "sku": null,
                        "option1": "Xanh không mùi",
                        "option2": "",
                        "option3": "",
                        "options": ["Xanh không mùi"],
                        "inventory_quantity": 1.0,
                        "old_inventory_quantity": 1.0,
                        "title": "Xanh không mùi",
                        "weight": 0.0,
                        "compare_at_price": 34000000.0,
                        "inventory_management": null,
                        "inventory_policy": "deny",
                        "selected": false,
                        "url": null,
                        "featured_image": {
                            "id": 1263126923,
                            "created_at": "0001-01-01T00:00:00",
                            "position": 2,
                            "product_id": 1041063808,
                            "updated_at": "0001-01-01T00:00:00",
                            "src": "https://product.hstatic.net/200000292324/product/tay-te-bao-chet-dang-gel-meishoku-khong-mui-180ml-xanh_ce7e6f3256974c5f95e23be61525fcb9.jpg",
                            "variant_ids": [1089570570]
                        }
                    }, {
                        "id": 1089570602,
                        "barcode": null,
                        "available": true,
                        "price": 23500000.0,
                        "sku": null,
                        "option1": "Vàng hương trái cây",
                        "option2": "",
                        "option3": "",
                        "options": ["Vàng hương trái cây"],
                        "inventory_quantity": 1.0,
                        "old_inventory_quantity": 1.0,
                        "title": "Vàng hương trái cây",
                        "weight": 0.0,
                        "compare_at_price": 34000000.0,
                        "inventory_management": null,
                        "inventory_policy": "deny",
                        "selected": false,
                        "url": null,
                        "featured_image": {
                            "id": 1263127971,
                            "created_at": "0001-01-01T00:00:00",
                            "position": 4,
                            "product_id": 1041063808,
                            "updated_at": "0001-01-01T00:00:00",
                            "src": "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-mau-vang-huong-trai-cay_5894e2331b4342b99aaed3b778bb57c8.jpg",
                            "variant_ids": [1089570602]
                        }
                    }, {
                        "id": 1089570605,
                        "barcode": null,
                        "available": true,
                        "price": 23500000.0,
                        "sku": null,
                        "option1": "Hồng hương berry",
                        "option2": "",
                        "option3": "",
                        "options": ["Hồng hương berry"],
                        "inventory_quantity": 1.0,
                        "old_inventory_quantity": 1.0,
                        "title": "Hồng hương berry",
                        "weight": 0.0,
                        "compare_at_price": 34000000.0,
                        "inventory_management": null,
                        "inventory_policy": "deny",
                        "selected": false,
                        "url": null,
                        "featured_image": {
                            "id": 1263127696,
                            "created_at": "0001-01-01T00:00:00",
                            "position": 3,
                            "product_id": 1041063808,
                            "updated_at": "0001-01-01T00:00:00",
                            "src": "https://product.hstatic.net/200000292324/product/tay-da-chet-detclear-huong-dau-berry-180ml_bcb9d97c245f4d8d9dea0c57db8d69d3.jpg",
                            "variant_ids": [1089570605]
                        }
                    }],
                    "vendor": "MEISHOKU",
                    "published_at": "2022-07-29T09:32:03.79Z",
                    "created_at": "2022-07-29T09:33:55.419Z",
                    "not_allow_promotion": false
                },
                onVariantSelected: selectCallback,
                enableHistoryState: true
            });
            // Add label if only one product option and it isn't 'Title'.

            $('.selector-wrapper:eq(0):not(.opt1):not(.opt2):not(.opt3)').prepend('<label>Màu sắc</label>');

            // Auto-select first available variant on page load.





            $('.single-option-selector:eq(0)').val("Xanh không mùi").trigger('change');







            $('.selector-wrapper select').each(function() {
                $(this).wrap('<span class="custom-dropdown custom-dropdown-white"></span>');
                $(this).addClass("custom-dropdown-select custom-dropdown-white-select");
            });

            // Xữ lý render variant
            if ($('#add-item-form select[data-option=option1] option').length > 0) {
                var checked = $('select[data-option=option1]').val();
                $('select[data-option=option1] option').each(function() {
                    var arr_opt = '';
                    var opt_select_1 = $(this).val();
                    $.each(product.variants, function(i, v) {
                        var opt1 = v.option1;
                        //if(opt_select_1 == opt1 && v.available ){			
                        if (opt_select_1 == opt1 && v.available) {
                            arr_opt = arr_opt + ' ' + slug(v.option1);
                        }
                    });
                    if (arr_opt == '') {
                        arr_opt = 'soldout';
                    }
                    if ($(this).val() == checked) {
                        $('.data-opt1').append("<li class='" + arr_opt +
                            "'><label><input checked='checked' type='radio' value='" + $(this).val() +
                            "' name='option1'><span>" + $(this).val() +
                            "</span><img class='soldc' src='//theme.hstatic.net/200000292324/1001022916/14/soldout.png?v=11' alt='icon'/></label></li>"
                        );
                    } else {
                        $('.data-opt1').append("<li class='" + arr_opt +
                            "'><label><input type='radio' value='" + $(this).val() +
                            "' name='option1'><span>" + $(this).val() +
                            "</span><img class='soldc' src='//theme.hstatic.net/200000292324/1001022916/14/soldout.png?v=11' alt='icon'/></label></li>"
                        );
                    }
                });
            }
            if ($('#add-item-form select[data-option=option2] option').length > 0) {
                var checked = $('select[data-option=option2]').val();
                $('select[data-option=option2] option').each(function() {
                    var arr_opt = '';
                    var opt_select_2 = $(this).val();
                    $.each(product.variants, function(i, v) {
                        var opt2 = v.option2;
                        if (opt_select_2 == opt2 && v.available) {
                            arr_opt = arr_opt + ' ' + slug(v.option1);
                        }
                    });
                    if ($(this).val() == checked) {
                        $('.data-opt2').append("<li class='" + arr_opt +
                            "'><label><input checked='checked' type='radio' value='" + $(this).val() +
                            "' name='option2'><span>" + $(this).val() + "</span></label></li>");
                    } else {
                        $('.data-opt2').append("<li class='" + arr_opt +
                            "'><label><input type='radio' value='" + $(this).val() +
                            "' name='option2'><span>" + $(this).val() + "</span></label></li>");
                    }
                });
            }
            if ($('#add-item-form select[data-option=option3] option').length > 0) {
                var checked = $('select[data-option=option3]').val();
                $('select[data-option=option3] option').each(function() {
                    var arr_opt = '';
                    var opt_select_3 = $(this).val();
                    $.each(product.variants, function(i, v) {
                        var opt3 = v.option3;
                        if (opt_select_3 == opt3 && v.available) {
                            arr_opt = arr_opt + ' ' + slug(v.option1 + '-' + v.option2);
                        }
                    });
                    if ($(this).val() == checked) {
                        $('.data-opt3').append("<li class='" + arr_opt +
                            "'><label><input checked='checked' type='radio' value='" + $(this).val() +
                            "' name='option3'><span>" + $(this).val() + "</span></label></li>");
                    } else {
                        $('.data-opt3').append("<li class='" + arr_opt +
                            "'><label><input type='radio' value='" + $(this).val() +
                            "' name='option3'><span>" + $(this).val() + "</span></label></li>");
                    }
                });
            }
            jQuery(document).on('click', '#add-item-form ul.data-opt1 li', function() {
                var v_opt1 = jQuery(this).find('span').html();
                jQuery('#add-item-form select[data-option=option1]').val(v_opt1).change();
                if (jQuery('#add-item-form ul.data-opt2 li:visible').length > 0) {
                    jQuery('#add-item-form ul.data-opt2 li').hide();
                    jQuery('#add-item-form ul.data-opt2 li.' + slug(v_opt1)).show();
                    jQuery('#add-item-form ul.data-opt2 li:visible label')[0].click();
                }
            });
            jQuery(document).on('click', '#add-item-form ul.data-opt2 li', function() {
                var v_opt1 = slug(jQuery('#add-item-form select[data-option=option1]').val());
                var v_opt2 = jQuery(this).find('span').html();
                var both_v_opt = v_opt1 + '-' + slug(v_opt2);
                jQuery('#add-item-form select[data-option=option2]').val(v_opt2).change();
                if (jQuery('#add-item-form ul.data-opt3 li:visible').length > 0) {
                    jQuery('#add-item-form ul.data-opt3 li').hide();
                    jQuery('#add-item-form ul.data-opt3 li.' + both_v_opt).show();
                    jQuery('#add-item-form ul.data-opt3 li:visible label')[0].click();
                }
            });
            jQuery(document).on('click', '#add-item-form ul.data-opt3 li', function() {
                var v_opt3 = $(this).find('span').html();
                jQuery('#add-item-form select[data-option=option3]').val(v_opt3).change();
            });
            if (jQuery('#add-item-form ul.data-opt1 li:visible label').length > 0) {
                jQuery('#add-item-form ul.data-opt1 li:visible label').first().click();
            } else {
                $('#add-item-form select').change();
            }
            $('.addnow').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    async: false,
                    url: '/cart/add.js',
                    async: false,
                    data: $('form#add-item-form').serialize(),
                    success: function(line) {
                        window.location = "/cart";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Sản phẩm bạn vừa mua đã hết');
                    }
                });
            });
        });
        setTimeout(function() {
            if ($(".product-thumb-vertical").length > 0 && $(window).width() >= 1200) {
                jQuery(".product-image-feature").elevateZoom({
                    gallery: 'sliderproduct',
                    scrollZoom: true
                });
            }
            if ($(".product-thumb-vertical").length > 0 && $(window).width() < 1200) {
                jQuery(".product-image-feature").elevateZoom({
                    gallery: 'sliderproduct',
                    zoomEnabled: false
                });
            }
        }, 500);
    </script>

    <script>
        $(document).ready(function() {
            if ($(window).width() > 1200) {
                setTimeout(function() {
                    $('.zoomContainer').remove();
                    $('.pd_slide .slick-active img').elevateZoom({
                        gallery: 'pd_slide',
                        zoomWindowOffetx: 10,
                        easing: true,
                        scrollZoom: true,
                        zoomWindowWidth: 400,
                        zoomWindowHeight: 400,
                        cursor: 'pointer',
                        galleryActiveClass: 'active',
                        imageCrossfade: true
                    });
                }, 300);
            } else {
                /*setTimeout(function(){
                	$('.zoomContainer').remove();
                	$('.pd_slide .slick-active img').elevateZoom({
                		gallery:'pd_slide', 
                		zoomWindowOffetx: 10,
                		easing : true,
                		scrollZoom : true,
                		zoomWindowWidth: 200,
                		zoomWindowHeight: 200,
                		cursor: 'pointer', 
                		galleryActiveClass: 'active', 
                		imageCrossfade: true,
                		zoomType: 'inner',
                	});
                },300);*/
            }


            $('.pd_slide').slick({
                    prevArrow: '<div class="owl-prev"><img src="https://file.hstatic.net/200000292324/file/back_arrow_1ebd8a5e32454c8ba56b45b94c14273c.png" width="40"></div>',
                    nextArrow: '<div class="owl-next"><img src="https://file.hstatic.net/200000292324/file/next_arrow_f3ce520bf594409092b9ae7d2e3ac8a5.png" width="40"></div>',
                    asNavFor: '.pd_slide_thumb',
                    autoplay: false,
                    speed: 300,
                    autoplaySpeed: 4000,
                    touchMove: true,
                    draggable: true,
                    fade: true,
                    cssEase: 'linear',
                    responsive: [{
                        breakpoint: 767,
                        settings: {
                            prevArrow: '<div class="owl-prev"><img src="https://file.hstatic.net/200000292324/file/back_arrow_1ebd8a5e32454c8ba56b45b94c14273c.png" width="40"></div>',
                            nextArrow: '<div class="owl-next"><img src="https://file.hstatic.net/200000292324/file/next_arrow_f3ce520bf594409092b9ae7d2e3ac8a5.png" width="40"></div>',
                        }
                    }]
                })
                .on('afterChange', function(event, slick, currentSlide, nextSlide) {
                    $('.pd_slide_thumb .slick-slide').removeClass('slick-current');
                    $('.pd_slide_thumb .slick-slide[data-slick-index="' + currentSlide + '"]').addClass(
                        'slick-current');

                    if ($(window).width() > 1200) {
                        setTimeout(function() {
                            $('.zoomContainer').remove();
                            $('.pd_slide .slick-active img').elevateZoom({
                                gallery: 'slick-list',
                                zoomWindowOffetx: 10,
                                easing: true,
                                scrollZoom: true,
                                zoomWindowWidth: 400,
                                zoomWindowHeight: 400,
                                cursor: 'pointer',
                                galleryActiveClass: 'active',
                                imageCrossfade: true
                            });
                        }, 300);
                    }
                    /*else{
                    	setTimeout(function(){
                    		$('.zoomContainer').remove();
                    		$('.pd_slide .slick-active img').elevateZoom({
                    			gallery:'slick-list', 
                    			zoomWindowOffetx: 10,
                    			easing : true,
                    			scrollZoom : true,
                    			zoomWindowWidth: 400,
                    			zoomWindowHeight: 400,
                    			cursor: 'pointer', 
                    			galleryActiveClass: 'active', 
                    			imageCrossfade: true,
                    			zoomType: 'inner',
                    		});
                    	},300);
                    }*/
                });
            $('.pd_slide_thumb').slick({
                slidesToShow: 4,
                arrows: true,
                asNavFor: '.pd_slide',
                focusOnSelect: true,
                vertical: false,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
            });
        });
    </script>
@endpush
