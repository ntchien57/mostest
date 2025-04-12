@extends($theme . '.shop_layout')
@push('style')
    <link href="{{ asset('css/guest/cart/list.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
<div class="page-title shop-page-title product-page-title">
    <div class="page-title-inner flex-row medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <div class="is-medium">
                <nav class="woocommerce-breadcrumb breadcrumbs"><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">&#47;</span> <a>Giỏ hàng</a> </nav>
            </div>
        </div>
        <!-- .flex-left -->

        <div class="flex-col medium-text-center">
        </div>
        <!-- .flex-right -->
    </div>
    <!-- flex-row -->
</div>
<main id="main" class="">
    <div id="content" class="content-area page-wrapper" role="main">
        <div class="row row-main">
            <div class="large-12 col">
                <div class="col-inner">

                    <header class="entry-header">
                        <h1 class="entry-title mb uppercase">Giỏ hàng</h1>
                    </header>

                    @if (count($cart) > 0)

                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="woocommerce row row-large row-divided">
                                <div class="col large-7 pb-0 ">


                                    <form class="woocommerce-cart-form" method="post">
                                        <div class="cart-wrapper sm-touch-scroll">


                                            <table
                                                class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th class="product-name" colspan="3">Sản phẩm</th>
                                                        <th class="product-price">Giá</th>
                                                        <th class="product-quantity">Số lượng</th>
                                                        <th class="product-subtotal">Tạm tính</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if (count(Cart::content()) > 0)
                                                        @foreach (Cart::content() as $cartItem)
                                                            @php
                                                                $n = isset($n) ? $n : 0;
                                                                $n++;
                                                                $product = App\Models\ShopProduct::find($cartItem->id);
                                                            @endphp

                                                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                                                <td class="product-remove">
                                                                    <a href="{{ url("removeItem/$cartItem->rowId") }}"
                                                                        onClick="return confirm('Bạn có muốn xóa sản phẩm này?')"
                                                                        href="{{ url('gio-hang/xoa/' . $cartItem->rowId) }}"
                                                                        class="remove"
                                                                        aria-label="Xóa sản phẩm này">×</a>
                                                                </td>

                                                                <td class="product-thumbnail">
                                                                    <a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($product->name) . '_' . $product->id . '.html') }}"><img
                                                                            width="220" height="300"
                                                                            src="{{ asset('documents/website/' . $product->image) }}"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="{{ $product->name }}" loading="lazy"
                                                                            title="{{ $product->name }}"></a>
                                                                </td>

                                                                <td class="product-name" data-title="Sản phẩm">
                                                                    <a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($product->name) . '_' . $product->id . '.html') }}">{{ $product->name }}</a>
                                                                    <div class="show-for-small mobile-product-price">
                                                                        <span
                                                                            class="mobile-product-price__qty">{{ $cartItem->qty }}
                                                                            x </span>

                                                                           
                                                                        <span
                                                                            class="woocommerce-Price-amount amount"><bdi>{{ number_format($cartItem->price, 0, 0, '.') }}<span
                                                                                    class="woocommerce-Price-currencySymbol">₫</span></bdi></span>
                                                                            
                                                                    </div>
                                                                </td>
                                                               
                                                                <td class="product-price" data-title="Giá">
                                                                    <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($cartItem->price, 0, 0, '.') }}<span
                                                                                class="woocommerce-Price-currencySymbol">₫</span></bdi></span>
                                                                </td>
                                                               

                                                                <td class="product-quantity" data-title="Số lượng">
                                                                    <div class="quantity buttons_added">

                                                                        <button style="margin-right:0" type="button"
                                                                            class="minus-btn button is-form">-</button>

                                                                        <input type="number"
                                                                            id="quantity_645d2b88ee008"
                                                                            class="input-text qty text" step="1"
                                                                            min="1" max=""
                                                                            productId="{{ $cartItem->id }}"
                                                                            productRowId="{{ $cartItem->rowId }}"
                                                                            title="SL" size="4" placeholder=""
                                                                            inputmode="numeric"
                                                                            value="{{ $cartItem->qty }}">
                                                                        <button type="button"
                                                                            class="plus-btn button is-form">+</button>

                                                                    </div>
                                                                </td>

                                                                <td class="product-subtotal" data-title="Tạm tính">
                                                                    <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($cartItem->price * $cartItem->qty, 0, 0, '.') }}<span
                                                                                class="woocommerce-Price-currencySymbol">₫</span></bdi></span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                    <tr>
                                                        <td colspan="6" class="actions clear">


                                                            <div class="continue-shopping pull-left text-left">
                                                                <a class="button-continue-shopping button primary is-outline"
                                                                    href="{{ url('/') }}">
                                                                    ←&nbsp;Tiếp tục xem sản phẩm </a>
                                                            </div>

                                                            {{-- <button type="submit"
                                                                class="button primary mt-0 pull-left small"
                                                                name="update_cart" value="Cập nhật giỏ hàng"
                                                                disabled="" aria-disabled="true">Cập nhật giỏ
                                                                hàng</button> --}}

                                                            <input type="hidden" id="woocommerce-cart-nonce"
                                                                name="woocommerce-cart-nonce" value="d5855d1dda"><input
                                                                type="hidden" name="_wp_http_referer"
                                                                value="/gio-hang/">
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>


                                <div class="cart-collaterals large-5 col pb-0">
                                    <div class="is-sticky-column" style="">
                                        <div class="is-sticky-column__inner"
                                            style="position: relative; transform: translate3d(0px, 0px, 0px);">
                                            <div class="cart-sidebar col-inner ">
                                                <div class="cart_totals ">

                                                    <table cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-name" colspan="2"
                                                                    style="border-width:3px;">Cộng giỏ hàng</th>
                                                            </tr>
                                                        </thead>
                                                    </table>

                                                    <h2>Cộng giỏ hàng</h2>

                                                    <table cellspacing="0" class="shop_table shop_table_responsive">

                                                        <tbody>
                                                            <tr class="cart-subtotal">
                                                                <th>Tạm tính</th>
                                                                <td data-title="Tạm tính"><span
                                                                        class="woocommerce-Price-amount amount"><bdi>{{ Cart::subtotal(0, 0, '.') }}<span
                                                                                class="woocommerce-Price-currencySymbol">₫</span></bdi></span>
                                                                </td>
                                                            </tr>






                                                            <tr class="order-total">
                                                                <th>Tổng</th>
                                                                <td data-title="Tổng"><strong><span
                                                                            class="woocommerce-Price-amount amount"><bdi>{{ Cart::subtotal(0, 0, '.') }}<span
                                                                                    class="woocommerce-Price-currencySymbol">₫</span></bdi></span></strong>
                                                                </td>
                                                            </tr>


                                                        </tbody>
                                                    </table>

                                                    <div class="wc-proceed-to-checkout">

                                                        <a href="{{ url('thanh-toan.html') }}"
                                                            class="checkout-button button alt wc-forward">
                                                            Tiến hành thanh toán</a>
                                                    </div>


                                                </div>
                                                {{-- <form class="checkout_coupon mb-0" method="post">
                                                    <div class="coupon">
                                                        <h3 class="widget-title"><i class="icon-tag"></i> Phiếu ưu đãi
                                                        </h3><input type="text" name="coupon_code"
                                                            class="input-text" id="coupon_code" value=""
                                                            placeholder="Mã ưu đãi">
                                                        <input type="submit" class="is-form expand"
                                                            name="apply_coupon" value="Áp dụng">
                                                    </div>
                                                </form> --}}
                                                <div class="cart-sidebar-content relative">Hotline 24/7 :
                                                    {{ $configs['site_phone'] }}</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cart-footer-content after-cart-content relative"></div>
                        </div>
                    @else
                        <h3>Giỏ hàng trống</h3>
                    @endif
                    <div id="gap-1346712625" class="gap-element clearfix" style="display:block; height:auto;">

                        <style>
                            #gap-1346712625 {
                                padding-top: 16px;
                            }
                        </style>
                    </div>


                    <div class="tabbed-content">
                        <h4 class="uppercase text-left">Xem thêm sản phẩm</h4>
                        <div class="tab-panels">
                            <div class="panel active entry-content" id="tab_phụ-kiện">
                                <div class="woocommerce columns-4 ">
                                    <div
                                        class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights">

                                        @foreach ($products_new as $item)
                                            <div
                                                class="product-small col has-hover product type-product post-16335 status-publish first instock product_cat-long-chim-chich-choe product_cat-long-choe-lua product_tag-long-chim-choe-lua product_tag-long-choe-lua product_tag-long-choe-lua-tre-gia has-post-thumbnail shipping-taxable product-type-simple">
                                                <div class="col-inner">
                                                    @if ($item->unpromotion_price && $item->unpromotion_price > 0)
                                                        @php
                                                            $present = 100 - intval(($item->price / $item->unpromotion_price) * 100, 0);
                                                        @endphp


                                                        <div class="badge-container absolute left top z-1">
                                                            <div class="callout badge badge-square">
                                                                <div class="badge-inner secondary on-sale"><span
                                                                        class="onsale">-{{ $present > 0 ? $present : '0' }}%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <div class="product-small box ">
                                                        <div class="box-image">
                                                            <div class="image-fade-out">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="220" height="300"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail native-lazyload-js-fallback"
                                                                        alt="{{ $item->name }}" loading="lazy"
                                                                        title="{{ $item->name }}"
                                                                        data-src="{{ asset('documents/website/' . $item->image) }}" />
                                                                </a>
                                                            </div>
                                                            <div class="image-tools is-small top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools is-small hide-for-small bottom left show-on-hover">
                                                            </div>
                                                            {{-- <div
                                                        class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                        <a href="https://longchimdep.net/long-choe-lua-tich-tay-du-ky/"
                                                            data-quantity="1"
                                                            class="add-to-cart-grid no-padding is-transparent product_type_simple"
                                                            data-product_id="16335" data-product_sku="LCC - 78"
                                                            aria-label="Đọc thêm về &ldquo;Lồng chòe lửa tích tây du ký&rdquo;"
                                                            rel="nofollow">
                                                            <div class="cart-icon tooltip is-small"
                                                                title="Đọc tiếp">
                                                                <strong>+</strong>
                                                            </div>
                                                        </a>
                                                    </div> --}}
                                                        </div>
                                                        <div
                                                            class="box-text box-text-products text-center grid-style-2">
                                                            <div class="title-wrapper">
                                                                <p
                                                                    class="name product-title woocommerce-loop-product__title">
                                                                    <a href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}"
                                                                        class="woocommerce-LoopProduct-link woocommerce-loop-product__link">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                @if ($item->unpromotion_price && $item->unpromotion_price > 0)
                                                                    <span class="price"><del aria-hidden="true"><span
                                                                                class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->unpromotion_price) }}<span
                                                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                                                            </span>
                                                                        </del>
                                                                        <ins><span
                                                                                class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->price) }}<span
                                                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins></span>
                                                                @elseif ($item->price == 0)
                                                                    <span class="woocommerce-Price-amount amount"><bdi>Liên
                                                                            hệ</bdi></span>
                                                                @else
                                                                    <span
                                                                        class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->price) }}&#8363;</bdi></span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach




                                    </div><!-- row -->
                                </div>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</main>
