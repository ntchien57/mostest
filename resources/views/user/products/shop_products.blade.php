@extends($theme . '.shop_layout')
@push('style')
    <link href="{{ asset('css/guest/product/list-by-category.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
@section('breadcrumb')
@endsection
<div class="shop-page-title category-page-title page-title ">
    <div class="page-title-inner flex-row  medium-flex-wrap container">
        <div class="flex-col flex-grow medium-text-center">
            <h1 class="shop-page-title is-xlarge">
                @if (isset($categorySelf))
                    {{ $categorySelf->name }}
                @elseif (isset($search_keyword) && $search_keyword && $search_keyword != '')
                    Kết quả tìm kiếm với từ khóa: {{ $search_keyword }}
                @else
                    Sản phẩm bán chạy
                @endif
            </h1>
            <div class="is-medium">
                <nav class="woocommerce-breadcrumb breadcrumbs uppercase"><a href="{{ url('/') }}">Trang chủ</a>
                    <span class="divider">&#47;</span>
                    @if (isset($categorySelf))
                        {{ $categorySelf->name }}
                    @elseif (isset($search_keyword) && $search_keyword && $search_keyword != '')
                        Kết quả tìm kiếm với từ khóa: {{ $search_keyword }}
                    @else
                        Sản phẩm bán chạy
                    @endif
                </nav>
            </div>
            <div class="category-filtering category-filter-row show-for-medium">
                <a href="#" data-open="#shop-sidebar" data-visible-after="true" data-pos="left"
                    class="filter-button uppercase plain"> <i class="icon-equalizer"></i> <strong>Lọc</strong> </a>
                <div class="inline-block"></div>
            </div>
        </div>
        <div class="flex-col medium-text-center">

            {{-- <form class="woocommerce-ordering" method="get">  --}}
            <select name="sort_order" class="orderby" aria-label="Đơn hàng của cửa hàng"
                onchange="location='?sort_by=price&sort_order='+this.value;">
                <option value="price">Sắp xếp theo</option>
                <option value="asc">Giá thấp đến cao</option>
                <option value="desc">Giá cao xuống thấp</option>
            </select> <input type="hidden" name="paged" value="1" />
            {{-- </form> --}}
        </div>
    </div>
</div>


