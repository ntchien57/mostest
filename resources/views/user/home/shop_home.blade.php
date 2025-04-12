@extends($theme . '.shop_layout')
@push('style')
    <style>
        .video-fit video,
        .video-fit iframe,
        img.back-image,
        .image-cover img,
        .has-format img,
        .has-equal-box-heights .box-image img {
            height: unset !important;
        }
    </style>
@endpush
@section('slider')
@endsection
@section('content')
    <main id="main" class="">
        <div id="content" role="main" class="content-area">
            <div class="row row-small slider" id="row-1756791511">
                <div class="col hide-for-medium medium-3 small-12 large-3">
                    <div class="col-inner">
                    </div>
                </div>
                <div class="col hide-for-medium medium-6 small-12 large-9">
                    <div class="col-inner">
                        <div class="slider-wrapper relative " id="slider-1707006904">
                            <div class="slider slider-nav-simple slider-nav-normal slider-nav-light slider-style-normal slider-show-nav"
                                data-flickity-options='{
        "cellAlign": "center",
        "imagesLoaded": true,
        "lazyLoad": 1,
        "freeScroll": false,
        "wrapAround": true,
        "autoPlay": 4000,
        "pauseAutoPlayOnHover" : true,
        "prevNextButtons": true,
        "contain" : true,
        "adaptiveHeight" : true,
        "dragThreshold" : 5,
        "percentPosition": true,
        "pageDots": true,
        "rightToLeft": false,
        "draggable": true,
        "selectedAttraction": 0.1,
        "parallax" : 0,
        "friction": 0.6        }'>


                                @foreach ($banners_top as $item)
                                    <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1678244062">
                                        <a href="#" target="_self" class="">
                                            <div class="img-inner image-cover dark" style="padding-top:58%;">
                                                <img width="800" height="534"
                                                    src="{{ asset('documents/website/' . $item->image) }}"
                                                    class="attachment-original size-original" alt=""
                                                    srcset="{{ asset('documents/website/' . $item->image) }} 800w, {{ asset('documents/website/' . $item->image) }} 300w, {{ asset('documents/website/' . $item->image) }} 768w"
                                                    sizes="(max-width: 800px) 100vw, 800px">
                                            </div>
                                        </a>
                                        <style scope="scope">
                                            #image_1678244062 {
                                                width: 100%;
                                            }
                                        </style>
                                    </div>
                                @endforeach




                            </div>

                            <div class="loading-spin dark large centered"></div>

                            <style scope="scope">

                            </style>
                        </div>
                        <!-- .ux-slider-wrapper -->


                    </div>
                </div>
                {{-- <div class="col tin-tuc hide-for-medium medium-3 small-12 large-3">
                <div class="col-inner">


                    <div class="row large-columns-1 medium-columns-1 small-columns-1">
                        @if (count($news_lm5) > 0)
                            @foreach ($news_lm5 as $item)
                            <div class="col post-item">
                                <div class="col-inner">
                                    <a href="{{ url('blog/'.ktc_str_convert($item->title).'_'.$item->id.'.html') }}" class="plain">
                                        <div class="box box-vertical box-text-middle box-blog-post has-hover">
                                            <div class="box-image" style="width:25%;">
                                                <div class="image-cover" style="padding-top:89%;">
                                                    <img width="670" height="447"
                                                        src="{{ asset('documents/website/'.$item->image) }}"
                                                        class="attachment-original size-original wp-post-image"
                                                        alt=""
                                                        srcset="{{ asset('documents/website/'.$item->image) }} 670w, {{ asset('documents/website/'.$item->image) }} 300w"
                                                        sizes="(max-width: 670px) 100vw, 670px">
                                                </div>
                                            </div>
                                            <!-- .box-image -->
                                            <div class="box-text text-left">
                                                <div class="box-text-inner blog-post-inner">
    
    
                                                    <h5 class="post-title is-large ">{{ $item->title }}</h5>
                                                    <div class="post-meta is-small op-8">{{ date_format($item->updated_at, 'd/m/Y') }}</div>
                                                    <div class="is-divider"></div>
    
    
    
                                                </div>
                                                <!-- .box-text-inner -->
                                            </div>
                                            <!-- .box-text -->
                                        </div>
                                        <!-- .box -->
                                    </a>
                                    <!-- .link -->
                                </div>
                                <!-- .col-inner -->
                            </div>
                            @endforeach
                        @else
                            
                        @endif
                        
                    
                    </div>
                </div>
            </div> --}}

                <style scope="scope">

                </style>
            </div>

            <section class="section sp-noi-bat" id="section_8974719188">
                <div class="bg section-bg fill bg-fill  ">





                </div>
                <!-- .section-bg -->

                <div class="section-content relative">

                    <div class="row title" id="row-1986441406">
                        <div class="col small-12 large-12">
                            <div class="col-inner">
                                <div class="tieu-de">
                                    <div class="img-title"><img
                                            src="{{ asset('theme/wp-content/uploads/2017/11/dot2345.png') }}"
                                            width="25px"></div>
                                    <div class="text">
                                        <h3 style="color: white;">GIẢM GIÁ GIỜ VÀNG</h3>
                                    </div>
                                    <div class="clearboth"></div>
                                </div>
                            </div>
                        </div>

                        <style scope="scope">

                        </style>
                    </div>
                    <div class="row row-small product" id="row-767913575">
                        <div class="col hide-for-medium medium-12 small-12 large-12">
                            <div class="col-inner">


                                <div class="row large-columns-6 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>


                                    @if (count($productsFlashsale) > 0)
                                        @foreach ($productsFlashsale as $item)
                                            <div class="col">
                                                <div class="col-inner">

                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image" style="border-radius:4%;">
                                                            <div class="image-zoom image-cover" style="padding-top:100%;">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="700" height="843"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-original size-original wp-post-image"
                                                                        alt=""
                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 700w, {{ asset('documents/website/' . $item->image) }} 249w"
                                                                        sizes="(max-width: 700px) 100vw, 700px"> </a>
                                                            </div>
                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->

                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            @if ($item->price > 0)
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($item->flash_price, 0, 0, '.') }}<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            @else
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">Liên
                                                                        hệ</span>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                            <!-- col -->
                                        @endforeach
                                    @else
                                    @endif



                                </div>
                            </div>
                        </div>


                        <style scope="scope">

                        </style>
                    </div>
                    <div class="row row-small product" id="row-1975180838">
                        <div class="col show-for-medium hide-for-small small-12 large-12">
                            <div class="col-inner">


                                <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>




                                    @if (count($productsFlashsale) > 0)
                                        @foreach ($productsFlashsale as $item)
                                            <div class="col">
                                                <div class="col-inner">

                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image" style="border-radius:4%;">
                                                            <div class="image-zoom image-cover" style="padding-top:100%;">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="700" height="843"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-original size-original wp-post-image"
                                                                        alt=""
                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 700w, {{ asset('documents/website/' . $item->image) }} 249w"
                                                                        sizes="(max-width: 700px) 100vw, 700px"> </a>
                                                            </div>
                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->

                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                @if ($item->price > 0)
                                                                    <span class="price"><span
                                                                            class="woocommerce-Price-amount amount">{{ number_format($item->flash_price, 0, 0, '.') }}<span
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
                                            <!-- col -->
                                        @endforeach
                                    @else
                                    @endif

                                </div>
                            </div>
                        </div>

                        <style scope="scope">

                        </style>
                    </div>
                    <div class="row row-small product" id="row-414283266">
                        <div class="col show-for-small small-12 large-12">
                            <div class="col-inner">


                                <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>




                                    @if (count($productsFlashsale) > 0)
                                        @foreach ($productsFlashsale as $item)
                                            <div class="col">
                                                <div class="col-inner">

                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image" style="border-radius:4%;">
                                                            <div class="image-zoom image-cover" style="padding-top:100%;">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="700" height="843"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-original size-original wp-post-image"
                                                                        alt=""
                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 700w, {{ asset('documents/website/' . $item->image) }} 249w"
                                                                        sizes="(max-width: 700px) 100vw, 700px"> </a>
                                                            </div>
                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->

                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($item->flash_price, 0, 0, '.') }}<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                            <!-- col -->
                                        @endforeach
                                    @else
                                    @endif




                                </div>
                            </div>
                        </div>

                        <style scope="scope">

                        </style>
                    </div>
                </div>
                <!-- .section-content -->


                <style scope="scope">
                    #section_8974719188 {
                        padding-top: 30px;
                        padding-bottom: 30px;
                        background-color: rgb(243, 239, 246);
                    }

                    #section_8974719188 .section-bg.bg-loaded {
                        background: #ebeb49;
                    }
                </style>
            </section>


            <section class="section sp-noi-bat" id="section_897471918">
                <div class="bg section-bg fill bg-fill  ">





                </div>
                <!-- .section-bg -->

                <div class="section-content relative">

                    <div class="row title" id="row-1986441406">
                        <div class="col small-12 large-12">
                            <div class="col-inner">
                                <div class="tieu-de">
                                    <div class="img-title"><img
                                            src="{{ asset('theme/wp-content/uploads/2017/11/dot2345.png') }}"
                                            width="25px"></div>
                                    <div class="text">
                                        <h3 style="color: white;">SẢN PHẨM NỔI BẬT</h3>
                                    </div>
                                    <div class="clearboth"></div>
                                </div>
                            </div>
                        </div>

                        <style scope="scope">

                        </style>
                    </div>
                    <div class="row row-small product" id="row-767913575">
                        <div class="col hide-for-medium medium-12 small-12 large-12">
                            <div class="col-inner">


                                <div class="row large-columns-6 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>


                                    @if (count($products_hot) > 0)
                                        @foreach ($products_hot as $item)
                                            <div class="col">
                                                <div class="col-inner">

                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image" style="border-radius:4%;">
                                                            <div class="image-zoom image-cover" style="padding-top:100%;">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="700" height="843"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-original size-original wp-post-image"
                                                                        alt=""
                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 700w, {{ asset('documents/website/' . $item->image) }} 249w"
                                                                        sizes="(max-width: 700px) 100vw, 700px"> </a>
                                                            </div>
                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->

                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            @if ($item->price > 0)
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
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                            <!-- col -->
                                        @endforeach
                                    @else
                                    @endif



                                </div>
                            </div>
                        </div>


                        <style scope="scope">

                        </style>
                    </div>
                    <div class="row row-small product" id="row-1975180838">
                        <div class="col show-for-medium hide-for-small small-12 large-12">
                            <div class="col-inner">


                                <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>




                                    @if (count($products_hot) > 0)
                                        @foreach ($products_hot as $item)
                                            <div class="col">
                                                <div class="col-inner">

                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image" style="border-radius:4%;">
                                                            <div class="image-zoom image-cover" style="padding-top:100%;">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="700" height="843"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-original size-original wp-post-image"
                                                                        alt=""
                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 700w, {{ asset('documents/website/' . $item->image) }} 249w"
                                                                        sizes="(max-width: 700px) 100vw, 700px"> </a>
                                                            </div>
                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->

                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                @if ($item->price > 0)
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
                                            <!-- col -->
                                        @endforeach
                                    @else
                                    @endif

                                </div>
                            </div>
                        </div>

                        <style scope="scope">

                        </style>
                    </div>
                    <div class="row row-small product" id="row-414283266">
                        <div class="col show-for-small small-12 large-12">
                            <div class="col-inner">


                                <div class="row large-columns-5 medium-columns-3 small-columns-2 row-small slider row-slider slider-nav-simple slider-nav-push"
                                    data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>




                                    @if (count($products_hot) > 0)
                                        @foreach ($products_hot as $item)
                                            <div class="col">
                                                <div class="col-inner">

                                                    <div class="badge-container absolute left top z-1">
                                                    </div>
                                                    <div class="product-small box has-hover box-normal box-text-bottom">
                                                        <div class="box-image" style="border-radius:4%;">
                                                            <div class="image-zoom image-cover" style="padding-top:100%;">
                                                                <a
                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                    <img width="700" height="843"
                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                        class="attachment-original size-original wp-post-image"
                                                                        alt=""
                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 700w, {{ asset('documents/website/' . $item->image) }} 249w"
                                                                        sizes="(max-width: 700px) 100vw, 700px"> </a>
                                                            </div>
                                                            <div class="image-tools top right show-on-hover">
                                                            </div>
                                                            <div
                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                            </div>
                                                        </div>
                                                        <!-- box-image -->

                                                        <div class="box-text text-center">
                                                            <div class="title-wrapper">
                                                                <p class="name product-title"><a
                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="price-wrapper">
                                                                <span class="price"><span
                                                                        class="woocommerce-Price-amount amount">{{ number_format($item->price, 0, 0, '.') }}<span
                                                                            class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- box-text -->
                                                    </div>
                                                    <!-- box -->
                                                </div>
                                                <!-- .col-inner -->
                                            </div>
                                            <!-- col -->
                                        @endforeach
                                    @else
                                    @endif




                                </div>
                            </div>
                        </div>

                        <style scope="scope">

                        </style>
                    </div>
                </div>
                <!-- .section-content -->


                <style scope="scope">
                    #section_897471918 {
                        padding-top: 30px;
                        padding-bottom: 30px;
                        background-color: rgb(243, 239, 246);
                    }

                    #section_897471918 .section-bg.bg-loaded {
                        background: #057A45;
                    }
                </style>
            </section>

            @if ($categories_hot)
                @foreach ($categories_hot as $category)
                    <section class="section catelogy" id="section_1218483929">
                        <div class="bg section-bg fill bg-fill  bg-loaded">





                        </div>
                        <!-- .section-bg -->

                        <div class="section-content relative">

                            <div class="row row-small row" id="row-2098080429">
                                <div class="col sidebar hide-for-medium medium-3 small-12 large-3">
                                    <h3 style="text-align: center; margin:0"><a
                                            href="{{ url('shop/' . ktc_str_convert($category->name) . '_' . $category->id . '.html') }}"><span
                                                style="font-size: 120%;">{{ $category->name }}</span></a></h3>

                                </div>
                                <div class="col sidebar hide-for-medium medium-9 small-12 large-9">
                                    <ul class="nav nav-simple nav-uppercase nav-size-large nav-right">
                                        {{-- <li class="tab active has-icon"><a
                                        href="#tab_phong-cảnh-hà-nội"><span>Phong cảnh Hà Nội</span></a>
                                </li>
                                <li class="tab has-icon"><a href="#tab_men-trắng-bát-tràng"><span>Men
                                            trắng Bát Tràng</span></a></li> --}}
                                        <li style="padding-right: 10px;" class="tab has-icon"><a
                                                href="{{ url('shop/' . ktc_str_convert($category->name) . '_' . $category->id . '.html') }}"><span>Xem
                                                    thêm >></span></a></li>
                                    </ul>
                                </div>
                                <div class="col product hide-for-medium medium-9 small-12 large-12">
                                    <div class="col-inner">

                                        <div class="tabbed-content">


                                            <div class="tab-panels">
                                                <div class="panel active entry-content" id="tab_phong-cảnh-hà-nội">


                                                    <div
                                                        class="row large-columns-4 medium-columns- small-columns-2 row-small">

                                                        @foreach ($category->getProductsToCategory($category->id, $limit = 8) as $item)
                                                            <div class="col">
                                                                <div class="col-inner">

                                                                    <div class="badge-container absolute left top z-1">
                                                                    </div>
                                                                    <div
                                                                        class="product-small box has-hover box-normal box-text-bottom">
                                                                        <div class="box-image">
                                                                            <div class="image-zoom image-cover"
                                                                                style="padding-top:100%;">
                                                                                <a
                                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                                    <img width="800" height="963"
                                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                                        class="attachment-original size-original wp-post-image"
                                                                                        alt=""
                                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 800w, {{ asset('documents/website/' . $item->image) }} 249w, {{ asset('documents/website/' . $item->image) }} 768w"
                                                                                        sizes="(max-width: 800px) 100vw, 800px">
                                                                                </a>
                                                                            </div>
                                                                            <div
                                                                                class="image-tools top right show-on-hover">
                                                                            </div>
                                                                            <div
                                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                            </div>
                                                                        </div>
                                                                        <!-- box-image -->

                                                                        <div class="box-text text-center">
                                                                            <div class="title-wrapper">
                                                                                <p class="name product-title"><a
                                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                                </p>
                                                                            </div>
                                                                            <div class="price-wrapper">
                                                                                @if ($item->price > 0)
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
                                                            <!-- col -->
                                                        @endforeach



                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <style scope="scope">

                                </style>
                            </div>
                            <div class="row row-small row" id="row-65334418">
                                <div class="col sidebar show-for-medium hide-for-small medium-3 small-12 large-3">
                                    <div class="col-inner">
                                        <h3 style="text-align: center;"><a
                                                href="danh-muc/bo-do-an-gia-dinh/index.htm"><span
                                                    style="font-size: 120%;">{{ $category->name }}</span></a></h3>
                                        <div class="row row-small row-divided" id="row-392673138">
                                            <div class="col medium-6 small-12 large-6">
                                                <div class="col-inner">

                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/phong-canh-ha-noi/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-1-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn vẽ phong cảnh Hà
                                                                    Nội</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-men-trang-bat-trang/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-23454-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn men trắng Bát
                                                                    Tràng</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-ve-truc/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-55555-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn Bát Tràng vẽ Trúc
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col medium-6 small-12 large-6">
                                                <div class="col-inner">

                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-bat-trang-ve-phong-canh-ha-noi/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon234-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn Bát Tràng vẽ phong
                                                                    cảnh HN</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-men-kem-bat-trang/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-4545454-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn men lam Bát Tràng
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-ve-tung-hac/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-6-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn men trắng vẽ Tùng
                                                                    &#8211; Hạc</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>

                                                </div>
                                            </div>

                                            <style scope="scope">

                                            </style>
                                        </div>
                                        <div class="gap-element" style="display:block; height:auto; padding-top:15px"
                                            class="clearfix"></div>
                                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_80379303">
                                            <div class="img-inner image-cover dark" style="padding-top:101%;">
                                                <img width="800" height="533"
                                                    src="wp-content/uploads/2017/11/bo-do-an-gia-dinh-bang-gom.jpg"
                                                    class="attachment-original size-original" alt=""
                                                    srcset="wp-content/uploads/2017/11/bo-do-an-gia-dinh-bang-gom.jpg 800w, wp-content/uploads/2017/11/bo-do-an-gia-dinh-bang-gom-300x200.jpg 300w, wp-content/uploads/2017/11/bo-do-an-gia-dinh-bang-gom-768x512.jpg 768w"
                                                    sizes="(max-width: 800px) 100vw, 800px">
                                            </div>

                                            <style scope="scope">
                                                #image_80379303 {
                                                    width: 100%;
                                                }
                                            </style>
                                        </div>

                                    </div>
                                </div>
                                <div class="col product show-for-medium hide-for-small medium-9 small-12 large-9">
                                    <div class="col-inner">

                                        <div class="tabbed-content">

                                            <ul class="nav nav-simple nav-uppercase nav-size-large nav-right">
                                                <li class="tab active has-icon"><a
                                                        href="#tab_phong-cảnh-hà-nội"><span>Phong cảnh Hà Nội</span></a>
                                                </li>
                                                <li class="tab has-icon"><a href="#tab_men-trắng-bát-tràng"><span>Men
                                                            trắng Bát Tràng</span></a></li>
                                                <li class="tab has-icon"><a href="#tab_vẽ-tùng---hạc"><span>Vẽ Tùng -
                                                            Hạc</span></a></li>
                                            </ul>
                                            <div class="tab-panels">
                                                <div class="panel active entry-content" id="tab_phong-cảnh-hà-nội">


                                                    <div
                                                        class="row large-columns-4 medium-columns- small-columns-2 row-small">


                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/bat-nuoc-cham-in-phong-canh-ha-noi/index.htm">
                                                                                <img width="800" height="963"
                                                                                    src="wp-content/uploads/2017/11/bat-mam-da-003.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/bat-mam-da-003.jpg 800w, wp-content/uploads/2017/11/bat-mam-da-003-249x300.jpg 249w, wp-content/uploads/2017/11/bat-mam-da-003-768x924.jpg 768w"
                                                                                    sizes="(max-width: 800px) 100vw, 800px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/bat-nuoc-cham-in-phong-canh-ha-noi/index.htm">Bát
                                                                                    nước chấm in phong cảnh Hà Nội</a></p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                            <span class="price"><span
                                                                                    class="woocommerce-Price-amount amount">20.000<span
                                                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->


                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/to-loe-in-phong-canh-ha-noi/index.htm">
                                                                                <img width="800" height="963"
                                                                                    src="wp-content/uploads/2017/11/to-loe-da-008.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/to-loe-da-008.jpg 800w, wp-content/uploads/2017/11/to-loe-da-008-249x300.jpg 249w, wp-content/uploads/2017/11/to-loe-da-008-768x924.jpg 768w"
                                                                                    sizes="(max-width: 800px) 100vw, 800px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/to-loe-in-phong-canh-ha-noi/index.htm">Tô
                                                                                    Loe in phong cảnh Hà Nội</a></p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->


                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/dia-su-sau-long-so-4-ve-tranh-phong-canh/index.htm">
                                                                                <img width="800" height="963"
                                                                                    src="wp-content/uploads/2017/11/dia-sau-long-da-005-4.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/dia-sau-long-da-005-4.jpg 800w, wp-content/uploads/2017/11/dia-sau-long-da-005-4-249x300.jpg 249w, wp-content/uploads/2017/11/dia-sau-long-da-005-4-768x924.jpg 768w"
                                                                                    sizes="(max-width: 800px) 100vw, 800px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/dia-su-sau-long-so-4-ve-tranh-phong-canh/index.htm">Đĩa
                                                                                    sứ sâu lòng số 4 vẽ tranh phong cảnh</a>
                                                                            </p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                            <span class="price"><span
                                                                                    class="woocommerce-Price-amount amount">120.000<span
                                                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->


                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/dia-su-sau-long-so-6-ve-tranh-phong-canh/index.htm">
                                                                                <img width="800" height="963"
                                                                                    src="wp-content/uploads/2017/11/dia-sau-long-da-005-6.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/dia-sau-long-da-005-6.jpg 800w, wp-content/uploads/2017/11/dia-sau-long-da-005-6-249x300.jpg 249w, wp-content/uploads/2017/11/dia-sau-long-da-005-6-768x924.jpg 768w"
                                                                                    sizes="(max-width: 800px) 100vw, 800px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/dia-su-sau-long-so-6-ve-tranh-phong-canh/index.htm">Đĩa
                                                                                    sứ sâu lòng số 6 vẽ tranh phong cảnh</a>
                                                                            </p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                            <span class="price"><span
                                                                                    class="woocommerce-Price-amount amount">90.000<span
                                                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->

                                                    </div>
                                                </div>
                                                <div class="panel entry-content" id="tab_men-trắng-bát-tràng">


                                                    <div
                                                        class="row large-columns-4 medium-columns- small-columns-2 row-small">



                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/bat-to-men-trang-bat-trang-phi-17/index.htm">
                                                                                <img width="700" height="843"
                                                                                    src="wp-content/uploads/2017/11/bat-to-men-trang-da08-02-17.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/bat-to-men-trang-da08-02-17.jpg 700w, wp-content/uploads/2017/11/bat-to-men-trang-da08-02-17-249x300.jpg 249w"
                                                                                    sizes="(max-width: 700px) 100vw, 700px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/bat-to-men-trang-bat-trang-phi-17/index.htm">Bát
                                                                                    tô men trắng Bát Tràng phi 17</a></p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->


                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/au-com-dang-minh-long-men-trang/index.htm">
                                                                                <img width="700" height="843"
                                                                                    src="wp-content/uploads/2017/11/au-com-dang-minh-long-men-trang-da08-07-1.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/au-com-dang-minh-long-men-trang-da08-07-1.jpg 700w, wp-content/uploads/2017/11/au-com-dang-minh-long-men-trang-da08-07-1-249x300.jpg 249w"
                                                                                    sizes="(max-width: 700px) 100vw, 700px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/au-com-dang-minh-long-men-trang/index.htm">Âu
                                                                                    cơm dáng Minh Long men trắng</a></p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->


                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/au-com-men-trang-bat-trang/index.htm">
                                                                                <img width="700" height="843"
                                                                                    src="wp-content/uploads/2017/11/au-com-men-trang-da08-07-17.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/au-com-men-trang-da08-07-17.jpg 700w, wp-content/uploads/2017/11/au-com-men-trang-da08-07-17-249x300.jpg 249w"
                                                                                    sizes="(max-width: 700px) 100vw, 700px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/au-com-men-trang-bat-trang/index.htm">Âu
                                                                                    cơm men trắng Bát Tràng</a></p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->


                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/bat-an-com-men-trang-bat-trang/index.htm">
                                                                                <img width="700" height="843"
                                                                                    src="wp-content/uploads/2017/11/bat-an-com-men-trang-da08-01-1.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/bat-an-com-men-trang-da08-01-1.jpg 700w, wp-content/uploads/2017/11/bat-an-com-men-trang-da08-01-1-249x300.jpg 249w"
                                                                                    sizes="(max-width: 700px) 100vw, 700px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/bat-an-com-men-trang-bat-trang/index.htm">Bát
                                                                                    ăn cơm men trắng Bát Tràng</a></p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->

                                                    </div>
                                                </div>
                                                <div class="panel entry-content" id="tab_vẽ-tùng---hạc">


                                                    <div
                                                        class="row large-columns-4 medium-columns- small-columns-2 row-small">



                                                        <div class="col">
                                                            <div class="col-inner">

                                                                <div class="badge-container absolute left top z-1">
                                                                </div>
                                                                <div
                                                                    class="product-small box has-hover box-normal box-text-bottom">
                                                                    <div class="box-image">
                                                                        <div class="image-zoom image-cover"
                                                                            style="padding-top:100%;">
                                                                            <a
                                                                                href="product/bat-dung-mam-ve-tung-hac/index.htm">
                                                                                <img width="700" height="843"
                                                                                    src="wp-content/uploads/2017/11/bat-mam-tung-hac-da01-05.jpg"
                                                                                    class="attachment-original size-original wp-post-image"
                                                                                    alt=""
                                                                                    srcset="wp-content/uploads/2017/11/bat-mam-tung-hac-da01-05.jpg 700w, wp-content/uploads/2017/11/bat-mam-tung-hac-da01-05-249x300.jpg 249w"
                                                                                    sizes="(max-width: 700px) 100vw, 700px">
                                                                            </a>
                                                                        </div>
                                                                        <div class="image-tools top right show-on-hover">
                                                                        </div>
                                                                        <div
                                                                            class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-image -->

                                                                    <div class="box-text text-center">
                                                                        <div class="title-wrapper">
                                                                            <p class="name product-title"><a
                                                                                    href="product/bat-dung-mam-ve-tung-hac/index.htm">Bát
                                                                                    đựng mắm vẽ hoa văn Tùng Hạc</a></p>
                                                                        </div>
                                                                        <div class="price-wrapper">
                                                                            <span class="price"><span
                                                                                    class="woocommerce-Price-amount amount">25.000<span
                                                                                        class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <!-- box-text -->
                                                                </div>
                                                                <!-- box -->
                                                            </div>
                                                            <!-- .col-inner -->
                                                        </div>
                                                        <!-- col -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <style scope="scope">

                                </style>
                            </div>
                            <div class="row row-small row" id="row-1104928564">
                                <div class="col sidebar show-for-small medium-3 small-12 large-3">
                                    <div class="col-inner">
                                        <h3 style="text-align: center;"><a
                                                href={{ url('shop/' . ktc_str_convert($category->name) . '_' . $category->id . '.html') }}"><span
                                                    style="font-size: 120%;">{{ $category->name }}</span></a></h3>
                                        <div class="row row-small row-divided" id="row-263176642">
                                            <div class="col hide-for-small medium-6 small-12 large-6">
                                                <div class="col-inner">

                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/phong-canh-ha-noi/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-1-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn vẽ phong cảnh Hà
                                                                    Nội</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-men-trang-bat-trang/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-23454-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn men trắng Bát
                                                                    Tràng</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-ve-truc/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-55555-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn Bát Tràng vẽ Trúc
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col hide-for-small medium-6 small-12 large-6">
                                                <div class="col-inner">

                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-bat-trang-ve-phong-canh-ha-noi/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon234-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn Bát Tràng vẽ phong
                                                                    cảnh HN</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-men-kem-bat-trang/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-4545454-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn men lam Bát Tràng
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>


                                                    <a class="plain"
                                                        href="danh-muc/bo-do-an-gia-dinh/bo-do-an-ve-tung-hac/index.htm"
                                                        target="_blank">
                                                        <div class="icon-box featured-box icon-box-center text-center">
                                                            <div class="icon-box-img" style="width: 60px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="101" height="101"
                                                                            src="wp-content/uploads/2017/11/icon-6-01.png"
                                                                            class="attachment-medium size-medium"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">

                                                                <p style="text-align: center;">Bộ đồ ăn men trắng vẽ Tùng
                                                                    &#8211; Hạc</p>
                                                            </div>
                                                        </div>
                                                        <!-- .icon-box -->
                                                    </a>

                                                </div>
                                            </div>

                                            <style scope="scope">

                                            </style>
                                        </div>
                                        <div class="gap-element" style="display:block; height:auto; padding-top:15px"
                                            class="clearfix"></div>
                                        <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1751994810">

                                            <style scope="scope">
                                                #image_1751994810 {
                                                    width: 100%;
                                                }
                                            </style>
                                        </div>

                                    </div>
                                </div>
                                <div class="col product show-for-small medium-9 small-12 large-9">
                                    <div class="col-inner">

                                        <div class="tabbed-content">

                                            <div class="tab-panels">
                                                <div class="panel active entry-content" id="tab_phong-cảnh-hà-nội">


                                                    <div
                                                        class="row large-columns-4 medium-columns- small-columns-2 row-small">


                                                        @foreach ($category->getProductsToCategory($category->id, $limit = 4) as $item)
                                                            <div class="col">
                                                                <div class="col-inner">

                                                                    <div class="badge-container absolute left top z-1">
                                                                    </div>
                                                                    <div
                                                                        class="product-small box has-hover box-normal box-text-bottom">
                                                                        <div class="box-image">
                                                                            <div class="image-zoom image-cover"
                                                                                style="padding-top:100%;">
                                                                                <a
                                                                                    href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">
                                                                                    <img width="800" height="963"
                                                                                        src="{{ asset('documents/website/' . $item->image) }}"
                                                                                        class="attachment-original size-original wp-post-image"
                                                                                        alt=""
                                                                                        srcset="{{ asset('documents/website/' . $item->image) }} 800w, {{ asset('documents/website/' . $item->image) }} 249w, {{ asset('documents/website/' . $item->image) }} 768w"
                                                                                        sizes="(max-width: 800px) 100vw, 800px">
                                                                                </a>
                                                                            </div>
                                                                            <div
                                                                                class="image-tools top right show-on-hover">
                                                                            </div>
                                                                            <div
                                                                                class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                                            </div>
                                                                        </div>
                                                                        <!-- box-image -->

                                                                        <div class="box-text text-center">
                                                                            <div class="title-wrapper">
                                                                                <p class="name product-title"><a
                                                                                        href="{{ url('san-pham/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}">{{ $item->name }}</a>
                                                                                </p>
                                                                            </div>
                                                                            <div class="price-wrapper">
                                                                                @if ($item->price > 0)
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
                                                    </div>
                                                </div>
                                                <ul class="nav nav-simple nav-uppercase nav-size-large nav-center">
                                                    <li class="tab active has-icon"><a
                                                            style="background:url({{ asset('theme/wp-content/uploads/2017/11/line-123.jpg') }}); padding:10px 20px; border-radius:6px; color:#e0c2a6; font-weight:bold"
                                                            href="{{ url('shop/' . ktc_str_convert($category->name) . '_' . $category->id . '.html') }}"><span>Xem
                                                                thêm</span></a>
                                                    </li>
                                                    {{-- <li class="tab has-icon"><a href="#tab_men-trắng-bát-tràng"><span>Men
                                                    trắng Bát Tràng</span></a></li>
                                        <li class="tab has-icon"><a href="#tab_vẽ-tùng---hạc"><span>Vẽ Tùng -
                                                    Hạc</span></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <style scope="scope">

                                </style>
                            </div>
                        </div>
                        <!-- .section-content -->


                        <style scope="scope">
                            #section_1218483929 {
                                padding-top: 30px;
                                padding-bottom: 30px;
                            }
                        </style>
                    </section>
                @endforeach
            @else
            @endif



            {{-- <section class="section tin-tuc hide-for-small" id="section_1273293496">
            <div class="bg section-bg fill bg-fill  ">





            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row row-small" id="row-1687626204">
                    <div class="col hide-for-medium small-12 large-12">
                        <div class="col-inner">
                            <h3 style="text-align: center;"><span style="font-size: 120%; color: white;">BÀI VIẾT &#8211;
                                    TIN TỨC</span></h3>
                            <div class="gap-element" style="display:block; height:auto; padding-top:10px"
                                class="clearfix"></div>


                            <div class="row large-columns-5 medium-columns-1 small-columns-1 row-small">
                                @foreach ($blogs_all as $item)
                                <div class="col post-item">
                                    <div class="col-inner">
                                        <a href="{{url('bai-viet/'.ktc_str_convert($item->title).'_'.$item->id.'.html')}}"
                                            class="plain">
                                            <div
                                                class="box box-normal box-text-bottom box-blog-post has-hover">
                                                <div class="box-image" style="border-radius:4%;">
                                                    <div class="image-zoom image-cover"
                                                        style="padding-top:80%;">
                                                        <img width="670" height="447"
                                                            src="{{asset('documents/website/'. $item->image)}}"
                                                            class="attachment-original size-original wp-post-image"
                                                            alt=""
                                                            srcset="{{asset('documents/website/'. $item->image)}} 670w,{{asset('documents/website/'. $item->image)}} 300w"
                                                            sizes="(max-width: 670px) 100vw, 670px">
                                                    </div>
                                                </div>
                                                <!-- .box-image -->
                                                <div class="box-text text-center">
                                                    <div class="box-text-inner blog-post-inner">


                                                        <h5 class="post-title is-large " style="color: white !important;">{{ $item->title }}</h5>
                                                        <div class="is-divider"></div>
                                                        <p class="from_the_blog_excerpt " style="color: white !important;">{{ $item->description }}
                                                        </p>



                                                    </div>
                                                    <!-- .box-text-inner -->
                                                </div>
                                                <!-- .box-text -->
                                            </div>
                                            <!-- .box -->
                                        </a>
                                        <!-- .link -->
                                    </div>
                                    <!-- .col-inner -->
                                </div>
                                 
                                @endforeach
                              
                            </div>

                            <div style="text-align:center">
                                <a style="background:url({{ asset('theme/wp-content/uploads/2017/11/line-123.jpg') }}); padding:10px 20px; border-radius:6px; color:#e0c2a6; font-weight:bold" href="{{ url('bai-viet.html') }}">Xem thêm</a>
                            </div>
                        </div>
                    </div>

                    <style scope="scope">

                    </style>
                </div>
                <div class="row row-small" id="row-1801972663">
                    <div class="col show-for-medium hide-for-small small-12 large-12">
                        <div class="col-inner">
                            <h3 style="text-align: center;"><span style="font-size: 120%;">BÀI VIẾT &#8211;
                                    TIN TỨC</span></h3>
                            <div class="gap-element" style="display:block; height:auto; padding-top:10px"
                                class="clearfix"></div>


                            <div class="row large-columns-2 medium-columns-1 small-columns-1 row-small">
                                @foreach ($news_lm5 as $item)
                                <div class="col post-item">
                                    <div class="col-inner">
                                        <a href="{{url('blog/'.ktc_str_convert($item->title).'_'.$item->id.'.html')}}"
                                            class="plain">
                                            <div
                                                class="box box-normal box-text-bottom box-blog-post has-hover">
                                                <div class="box-image" style="border-radius:4%;">
                                                    <div class="image-zoom image-cover"
                                                        style="padding-top:80%;">
                                                        <img width="670" height="447"
                                                            src="{{asset('documents/website/'. $item->image)}}"
                                                            class="attachment-original size-original wp-post-image"
                                                            alt=""
                                                            srcset="{{asset('documents/website/'. $item->image)}} 670w,{{asset('documents/website/'. $item->image)}} 300w"
                                                            sizes="(max-width: 670px) 100vw, 670px">
                                                    </div>
                                                </div>
                                                <!-- .box-image -->
                                                <div class="box-text text-center">
                                                    <div class="box-text-inner blog-post-inner">


                                                        <h5 class="post-title is-large ">{{ $item->title }}</h5>
                                                        <div class="is-divider"></div>
                                                        <p class="from_the_blog_excerpt ">{{ $item->description }}
                                                        </p>



                                                    </div>
                                                    <!-- .box-text-inner -->
                                                </div>
                                                <!-- .box-text -->
                                            </div>
                                            <!-- .box -->
                                        </a>
                                        <!-- .link -->
                                    </div>
                                    <!-- .col-inner -->
                                </div>
                                @endforeach
                                <!-- .col -->
                            </div>
                            <div style="text-align:center">
                                <a style="background:url({{ asset('theme/wp-content/uploads/2017/11/line-123.jpg') }}); padding:10px 20px; border-radius:6px; color:#e0c2a6; font-weight:bold;
                                    background: white;  color: #97221c;" href="{{ url('tin-tuc.html') }}">
                                Xem thêm</a>
                            </div>
                        </div>
                    </div>

                    <style scope="scope">

                    </style>
                </div>
            </div>
            <!-- .section-content -->


            <style scope="scope">
                #section_1273293496 {
                    padding-top: 30px;
                    padding-bottom: 30px;
                    background-color: rgb(243, 239, 246);
                }

                #section_1273293496 .section-bg.bg-loaded {
                    background: #057A45;
                }
            </style>
        </section> --}}
            {{-- 
        <section class="section show-for-small" id="section_1856181105">
            <div class="bg section-bg fill bg-fill  bg-loaded">





            </div>
            <!-- .section-bg -->

            <div class="section-content relative">

                <div class="row row-small" id="row-1386525571">
                    <div class="col show-for-small small-12 large-12">
                        <div class="col-inner">
                            <div class="gap-element" style="display:block; height:auto; padding-top:20px"
                                class="clearfix"></div>
                            <h3 style="text-align: center;"><span style="font-size: 120%;">BÀI VIẾT &#8211;
                                    TIN TỨC</span></h3>
                            <div class="gap-element" style="display:block; height:auto; padding-top:10px"
                                class="clearfix"></div>


                            <div class="row large-columns-1 medium-columns-1 small-columns-1 row-small">
                                @foreach ($news_lm5 as $item)
                                <div class="col post-item">
                                    <div class="col-inner">
                                        <a href="{{url('blog/'.ktc_str_convert($item->title).'_'.$item->id.'.html')}}"
                                            class="plain">
                                            <div
                                                class="box box-normal box-text-bottom box-blog-post has-hover">
                                                <div class="box-image" style="border-radius:4%;">
                                                    <div class="image-zoom image-cover"
                                                        style="padding-top:80%;">
                                                        <img width="670" height="447"
                                                            src="{{asset('documents/website/'. $item->image)}}"
                                                            class="attachment-original size-original wp-post-image"
                                                            alt=""
                                                            srcset="{{asset('documents/website/'. $item->image)}} 670w,{{asset('documents/website/'. $item->image)}} 300w"
                                                            sizes="(max-width: 670px) 100vw, 670px">
                                                    </div>
                                                </div>
                                                <!-- .box-image -->
                                                <div class="box-text text-center">
                                                    <div class="box-text-inner blog-post-inner">


                                                        <h5 class="post-title is-large ">{{ $item->title }}</h5>
                                                        <div class="is-divider"></div>
                                                        <p class="from_the_blog_excerpt ">{{ $item->description }}
                                                        </p>



                                                    </div>
                                                    <!-- .box-text-inner -->
                                                </div>
                                                <!-- .box-text -->
                                            </div>
                                            <!-- .box -->
                                        </a>
                                        <!-- .link -->
                                    </div>
                                    <!-- .col-inner -->
                                </div>
                                @endforeach
                            </div>
                            <div style="text-align:center">
                                <a style="background:url({{ asset('theme/wp-content/uploads/2017/11/line-123.jpg') }}); padding:10px 20px; border-radius:6px; color:#e0c2a6; font-weight:bold" href="{{ url('tin-tuc.html') }}">Xem thêm</a>
                            </div>
                        </div>
                    </div>

                    <style scope="scope">

                    </style>
                </div>
            </div>
            <!-- .section-content -->


            <style scope="scope">
                #section_1856181105 {
                    padding-top: 0px;
                    padding-bottom: 0px;
                    background-color: rgb(235, 225, 204);
                }
            </style>
        </section> --}}

            <section class="section cam-ket hide-for-small" id="section_130003913">
                <div class="bg section-bg fill bg-fill  bg-loaded">





                </div>
                <!-- .section-bg -->

                <div class="section-content relative">

                    <div class="row row-large" id="row-1888168126">
                        <div class="col medium-4 small-6 large-4">
                            <div class="col-inner">
                                <div class="gap-element" style="display:block; height:auto; padding-top:10px"
                                    class="clearfix"></div>

                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 69px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img width="100" height="100"
                                                    src="{{ asset('theme/wp-content/uploads/2017/10/icon-ship.png') }}"
                                                    class="attachment-medium size-medium" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">

                                        <p style="text-align: left;"><span
                                                style="font-size: 120%; color: #000000;"><strong>Vận chuyển toàn
                                                    quốc<br>
                                                </strong></span><span style="font-size: 80%; color: #000000;">Chúng tôi hỗ
                                                trợ vận
                                                chuyển toàn quốc cho Quý khách. Quý khách sẽ thanh toán tiền cước
                                                phí vận chuyển cho đơn vị chuyển phát!</span></p>
                                    </div>
                                </div>
                                <!-- .icon-box -->


                            </div>
                        </div>
                        <div class="col medium-4 small-6 large-4">
                            <div class="col-inner">
                                <div class="gap-element" style="display:block; height:auto; padding-top:10px"
                                    class="clearfix"></div>

                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 69px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img width="100" height="100"
                                                    src="{{ asset('theme/wp-content/uploads/2017/10/icon-2.png') }}"
                                                    class="attachment-medium size-medium" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">

                                        <p><span style="font-size: 120%;"><strong><span style="color: #000000;">Biên nhận
                                                        và kiểm
                                                        hàng</span></strong>
                                            </span><br>
                                            <span style="color: #000000;"><span
                                                    style="font-size: 11.52px; line-height: 17.28px;">Khi nhận
                                                    hàng, quý khách vui lòng kiểm tra thật kỹ và biên nhận với nhân
                                                    viên chuyển phát là hàng đã nhận hoàn toàn đúng
                                                    chuẩn.</span></span>
                                        </p>
                                    </div>
                                </div>
                                <!-- .icon-box -->


                            </div>
                        </div>
                        <div class="col medium-4 small-6 large-4">
                            <div class="col-inner">
                                <div class="gap-element" style="display:block; height:auto; padding-top:10px"
                                    class="clearfix"></div>

                                <div class="icon-box featured-box icon-box-left text-left">
                                    <div class="icon-box-img" style="width: 69px">
                                        <div class="icon">
                                            <div class="icon-inner">
                                                <img width="100" height="100"
                                                    src="{{ asset('theme/wp-content/uploads/2017/10/icon-4.png') }}"
                                                    class="attachment-medium size-medium" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">

                                        <p><span style="color: #000000;"><span style="font-size: 120%;"><strong>Hỗ trợ
                                                        khách hàng<br>
                                                    </strong></span><span style="font-size: 80%;">Chúng tôi hỗ trợ
                                                    khách hàng hết lòng, vì quyền lợi của khách hàng. Vui lòng liên
                                                    hệ Hotline: <strong>{{ $configs['site_phone'] }}</strong></span></span>
                                        </p>
                                    </div>
                                </div>
                                <!-- .icon-box -->


                            </div>
                        </div>

                        <style scope="scope">

                        </style>
                    </div>
                </div>
                <!-- .section-content -->


                <style scope="scope">
                    #section_130003913 {
                        padding-top: 10px;
                        padding-bottom: 10px;
                        background-color: rgb(250, 193, 0);
                    }
                </style>
            </section>



        </div>



    </main>
@endsection
@push('scripts')
    <script src="{{ asset('theme/https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js') }}"></script>
    <script>
        $(".home-nav_item").toggleClass("active");
        // $("#home2-nav_item").toggleClass("active");
    </script>
@endpush