<script>
    document.body.classList.remove('home');
</script>
@endsection
@push('scripts')
    <script>
        $('.like-btn').on('click', function() {
            $(this).toggleClass('is-active');
        });

        $('.minus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('td').find('input');
            var value = parseInt($input.val());

            if (value >= 1) {
                value = value - 1;
            } else {
                value = 1;
            }

            $input.val(value);
            let id = $input.attr("productId");
            let rowId = $input.attr("productRowId");
            updateCart(id, rowId, value);

        });

        $('.plus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('td').find('input');
            // debugger
            var value = parseInt($input.val());

            if (value < 100) {
                value = value + 1;
            } else {
                value = 100;
            }

            $input.val(value);
            let id = $input.attr("productId");
            let rowId = $input.attr("productRowId");
            updateCart(id, rowId, value);
        });
        document.getElementById("update-btn").onclick = function() {
            document.getElementById("cart-form").submit();
        }
    </script>
    <script type="text/javascript">
        function updateCart(id, rowId, new_qty) {
            // var new_qty = $('#item-' + id).val();
            $.ajax({
                url: '{{ action('Shop@updateToCart') }}',
                type: 'POST',
                dataType: 'json',
                async: true,
                cache: false,
                data: {
                    id: id,
                    new_qty: new_qty,
                    rowId: rowId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    flg = parseInt(data.flg);
                    if (flg === 1) {
                        window.location.replace(location.href);
                    } else {
                        // $('.item-qty-' + id).css('display', 'block').html(data.msg);
                    }

                }
            });
        }

        $('input.product-amount').on('change', function(e) {
            e.preventDefault();
            debugger
            var $this = $(this);
            var $input = $this.closest('td').find('input');
            var value = parseInt($input.val());

            if (value < 100) {
                value = value + 1;
            } else {
                value = 100;
            }

            $input.val(value);
        });

        $('#coupon-button').click(function() {
            var coupon = $('#coupon-value').val();
            if (coupon == '') {
                $('.coupon-msg').html('Bạn chưa nhập mã giảm giá').addClass('text-danger').show();
            } else {
                // $('#coupon-button').button('loading');
                setTimeout(function() {
                    $.ajax({
                            url: '{{ url('/usePromotion') }}',
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                code: coupon,
                                _token: "{{ csrf_token() }}",
                            },
                        })
                        .done(function(result) {
                            $('#coupon-value').val('');
                            $('.coupon-msg').removeClass('text-danger');
                            $('.coupon-msg').removeClass('text-success');
                            $('.coupon-msg').hide();
                            if (result.error == 1) {
                                $('.coupon-msg').html(result.msg).addClass('text-danger').show();
                            } else {
                                $('#removeCoupon').show();
                                $('.coupon-msg').html(result.msg).addClass('text-success').show();
                                $('.showTotal').remove();
                                $('#showTotal').prepend(result.html);
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        })
                    // .always(function() {
                    //     console.log("complete");
                    // });

                    $('#coupon-button').button('reset');
                }, 2000);
            }




        });
        $('#removeCoupon').click(function() {
            $.ajax({
                    url: '{{ url('/usePromotion') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: "remove",
                        _token: "{{ csrf_token() }}",
                    },
                })
                .done(function(result) {
                    $('#removeCoupon').hide();
                    $('#coupon-value').val('');
                    $('.coupon-msg').removeClass('text-danger');
                    $('.coupon-msg').removeClass('text-success');
                    $('.coupon-msg').hide();
                    $('.showTotal').remove();
                    $('#showTotal').prepend(result.html);
                })
                .fail(function() {
                    console.log("error");
                })
            // .always(function() {
            //     console.log("complete");
            // });
        });
    </script>
@endpush