<main id="main" class="">
    <div class="row category-page-row">
        <div class="col large-3 hide-for-medium ">
            <div class="is-sticky-column">
                <div class="is-sticky-column__inner">
                    <div id="shop-sidebar" class="sidebar-inner col-inner">
                        {{-- @if (isset($categorySelf) && $categorySelf->image)
                        
                        <aside id="media_image-14" class="widget widget_media_image"><img width="278" height="400"
                            src="{{ asset('documents/website/' . $categorySelf->image) }}"
                            class="image wp-image-2054  attachment-full size-full native-lazyload-js-fallback"
                            alt="{{ $categorySelf->name }}" loading="lazy" style="max-width: 100%; height: auto;"
                            title="{{ $categorySelf->name }}"
                            data-src="{{ asset('documents/website/' . $categorySelf->image) }}" /></aside>
                        @endif --}}

                        <aside id="woocommerce_products-3" class="widget woocommerce widget_products"><span
                                class="widget-title shop-sidebar">Sản phẩm mới</span>
                            <div class="is-divider small"></div>
                            <ul class="product_list_widget">
                                @foreach ($products_new as $product)
                                    <li>
                                        <a
                                            href="{{ url('san-pham/' . ktc_str_convert($product->name) . '_' . $product->id . '.html') }}">
                                            <img width="100" height="100"
                                                src="{{ asset('documents/website/' . $product->image) }}"
                                                class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail native-lazyload-js-fallback"
                                                alt="Lồng mi đục rồng cnc" loading="lazy" title="Lồng mi đục rồng cnc"
                                                data-src="{{ asset('documents/website/' . $product->image) }}"
                                                data-srcset="{{ asset('documents/website/' . $product->image) }} 100w, {{ asset('documents/website/' . $product->image) }} 150w"
                                                data-sizes="(max-width: 100px) 100vw, 100px" /> <span
                                                class="product-title">{{ $product->name }}</span> </a>

                                        @if ($product->unpromotion_price && $product->unpromotion_price > 0)
                                            <del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->unpromotion_price) }}<span
                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></del>
                                            <ins><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price) }}<span
                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins>
                                        @elseif ($product->price == 0)
                                            <span class="woocommerce-Price-amount amount"><bdi>Liên hệ</bdi></span>
                                        @else
                                            <span class="woocommerce-Price-amount amount"><bdi>{{ number_format($product->price) }}<span
                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </aside>




                    </div>
                </div>
            </div>
        </div>
        <div class="col large-9">
            <div class="shop-container">
                <div class="term-description">
                    @if (isset($banner))
                        <img style="width:100%" src="{{ asset('documents/website/' . $banner->image) }}" alt="">
                    @else
                    @endif
                </div>
                <div class="term-description">
                    @if (isset($categorySelf))
                        <p style="text-align: justify">
                            {{ $categorySelf->description }}
                        </p>
                    @endif

                    <hr />
                    <p>&nbsp;</p>
                </div>
                <div class="woocommerce-notices-wrapper"></div>
                <div
                    class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-equal-box-heights">
                    @foreach ($products as $item)
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
                                                    class="onsale">-{{ $present > 0 ? $present : '0' }}%</span></div>
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
                                        <div class="image-tools is-small top right show-on-hover"></div>
                                        <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                        </div>
                                        {{-- <div
                                    class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                    <a href="https://longchimdep.net/long-choe-lua-tich-tay-du-ky/"
                                        data-quantity="1"
                                        class="add-to-cart-grid no-padding is-transparent product_type_simple"
                                        data-product_id="16335" data-product_sku="LCC - 78"
                                        aria-label="Đọc thêm về &ldquo;Lồng chòe lửa tích tây du ký&rdquo;"
                                        rel="nofollow">
                                        <div class="cart-icon tooltip is-small" title="Đọc tiếp">
                                            <strong>+</strong></div>
                                    </a>
                                </div> --}}
                                    </div>
                                    <div class="box-text box-text-products text-center grid-style-2">
                                        <div class="title-wrapper">
                                            <p class="name product-title woocommerce-loop-product__title"><a
                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}"
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
                                                    <ins><span class="woocommerce-Price-amount amount"><bdi>{{ number_format($item->price) }}<span
                                                                    class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></ins></span>
                                            @elseif ($item->price == 0)
                                                <span class="woocommerce-Price-amount amount"><bdi>Liên hệ</bdi></span>
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

                </div>
            </div>
            {!! $products->links($theme . '.my-pagination') !!}
        </div>
    </div>
</main>
<script>
    document.body.classList.remove('home');
</script>

@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        var sidebarSlider = new Swiper('.blog-sb-slider', {
            autoHeight: true,
            navigation: {
                nextEl: '.blog-sb-slider .swiper-button-next',
                prevEl: '.blog-sb-slider .swiper-button-prev',
            }
        });
        var blogRelatedSlider = new Swiper('.info-related-articles .swiper-container', {
            autoHeight: true,
            spaceBetween: 20,
            slidesPerColumn: 2,
            navigation: {
                nextEl: '.info-related-articles .swiper-button-next',
                prevEl: '.info-related-articles .swiper-button-prev',
            },
            breakpoints: {
                320: {
                    slidesPerView: 2
                },
                480: {
                    slidesPerView: 3
                },
                640: {
                    slidesPerView: 4
                }
            }
        });
    });
</script>
<script>
    @if (isset($slug))
        $('#menu-nav .nav > .nav-links > a[slug="{{ $slug }}"]').toggleClass("active");
    @endif
    @if (isset($categorySelf))
        @if ($categorySelf->getParent())
            $("#menu-category-{{ $categorySelf->getParent()->id }}").toggleClass("active");
        @else
            $("#menu-category-{{ $categorySelf->id }}").toggleClass("active");
        @endif
    @endif
</script>
@endpush
