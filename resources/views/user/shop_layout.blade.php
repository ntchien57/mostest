<!DOCTYPE html>
<html dir="ltr" lang="vi">

<head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />


    @if (isset($header))
        <meta name="description" content="{{ $header['description'] }}" />
        <meta name="keywords" content="{{ $header['keyword'] }}" />
        <meta name="author" content="{{ $configs['site_title'] }}" />
        <meta name="copyright" content="{{ $configs['site_title'] }}">
        <meta property="og:image" content="{{ $header['og_image'] }}">
        <meta property="og:url" content="{{ Request::url() }}">
    @else
        <meta name="description" content="{{ $configs['site_title'] }}" />
        <meta name="keywords" content="{{ $configs['site_title'] }}" />
        <meta name="author" content="{{ $configs['site_title'] }}" />
        <meta name="copyright" content="{{ $configs['site_title'] }}">
        <meta property="og:image" content="{{ asset('images/thumb.jpg') }} }}">
        <meta property="og:url" content="{{ Request::url() }}">
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>{{ $title ? $title : $configs['site_title'] }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/wp-content/uploads/2018/05/logo.png') }}" />

    <link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com'>
    <link rel='dns-prefetch' href='//s.w.org'>
    <script type="text/javascript">
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "http:\/\/dogom.giaodienwebmau.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.9.22"
            }
        };
        ! function(e, a, t) {
            var n, r, o, i = a.createElement("canvas"),
                p = i.getContext && i.getContext("2d");

            function s(e, t) {
                var a = String.fromCharCode;
                p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0);
                e = i.toDataURL();
                return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
            }

            function c(e) {
                var t = a.createElement("script");
                t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
            }
            for (o = Array("flag", "emoji"), t.supports = {
                    everything: !0,
                    everythingExceptFlag: !0
                }, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
                if (!p || !p.fillText) return !1;
                switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
                    case "flag":
                        return s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) ? !1 : !s([55356,
                            57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128,
                            56447
                        ], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203,
                            56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447
                        ]);
                    case "emoji":
                        return !s([55358, 56760, 9792, 65039], [55358, 56760, 8203, 9792, 65039])
                }
                return !1
            }(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports
                .everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
            t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t
                .readyCallback = function() {
                    t.DOMReady = !0
                }, t.supports.everything || (n = function() {
                    t.readyCallback()
                }, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !
                    1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
                    "complete" === a.readyState && t.readyCallback()
                })), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n
                    .wpemoji)))
        }(window, document, window._wpemojiSettings);
    </script>
    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }

        .display-block {
            display: block !important;
        }



    </style>

    
   
    <link rel='stylesheet' id='dashicons-css' href='{{ asset('theme/wp-includes/css/dashicons.min.css?ver=4.9.22') }}'
        type='text/css' media='all'>
    <link rel='stylesheet' id='menu-icons-extra-css'
        href='{{ asset('theme/wp-content/plugins/ot-flatsome-vertical-menu/libs/menu-icons/css/extra.min.css?ver=0.10.2') }}'
        type='text/css' media='all'>

    <link rel='stylesheet' id='font-awesome-four-css'
        href='{{ asset('theme/wp-content/plugins/font-awesome-4-menus/css/font-awesome.min.css?ver=4.7.0') }}'
        type='text/css' media='all'>
    <link rel='stylesheet' id='ot-vertical-menu-css'
        href='{{ asset('theme/wp-content/plugins/ot-flatsome-vertical-menu/assets/css/ot-vertical-menu.css?ver=1.1.0') }}'
        type='text/css' media='all'>
    <link rel='stylesheet' id='flatsome-ionicons-css'
        href='{{ asset('theme/font-awesome/4.7.0/css/font-awesome.min.css?ver=4.9.22') }}' type='text/css'
        media='all'>
    <link rel='stylesheet' id='flatsome-icons-css'
        href='{{ asset('theme/wp-content/themes/flatsome/assets/css/fl-icons.css?ver=3.3') }}' type='text/css'
        media='all'>
    <link rel='stylesheet' id='flatsome-main-css'
        href='{{ asset('theme/wp-content/themes/flatsome/assets/css/flatsome.css?ver=3.5.3') }}' type='text/css'
        media='all'>
    <link rel='stylesheet' id='flatsome-shop-css'
        href='{{ asset('theme/wp-content/themes/flatsome/assets/css/flatsome-shop.css?ver=3.5.3') }}' type='text/css'
        media='all'>
    <link rel='stylesheet' id='flatsome-style-css'
        href='{{ asset('theme/wp-content/themes/cake/style.css?ver=3.5.3') }}' type='text/css' media='all'>
    <script type='text/javascript' src='{{ asset('theme/wp-includes/js/jquery/jquery.js?ver=1.12.4') }}'></script>
    <script type='text/javascript' src='{{ asset('theme/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1') }}'>
    </script>

    <style>
        .bg {
            opacity: 0;
            transition: opacity 1s;
            -webkit-transition: opacity 1s;
        }

        .bg-loaded {
            opacity: 1;
        }
    </style>

    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ["Cabin:regular,700", "Cabin:regular,regular", "Cabin:regular,regular", "Dancing+Script", ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    
    <style id="custom-css" type="text/css">
        :root {
            --primary-color: #FEB041;
        }

        /* Site Width */

        .full-width .ubermenu-nav,
        .container,
        .row {
            max-width: 1230px
        }

        .row.row-collapse {
            max-width: 1200px
        }

        .row.row-small {
            max-width: 1222.5px
        }

        .row.row-large {
            max-width: 1260px
        }

        .header-main {
            height: 122px
        }

        #logo img {
            max-height: 122px
        }

        #logo {
            width: 210px;
        }

        #logo img {
            padding: 1px 0;
        }

        .header-bottom {
            min-height: 50px
        }

        .header-top {
            min-height: 28px
        }

        .has-transparent+.page-title:first-of-type,
        .has-transparent+#main>.page-title,
        .has-transparent+#main>div>.page-title,
        .has-transparent+#main .page-header-wrapper:first-of-type .page-title {
            padding-top: 202px;
        }

        .header.show-on-scroll,
        .stuck .header-main {
            height: 70px !important
        }

        .stuck #logo img {
            max-height: 70px !important
        }

        .search-form {
            width: 85%;
        }

        .header-bg-color,
        .header-wrapper {
            background-color: rgba(255, 255, 255, 0.51)
        }

        .header-bg-image {
            background-image: url({{ asset('theme/wp-content/uploads/2017/11/bg4.jpg') }});
        }

        .header-bg-image {
            background-repeat: no-repeat;
        }

        .header-bottom {
            background-color: #FAC100
        }

        .header-main .nav>li>a {
            line-height: 25px
        }

        .stuck .header-main .nav>li>a {
            line-height: 50px
        }

        .header-bottom-nav>li>a {
            line-height: 16px
        }

        @media (max-width: 549px) {
            .header-main {
                height: 70px
            }

            #logo img {
                max-height: 70px
            }
        }

        .header-top {
            background-color: #F3EFF6 !important;
        }

        /* Color */

        .accordion-title.active,
        .has-icon-bg .icon .icon-inner,
        .logo a,
        .primary.is-underline,
        .primary.is-link,
        .badge-outline .badge-inner,
        .nav-outline>li.active>a,
        .nav-outline>li.active>a,
        .cart-icon strong,
        [data-color='primary'],
        .is-outline.primary {
            color: #FEB041;
        }

        /* Color !important */

        [data-text-color="primary"] {
            color: #FEB041 !important;
        }

        /* Background */

        .scroll-to-bullets a,
        .featured-title,
        .label-new.menu-item>a:after,
        .nav-pagination>li>.current,
        .nav-pagination>li>span:hover,
        .nav-pagination>li>a:hover,
        .has-hover:hover .badge-outline .badge-inner,
        button[type="submit"],
        .button.wc-forward:not(.checkout):not(.checkout-button),
        .button.submit-button,
        .button.primary:not(.is-outline),
        .featured-table .title,
        .is-outline:hover,
        .has-icon:hover .icon-label,
        .nav-dropdown-bold .nav-column li>a:hover,
        .nav-dropdown.nav-dropdown-bold>li>a:hover,
        .nav-dropdown-bold.dark .nav-column li>a:hover,
        .nav-dropdown.nav-dropdown-bold.dark>li>a:hover,
        .is-outline:hover,
        .tagcloud a:hover,
        .grid-tools a,

        .box-badge:hover .box-text,
        input.button.alt,
        .nav-box>li>a:hover,
        .nav-box>li.active>a,
        .nav-pills>li.active>a,
        .current-dropdown .cart-icon strong,
        .cart-icon:hover strong,
        .nav-line-bottom>li>a:before,
        .nav-line-grow>li>a:before,
        .nav-line>li>a:before,
        .banner,
        .header-top,
        .slider-nav-circle .flickity-prev-next-button:hover svg,
        .slider-nav-circle .flickity-prev-next-button:hover .arrow,
        .primary.is-outline:hover,
        .button.primary:not(.is-outline),
       
        input[type='reset'].button,
        input[type='button'].primary,
        .badge-inner {
            background-color: #FEB041;
        }

        input[type='submit'].primary,
        input[type='submit'].primary,
        input[type='submit']:not(.is-form){
            background-color: #057A45;

        }

        /* Border */

        .nav-vertical.nav-tabs>li.active>a,
        .scroll-to-bullets a.active,
        .nav-pagination>li>.current,
        .nav-pagination>li>span:hover,
        .nav-pagination>li>a:hover,
        .has-hover:hover .badge-outline .badge-inner,
        .accordion-title.active,
        .featured-table,
        .is-outline:hover,
        .tagcloud a:hover,
        blockquote,
        .has-border,
        .cart-icon strong:after,
        .cart-icon strong,
        .blockUI:before,
        .processing:before,
        .loading-spin,
        .slider-nav-circle .flickity-prev-next-button:hover svg,
        .slider-nav-circle .flickity-prev-next-button:hover .arrow,
        .primary.is-outline:hover {
            border-color: #FEB041
        }

        .nav-tabs>li.active>a {
            border-top-color: #FEB041
        }

        .widget_shopping_cart_content .blockUI.blockOverlay:before {
            border-left-color: #FEB041
        }

        .woocommerce-checkout-review-order .blockUI.blockOverlay:before {
            border-left-color: #FEB041
        }

        /* Fill */

        .slider .flickity-prev-next-button:hover svg,
        .slider .flickity-prev-next-button:hover .arrow {
            fill: #FEB041;
        }

        /* Background Color */

        [data-icon-label]:after,
        .secondary.is-underline:hover,
        .secondary.is-outline:hover,
        .icon-label,
        .button.secondary:not(.is-outline),
        .button.alt:not(.is-outline),
        .badge-inner.on-sale,
        .button.checkout,
        .single_add_to_cart_button {
            background-color: #744C29;
        }

        /* Color */

        .secondary.is-underline,
        .secondary.is-link,
        .secondary.is-outline,
        .stars a.active,
        .star-rating:before,
        .woocommerce-page .star-rating:before,
        .star-rating span:before,
        .color-secondary {
            color: #744C29
        }

        /* Color !important */

        [data-text-color="secondary"] {
            color: #744C29 !important;
        }

        /* Border */

        .secondary.is-outline:hover {
            border-color: #744C29
        }

        body {
            font-size: 90%;
        }

        @media screen and (max-width: 549px) {
            body {
                font-size: 100%;
            }
        }

        body {
            font-family: "Cabin", sans-serif
        }

        body {
            font-weight: 0
        }

        body {
            color: #474747
        }

        .nav>li>a {
            font-family: "Cabin", sans-serif;
        }

        .nav>li>a {
            font-weight: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font,
        .off-canvas-center .nav-sidebar.nav-vertical>li>a {
            font-family: "Cabin", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font,
        .banner h1,
        .banner h2 {
            font-weight: 700;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .heading-font {
            color: #0A0A0A;
        }

        button,
        .button {
            text-transform: none;
        }

        .nav>li>a,
        .links>li>a {
            text-transform: none;
        }

        .alt-font {
            font-family: "Dancing Script", sans-serif;
        }

        .header:not(.transparent) .header-bottom-nav.nav>li>a {
            color: #D3D3D3;
        }

        .header:not(.transparent) .header-bottom-nav.nav>li>a:hover,
        .header:not(.transparent) .header-bottom-nav.nav>li.active>a,
        .header:not(.transparent) .header-bottom-nav.nav>li.current>a,
        .header:not(.transparent) .header-bottom-nav.nav>li>a.active,
        .header:not(.transparent) .header-bottom-nav.nav>li>a.current {
            color: #FFFFFF;
        }

        .header-bottom-nav.nav-line-bottom>li>a:before,
        .header-bottom-nav.nav-line-grow>li>a:before,
        .header-bottom-nav.nav-line>li>a:before,
        .header-bottom-nav.nav-box>li>a:hover,
        .header-bottom-nav.nav-box>li.active>a,
        .header-bottom-nav.nav-pills>li>a:hover,
        .header-bottom-nav.nav-pills>li.active>a {
            color: #FFF !important;
            background-color: #FFFFFF;
        }

        a {
            color: #744C29;
        }

        a:hover {
            color: #FEB041;
        }

        .tagcloud a:hover {
            border-color: #FEB041;
            background-color: #FEB041;
        }

        .widget a {
            color: #0A0202;
        }

        .widget a:hover {
            color: #744C29;
        }

        .widget .tagcloud a:hover {
            border-color: #744C29;
            background-color: #744C29;
        }

        .badge-inner.on-sale {
            background-color: #00A502
        }

        .badge-inner.new-bubble {
            background-color: #079600
        }

        .star-rating span:before,
        .star-rating:before,
        .woocommerce-page .star-rating:before {
            color: #DD9933
        }

        @media screen and (min-width: 550px) {
            .products .box-vertical .box-image {
                min-width: 300px !important;
                width: 300px !important;
            }
        }

        .absolute-footer,
        html {
            background-color: #3A3A3A
        }

        .page-title-small+main .product-container>.row {
            padding-top: 0;
        }

        .label-new.menu-item>a:after {
            content: "New";
        }

        .label-hot.menu-item>a:after {
            content: "Hot";
        }

        .label-sale.menu-item>a:after {
            content: "Sale";
        }

        .label-popular.menu-item>a:after {
            content: "Popular";
        }
    </style>
    <style type="text/css" id="wp-custom-css">
        /*
Bạn có thể thêm CSS ở đây.

Nhấp chuột vào biểu tượng trợ giúp phía trên để tìm hiểu thêm.
*/

        #wide-nav>.flex-row>.flex-left {
            width: 25%;
            max-width: 294px;
            margin-right: 15px;
        }

        #mega-menu-wrap {
            background-color: #057A45;
            height: 50px;
        }

        #mega-menu-title {
            padding: 13px 0 10px 15px;
        }

        #mega_menu>li>a {
            padding-left: 10px
        }

        .menu-item img._before {
            margin-right: 10px
        }

        #mega_menu>li>a>span {
            color: black;
            font-size: 15px
        }

        #mega_menu li a {
            padding: 10.3px 15px;
        }

        .header:not(.transparent) .header-bottom-nav.nav>li>a {
            color: #f7ddc5;
            font-weight: normal;
        }

        #mega-menu-title {
            font-family: "cabin", sans-serif;
            color: #fff;
            font-size: 17px;
        }

        .slider .tin-tuc .box-text h5 {
            font-weight: normal;
            color: #464646;
        }

        .box-blog-post .is-divider {
            display: none
        }

        .slider .tin-tuc .col {
            padding: 0 15px 0px;
        }

        .slider .tin-tuc .box-vertical .box-text {
            padding-right: 0;
            padding-left: 10px;
            vertical-align: top;
            padding-top: .7em;
            padding-bottom: 11px;
            text-align: justify
        }

        .slider .tin-tuc .box-vertical {
            padding-bottom: 1px
        }

        .nav-dark .form-flat input:not([type="submit"]) {
            font-size: 15px;
            background-color: #ffff !important;
            border-color: rgba(255, 255, 255, 0.09);
            color: #a33a3e;
            height: 35px;
            border-radius: 6px;
            margin-left: 3px;
        }

        .sp-noi-bat .title .col {
            padding: 0 15px 10px;
        }

        .badge-container {
            margin: 5px
        }

        .badge-inner.on-sale {
            background-color: #00A502;
            border-radius: 99px;
        }

        .price-wrapper .price ins span {
            color: #bc0000;
            font-size: 15px
        }

        .price-wrapper del span {
            color: gray;
            font-size: 15px
        }

        .title-wrapper a {
            color: #744c29
        }

        .title-wrapper a:hover {
            color: black
        }

        .price-wrapper span.amount {
            font-size: 15px
        }

        span.amount {
            color: #bc0000
        }

        .title-wrapper {
            height: 50px;
            overflow: hidden;
            font-size: 15px
        }

        .sp-noi-bat .product .box-text {
            padding-bottom: 0;
        }

        .sp-noi-bat .product .flickity-prev-next-button.next,
        .sp-noi-bat .product .flickity-prev-next-button.previous {
            top: 20px
        }

        .sp-noi-bat .product .flickity-viewport>.flickity-slider>.col {
            padding: 10px;
            background: white
        }

        .sp-noi-bat .product .banner-image {
            padding: 0
        }

        .catelogy .row .col {
            padding: 0 9.8px 0px;
        }

        .catelogy .row .sidebar {
            border: 1px solid #ececec;
            padding: 0px
        }

        .catelogy .row .sidebar a {
            color: black
        }

        .catelogy .row .sidebar a span {
            color: #e0c2a6
        }

        .catelogy .row .sidebar ul.menu>li>a {
            padding: 8px 0
        }

        .catelogy .row .sidebar ul.menu>li {
            margin-left: 10px;
            margin-right: 10px
        }

        .catelogy .row .sidebar .col-inner ul li {
            margin-left: 10px;
        }

        .catelogy .row .product {
            border-top: 1px solid #ececec;
            border-right: 1px solid #ececec;
            border-bottom: 1px solid #ececec;
            padding-top: 3px
        }

        .catelogy .row .product .col {
            border: none;
            padding-top: 0px
        }

        .cam-ket .row-large>.col {
            padding: 0 30px 10px;
        }

        .footer .row .thong-tin-chung a,
        .footer .row .danh-muc a {
            color: #474747
        }

        .footer .row .danh-muc a:hover {
            color: #FEB041
        }

        .footer .row .danh-muc .col-inner ul li {
            margin-left: 0;
            border-bottom: 1px dotted #d4d4d4;
        }

        .footer .row .san-pham .row-small>.col {
            padding: 0 9.8px 0px;
        }

        .footer .row .san-pham .title-wrapper a {
            font-size: 14px
        }

        .footer .row-small>.col {
            padding: 0 9.8px 0px;
        }

        .footer .row .san-pham .badge-container {
            display: none
        }

        .footer .row p {
            margin-bottom: 0
        }

        .breadcrumbs {
            text-transform: none;
        }

        .breadcrumb a {
            color: rgb(250, 193, 0)
        }

        .product-main .price-wrapper span.amount {
            font-size: 25px
        }

        .product-footer .woocommerce-tabs>.nav-line:not(.nav-vertical) {
            background: #f3f3f3;
            border-bottom: 1px solid #fac100;
        }

        .product-footer .nav>li {
            margin: 0;
            font-size: 20px;
        }

        .product-footer .nav>li a {
            padding-left: 10px;
            padding-right: 10px;
            font-weight: normal
        }

        .product-footer .nav>li.active>a {
            background: #fac100;
        }

        .note-san-pham {
            margin-top: 10px;
            border: 1px solid #dadada;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .product-main {
            padding: 0px 0;
        }

        .product-main .col {
            padding: 0 15px 10px;
        }

        span.widget-title {
            font-size: 18px;
            letter-spacing: 0;
            color: black;
        }

        #product-sidebar .adress-sidebar {
            border: 1px solid #dadada;
            padding: 10px;
            border-radius: 5px
        }

        .article-inner .entry-image img,
        footer.entry-meta {
            display: none
        }

        .article-inner .badge.post-date {
            display: none
        }

        @media (max-width: 549px) {
            .header-top {
                display: none
            }

            .slider .tin-tuc {
                display: none !important
            }
        }

        .header-top {
            background-color: rgb(148 28 30 / 50%) !important
        }

        .nav.nav-small>li>a {
            color: black;
            font-size: 13px
        }

        .header-bottom {
            background: #057A45;
        }

        .html .social-icons {
            color: black;
        }

        #mega_menu ul.sub-menu li a {
            font-size: 15px
        }

        ul.menu>li ul {
            width: 105%
        }

        .tieu-de .img-title {
            padding-right: 5px;
            margin-top: -5px;
            width: 3%;
            float: left;
        }

        .tieu-de .text {
            margin-top: -8px;
            font-size: 16px;
            color: black;
            width: 90%;
            float: left;
        }

        .catelogy .row .sidebar h3 {
            text-align: center;
            background: url({{ asset('theme/wp-content/uploads/2017/11/line-123.jpg') }});
            line-height: 45px;
            font-size: 15px;
            color: #f0d5bc
        }

        .tabbed-content .nav {
            border-bottom: 1px solid #eaeaea;
        }

        .tabbed-content .nav>li>a {
            padding-left: 7px;
            padding-right: 7px
        }

        .tabbed-content .nav>li.active>a {
            color: red
        }

        .product_meta>span {
            font-size: 14px
        }

        .page-wrapper {
            padding-top: 0px;
            padding-bottom: 0px
        }

        .page-wrapper .col {
            padding: 0 15px 0px;
        }
    </style>

<style>
    input::placeholder{
        color: #a33a3e !important;
    }
</style>

    @stack('style')



</head>



<body
    class="home page-template page-template-page-blank page-template-page-blank-php page page-id-2 header-shadow lightbox nav-dropdown-has-arrow">

    {{-- @include($theme. '.components._contact-button') --}}

    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

    <div id="wrapper">


        <header id="header" class="header has-sticky sticky-jump">
            <div class="header-wrapper">
                <div id="top-bar" class="header-top hide-for-sticky">
                    <div class="flex-row container">
                        <div class="flex-col hide-for-medium flex-left">
                            <ul class="nav nav-left medium-nav-center nav-small  nav-divided">
                                <li id="menu-item-127"
                                    class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-127"><a
                                        src="{{ url('chinh-sach-doi-tra-hang.html') }}" class="nav-top-link">Miễn phí giao hàng</a></li>
                                <li id="menu-item-128"
                                    class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-128"><a
                                        src="{{ url('chinh-sach-giao-hang.html') }}" class="nav-top-link">80.000 tựa sách</a></li>
                                        <li id="menu-item-128"
                                    class="menu-item menu-item-type-post_type menu-item-object-page  menu-item-128"><a
                                        src="{{ url('chinh-sach-giao-hang.html') }}" class="nav-top-link">VinabookReader</a></li>
                            </ul>
                        </div>
                        <!-- flex-col left -->

                        <div class="flex-col hide-for-medium flex-center">
                            <ul class="nav nav-center nav-small  nav-divided">
                            </ul>
                        </div>
                        <!-- center -->

                        <div class="flex-col hide-for-medium flex-right">
                            <ul class="nav top-bar-nav nav-right nav-small  nav-divided">

                                <li class="html header-social-icons ml-0">
                                    <div class="social-icons follow-icons "><a href="#" target="_blank"
                                            data-label="Facebook" rel="nofollow" class="icon plain facebook tooltip"
                                            title="Follow on Facebook"><i class="icon-facebook"></i></a><a
                                            href="#" target="_blank" rel="nofollow" data-label="Instagram"
                                            class="icon plain  instagram tooltip" title="Follow on Instagram"><i
                                                class="icon-instagram"></i></a><a href="#" target="_blank"
                                            data-label="Twitter" rel="nofollow" class="icon plain  twitter tooltip"
                                            title="Follow on Twitter"><i class="icon-twitter"></i></a><a
                                            href="mailto:your@email" data-label="E-mail" rel="nofollow"
                                            class="icon plain  email tooltip" title="Send us an email"><i
                                                class="icon-envelop"></i></a></div>
                                </li>
                            </ul>
                        </div>
                        <!-- .flex-col right -->

                        <div class="flex-col show-for-medium flex-grow">
                            <ul class="nav nav-center nav-small mobile-nav  nav-divided">
                            </ul>
                        </div>

                    </div>
                    <!-- .flex-row -->
                </div>
                <!-- #header-top -->
                <div id="masthead" class="header-main hide-for-sticky" style="background: #ccc">
                    <div class="header-inner flex-row container logo-left medium-logo-center" role="navigation">

                        <!-- Logo -->
                        <div id="logo" class="flex-col logo" style="text-align: center;justify-content: center; display: flex;">
                            <!-- Header logo -->
                            <a href="{{ url('/') }}" title="" rel="home"
                            style="border-radius: 10px;">
                                <img width="210" height="122"
                                    src="{{ asset('images/logo.png') }}"
                                    class="header_logo header-logo" alt=" "><img
                                    width="210" height="122"
                                    src="{{ asset('images/logo.png') }}"
                                    class="header-logo-dark" alt=""></a>
                        </div>                 

                        <!-- Mobile Left Elements -->
                        <div class="flex-col show-for-medium flex-left">
                            <ul class="mobile-nav nav nav-left ">
                                <li class="nav-icon has-icon">
                                    <a href="#" data-open="#main-menu" data-pos="left"
                                        data-bg="main-menu-overlay" data-color="" class="is-small"
                                        aria-controls="main-menu" aria-expanded="false">

                                        <i style="color: white !important;" class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Left Elements -->
                        <div class="flex-col hide-for-medium flex-left
                flex-grow">
                            <ul class="header-nav header-nav-main nav nav-left  nav-uppercase">
                                <li class="header-block">
                                    <div class="header-block-block-1">
                                        <div class="row row-small" id="row-1599601476">

                                            <div class="col medium-6 small-12 large-6">
                                                <div class="col-inner">

                                                    
                                                </div>
                                            </div>
                                            <div class="col medium-3 small-12 large-3">
                                                <div class="col-inner">

                                                    <div class="gap-element"
                                                        style="display:block; height:auto; padding-top:30px"
                                                        class="clearfix"></div>

                                                    <a href="{{ url('gio-hang.html') }}">
                                                        <div class="icon-box featured-box icon-box-left text-left">
                                                            <div class="icon-box-img" style="width: 46px">
                                                                <div class="icon">
                                                                    <div class="icon-inner">
                                                                        <img width="300" height="300"
                                                                            src="{{ asset('theme/wp-content/uploads/2017/11/giao-hang-icon-300x300.png') }}"
                                                                            class="attachment-medium size-medium"
                                                                            alt=""
                                                                            srcset="{{ asset('theme/wp-content/uploads/2017/11/giao-hang-icon-300x300.png ') }}"
                                                                            sizes="(max-width: 300px) 100vw, 300px">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="icon-box-text last-reset">


                                                                <p style="text-align: left;"><span
                                                                        style="color: #ffffff; font-size: 110%;"><strong>GIỎ
                                                                            HÀNG
                                                                            ({{ $cartCount }})</strong></span><br><span
                                                                        style="font-size: 90%; color: #ffffff;">Mua
                                                                        sắm</span></p>

                                                            </div>
                                                        </div>
                                                    </a>

                                                    <!-- .icon-box -->



                                                </div>
                                            </div>
                                            <div class="col medium-3 small-12 large-3">
                                                <div class="col-inner">

                                                    <div class="gap-element"
                                                        style="display:block; height:auto; padding-top:30px"
                                                        class="clearfix"></div>

                                                    <div class="icon-box featured-box icon-box-left text-left">
                                                        <div class="icon-box-img" style="width: 46px">
                                                            <div class="icon">
                                                                <div class="icon-inner">
                                                                    <img width="300" height="300"
                                                                        src="{{ asset('theme/wp-content/uploads/2017/11/hotline-icon2-300x300.png') }}"
                                                                        class="attachment-medium size-medium"
                                                                        alt=""
                                                                        srcset="{{ asset('theme/wp-content/uploads/2017/11/hotline-icon2-300x300.png') }} 300w, {{ asset('theme/wp-content/uploads/2017/11/hotline-icon2-150x150.png') }} 150w, {{ asset('theme/wp-content/uploads/2017/11/hotline-icon2-180x180.png') }} 180w, {{ asset('theme/wp-content/uploads/2017/11/hotline-icon2.png') }} 338w"
                                                                        sizes="(max-width: 300px) 100vw, 300px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="icon-box-text last-reset">


                                                            <p style="text-align: left;"><span
                                                                    style="font-size: 110%; color: #ffffff;"><strong>{{ $configs['site_phone_long'] }}</strong></span><br><span
                                                                    style="font-size: 90%; color: #ffffff;">Hotline tư
                                                                    vấn miễn phí</span></p>

                                                        </div>

                                                        
                                                    </div>
                                                    <!-- .icon-box -->



                                                </div>
                                            </div>


                                            <style scope="scope">

                                            </style>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Right Elements -->
                        <div class="flex-col hide-for-medium flex-right">
                            <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                            </ul>
                        </div>

                        <!-- Mobile Right Elements -->
                        <div class="flex-col show-for-medium flex-right">
                            <ul class="mobile-nav nav nav-right ">
                                <li class="cart-item has-icon">

                                    <a href="{{ url('gio-hang.html') }}"
                                        class="header-cart-link off-canvas-toggle nav-top-link is-small"
                                        data-open="" data-class="off-canvas-cart" title="Giỏ hàng"
                                        data-pos="right">

                                        <span class="cart-icon image-icon">
                                            <strong>{{ $cartCount }}</strong>
                                        </span>
                                    </a>

                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- .header-inner -->

                </div>
                <!-- .header-main -->
                <div id="wide-nav" class="header-bottom wide-nav nav-dark flex-has-center hide-for-medium">
                    <div class="flex-row container">

                        <div class="flex-col hide-for-medium flex-left">
                            <ul class="nav header-nav header-bottom-nav nav-left  nav-size-xlarge nav-uppercase">
                                <div id="mega-menu-wrap" class="ot-vm-click">
                                    <div id="mega-menu-title">
                                        <i class="icon-menu"></i> DANH MỤC SÁCH
                                    </div>
                                    <ul id="mega_menu" class="menu">
                                        @foreach ($categories as $category)
                                            @if (count($category->getChildrens($category->id)) > 0)
                                                <li id="menu-item-209"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-209">
                                                    <a
                                                        href="{{ url('shop/' . ktc_str_convert($category->name) . '_' . $category->id . '.html') }}"><img
                                                            src="{{ asset('theme/wp-content/uploads/2017/11/icon-dot.png') }}"
                                                            class="_mi _before _svg"
                                                            aria-hidden="true"><span>{{ $category->name }}</span></a>
                                                    <ul class="sub-menu">
                                                        @foreach ($category->getChildrens($category->id) as $cateChild)
                                                            <li id="menu-item-812"
                                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-812">
                                                                <a
                                                                    href="{{ url('shop/' . ktc_str_convert($cateChild->name) . '_' . $cateChild->id . '.html') }}">{{ $cateChild->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li id="menu-item-209"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-209">
                                                    <a
                                                        href="{{ url('shop/' . ktc_str_convert($category->name) . '_' . $category->id . '.html') }}"><img
                                                            src="{{ asset('theme/wp-content/uploads/2017/11/icon-dot.png') }}"
                                                            class="_mi _before _svg"
                                                            aria-hidden="true"><span>{{ $category->name }}</span></a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </ul>
                        </div>
                        <!-- flex-col -->

                       
                        <!-- flex-col -->

                        <div class="flex-col hide-for-medium flex-center flex-grow" style="flex:2; padding-left:40px">
                            <ul class="nav header-nav header-bottom-nav nav-size-xlarge nav-uppercase">
                                <li class="header-search-form search-form html relative has-icon" >
                                    <div class="header-search-form-wrapper">
                                        <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                            <form method="get" class="searchform"
                                                action="{{ url('tim-kiem.html') }}">
                                                <div class="flex-row relative">
                                                    <div class="flex-col flex-grow">
                                                        <input oninput="this.setAttribute('value',this.value)"
                                                            type="text" class="search-field mb-0" name="keyword"
                                                            value="" placeholder="Nhập sách bạn cần tìm?..." style="">
                                                        {{-- <input type="hidden" name="post_type" value="product"> --}}
                                                    </div>
                                                    <!-- .flex-col -->
                                                    <div class="flex-col">
                                                        <button type="submit"
                                                            class="ux-search-submit submit-button secondary button icon mb-0">
                                                            <i style="color: #a33a3e" class="icon-search"></i> </button>
                                                    </div>
                                                    <!-- .flex-col -->
                                                </div>
                                                <!-- .flex-row -->
                                                <div class="live-search-results text-left z-top"></div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="flex-col hide-for-medium flex-grow" style="flex:1; padding-left: 10%">
                            <ul class="nav header-nav header-bottom-nav nav-size-xlarge nav-uppercase">
                                <li class="header-search-form search-form html relative has-icon" >
                                    <div class="header-search-form-wrapper">
                                        <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                            @if (isset(Auth::user()->name))
                                            <div>
                                                <span style="font-weight:bold; font-size:13px; color: #fff">Xin chào, {{ Auth::user()->name }} /</span> <a style="font-weight:bold; font-size:13px; color: #fff" href="{{ url('dang-xuat.html') }}">Đăng xuất</a> <br>
                                                 <a style="font-weight:bold; font-size:13px; color: #fff" href="{{ url('profile.html') }}">Lịch sử mua hàng</a>
                                            </div>
                                            @else
                                            <a style="font-weight:bold; font-size:17px; color: #fff" href="{{ url('dang-nhap.html') }}">Đăng nhập <span>/</span></a> 
                                            <a style="font-weight:bold; font-size:17px; color: #fff" href="{{ url('dang-ky.html') }}">Đăng ký</a>  
                                            @endif
                                           
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- flex-col -->

                        

                    </div>
                    <!-- .flex-row -->
                </div>
                <!-- .header-bottom -->

                <div class="header-bg-container fill">
                    <div class="header-bg-image fill"></div>
                    <div class="header-bg-color fill"></div>
                </div>
                <!-- .header-bg-container -->
            </div>
            <!-- header-wrapper-->
        </header>




        @if ($configs['site_status'])
            @yield('notice')
            @yield('breadcrumb')
            @yield('content')
        @else
            <div id="columns" class="container" style="color:red;text-align: center;">
                <img src="{{ asset('theme/images/maintenance.png') }}"><br>
                <h3><i class="fas fa-exclamation"></i>Xin lỗi, website đang bảo trì!</h3>
                <!-- /.col -->
            </div>
        @endif

        <!-- #main -->

        <footer id="footer" class="footer-wrapper">
       

            <section class="section footer" id="section_934148317">
                <div class="bg section-bg fill bg-fill  bg-loaded">





                </div>
                <!-- .section-bg -->

                <div class="section-content relative">


                    <div class="row row-small row" id="row-24677237">

                        <div class="col hide-for-small medium-3 small-6 large-3">
                            <div class="col-inner">
                                <a href="{{ url('/') }}" title="" rel="home">
                                    <img width="210" height="122"
                                        src="{{ asset('images/logo.png') }}"
                                        class="header_logo header-logo" alt="Mẫu website Gốm Bát Tràng "><img
                                        width="210" height="122"
                                        src="{{ asset('images/logo.png') }}"
                                        class="header-logo-dark" alt="Mẫu website Gốm Bát Tràng "></a>
                              
                                {{-- <p style="color: #a33a3e"><strong>GỐM SỨ BÁT TRÀNG HOA HỒNG </strong></p>
                                <p>- Địa chỉ: {{ $configs['site_address'] }}</p>
                                <p>- Điện thoại: {{ $configs['site_phone'] }}</p>
                                <p>- Email: {{ $configs['site_email'] }}</p>
                                <p> </p> --}}

                                {{-- <div id="fb-root"></div>
                                <p> 
                                    <script>
                                        (function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1058228637573834";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>
                                </p>
                                <div class="fb-page" data-href="https://www.facebook.com/FacebookVietnam/"
                                    data-width="340" data-hide-cover="false" data-show-facepile="true"></div> --}}

                            </div>
                        </div>
                        {{-- <div class="col show-for-small small-12 large-12">
                            <div class="col-inner">

                                <a href="{{ url('/') }}" title="" rel="home">
                                    <img width="210" height="122"
                                        src="{{ asset('theme/wp-content/uploads/2018/05/logo.png') }}"
                                        class="header_logo header-logo" alt="Mẫu website Gốm Bát Tràng "><img
                                        width="210" height="122"
                                        src="{{ asset('theme/wp-content/uploads/2018/05/logo.png') }}"
                                        class="header-logo-dark" alt="Mẫu website Gốm Bát Tràng "></a>
                                <p><strong>GỐM SỨ BÁT TRÀNG HOA HỒNG </strong></p>
                                <p>- Địa chỉ: {{ $configs['site_address'] }}</p>
                                <p>- Điện thoại: {{ $configs['site_phone'] }}</p>
                                <p>- Email: {{ $configs['site_email'] }}</p>

                            </div>
                        </div> --}}
                        <div class="col thong-tin-chung hide-for-small medium-3 small-6 large-3" style="padding-left:50px">
                            <div class="col-inner">

                                <h3><span style="color: #000000;">THÔNG TIN </span></h3>
                                <p><span style="color: #000000;"><a title="Giới thiệu Công ty"
                                            href="{{ url('gioi-thieu.html') }}">Giới
                                            thiệu<br>
                                        </a><a title="Năng lực sản xuất" href="{{ url('tin-tuc.html') }}">Tin tức<br>
                                        </a><a title="Thư ngỏ đối tác" href="{{ url('lien-he.html') }}">Liên hệ<br></a>
                                        <a title="Thư ngỏ đối tác" href="{{ url('tai-khoan-ngan-hang.html') }}">Tài khoản ngân hàng<br></a>
                                </p>
                                

                            </div>
                        </div>
                        {{-- <div class="col thong-tin-chung show-for-small small-6 large-12">
                            <div class="col-inner">

                                <h3><span style="color: #000000;">Thông tin chung</span></h3>
                                <p><span style="color: #000000;"><a title="Giới thiệu Công ty"
                                            href="http://giuseart.com/">Giới thiệu Công ty<br>
                                        </a><a title="Năng lực sản xuất" href="http://giuseart.com/">Năng lực sản
                                            xuất<br>
                                        </a><a title="Thư ngỏ đối tác" href="http://giuseart.com/">Thư ngỏ đối
                                            tác<br>
                                        </a></span><a href="#">Bán hàng</a><br>
                                    <a href="#">Hướng dẫn đổi trả hàng</a>
                                </p>
                                <h3><span style="color: #000000;">Hướng dẫn</span></h3>
                                <p><a title="Hướng dẫn đặt hàng" href="http://giuseart.com/">Hướng dẫn đặt
                                        hàng</a><br>
                                    <a title="Hình thức thanh toán" href="http://giuseart.com/">Hình thức thanh
                                        toán</a><br>
                                    <a title="Quy trình thực hiện" href="http://giuseart.com/">Quy trình thực
                                        hiện<br>
                                    </a><a href="http://mypham.ninhbinhweb.com/#">Dịch vụ chuyển SHIP COD</a><br>
                                    <a href="#">Đăng ký đại lý</a>
                                </p>

                            </div>
                        </div> --}}
                        <div class="col danh-muc hide-for-small medium-3 small-6 large-3">
                            <div class="col-inner">

                                
                                <h3><span style="color: #000000;">CHÍNH SÁCH CHUNG</span></h3>
                                <p><span style="color: #000000;"><a title="Giới thiệu Công ty"
                                            href="{{ url('chinh-sach-bao-hanh.html') }}">Chính sách bảo hành<br>
                                        </a><a title="Năng lực sản xuất" href="{{ url('chinh-sach-doi-moi.html') }}">Chính sách đổi mới<br>
                                        </a><a title="Thư ngỏ đối tác" href="{{ url('chinh-sach-van-chuyen.html') }}">Chính sách vận chuyển<br></a>
                                </p>
                                <h3 style="margin-top:10px"><span style="color: #000000; ">HỖ TRỢ KHÁCH HÀNG</span></h3>
                                <p>
                                    
                                        <a title=""
                                            href="{{ url('mua-hang-online.html') }}">Mua hàng online</a><br>
            

                                </p>


                            </div>
                        </div>
                        <div class="col san-pham hide-for-small medium-3 small-6 large-3">
                            <div class="col-inner">

                                <h3><span style="color: #000000;">BẢN ĐỒ</span></h3>


                              

                            </div>
                        </div>


                        <style scope="scope">

                        </style>
                    </div>

                </div>
                <!-- .section-content -->


                <style scope="scope">
                    #section_934148317 {
                        padding-top: 30px;
                        padding-bottom: 30px;
                        background-color: rgb(238, 238, 238);
                    }
                </style>
            </section>

            {{-- <div class="absolute-footer dark medium-text-center small-text-center" style="background: #057A45">
                <div class="container clearfix">
                    <div class="row" style="color:#fff">
                        <div class="col large-4" style="padding-bottom: 0px; display:flex">
                            <i style="font-size:42px; padding-right:16px" class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>
                                <span style="font-weight:bold; font-size:16px">SHOWROM</span> <br>
                                <span>{{ $configs['site_address'] }} &nbsp; <a style="color: orange" href="https://goo.gl/maps/RXvbh6ewpNRut3sEA?coh=178571&entry=tt">[Xem bản đồ]</a> </span>
                            </p>
                        </div>
                        <div class="col large-4" style="padding-bottom: 0px; display:flex">
                            <i style="font-size:42px; padding-right:16px" class="fa fa-phone-square" aria-hidden="true"></i>
                            <p style="">
                                <span style="font-weight:bold; font-size:20px; line-height:46px">{{ $configs['site_phone'] }}</span> <br>
                            </p>
                        </div>

                        <div class="col large-4" style="padding-bottom: 0px; display:flex">
                            <i style="font-size:42px; padding-right:16px" class="fa fa-envelope-o" aria-hidden="true"></i>
                            <p>
                                <span style="font-weight:bold; font-size:20px; line-height:46px">{{ $configs['site_email'] }}</span> <br>
                            </p>
                        </div>

                    </div>
                    <!-- .left -->
                </div>
                <!-- .container -->
            </div> --}}
            <!-- .absolute-footer -->
            <a href="#top"
                class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1"
                id="top-link"><i class="icon-angle-up"></i></a>

        </footer>
        <!-- .footer-wrapper -->

    </div>
    <!-- #wrapper -->

    <!-- Mobile Sidebar -->
    <div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
        <div class="sidebar-menu no-scrollbar ">
            <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
                <div id="mega-menu-wrap" class="ot-vm-click">
                    <div id="mega-menu-title">
                        <i class="icon-menu"></i> DANH MỤC SẢN PHẨM
                    </div>
                    <ul id="mega_menu" class="menu" style="display:block !important">
                        @foreach ($categories as $category)
                            <li
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-209">
                                <a
                                    href="{{ url('shop/' . ktc_str_convert($category->name) . '_' . $category->id . '.html') }}"><img
                                        src="{{ asset('theme/wp-content/uploads/2017/11/icon-dot.png') }}"
                                        class="_mi _before _svg"
                                        aria-hidden="true"><span>{{ $category->name }}</span></a>
                                
                            </li>
                            @if (count($category->getChildrens($category->id)) > 0)
                                @foreach ($category->getChildrens($category->id) as $item)
                                    <li
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-209">
                                        <a
                                            href="{{ url('shop/' . ktc_str_convert($item->name) . '_' . $item->id . '.html') }}"><img
                                                src="{{ asset('theme/wp-content/uploads/2017/11/icon-dot.png') }}"
                                                class="_mi _before _svg"
                                                aria-hidden="true"><span>{{ $item->name }}</span></a>

                                    </li>
                                @endforeach
                            @endif
                        @endforeach
                        <li
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-209">
                        <a
                            href="{{ url('tin-tuc.html') }}"><img
                                src="{{ asset('theme/wp-content/uploads/2017/11/icon-dot.png') }}"
                                class="_mi _before _svg"
                                aria-hidden="true"><span>Tin tức</span></a>

                    </li>
                    <li
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-209">
                        <a
                            href="{{ url('gioi-thieu.html') }}"><img
                                src="{{ asset('theme/wp-content/uploads/2017/11/icon-dot.png') }}"
                                class="_mi _before _svg"
                                aria-hidden="true"><span>Giới thiệu</span></a>

                    </li>
                    <li
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-209">
                        <a
                            href="{{ url('lien-he.html') }}"><img
                                src="{{ asset('theme/wp-content/uploads/2017/11/icon-dot.png') }}"
                                class="_mi _before _svg"
                                aria-hidden="true"><span>Liên hệ</span></a>

                    </li>
                    </ul>
                </div>
            </ul>
        </div>
        <!-- inner -->
    </div>
    <!-- #mobile-menu -->
    <div id="login-form-popup" class="lightbox-content mfp-hide">



        <div class="account-container lightbox-inner">


            <div class="account-login-inner">

                <h3 class="uppercase">Đăng nhập</h3>

                <form class="woocommerce-form woocommerce-form-login login" method="post">


                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username">Tên tài khoản hoặc địa chỉ email <span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                            name="username" id="username" value="">
                    </p>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Mật khẩu <span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                            name="password" id="password">
                    </p>


                    <p class="form-row">
                        <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce"
                            value="3c0dc77ceb"><input type="hidden" name="_wp_http_referer" value="/">
                        <button type="submit" class="woocommerce-Button button" name="login"
                            value="Đăng nhập">Đăng nhập</button>
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme"
                                type="checkbox" id="rememberme" value="forever"> <span>Ghi nhớ
                                mật khẩu</span>
                        </label>
                    </p>
                    <p class="woocommerce-LostPassword lost_password">
                        <a href="tai-khoan/lost-password/index.htm">Quên mật khẩu?</a>
                    </p>


                </form>
            </div>
            <!-- .login-inner -->


        </div>
        <!-- .account-login-container -->

    </div>
    {{-- <script type='text/javascript'>
        /* <![CDATA[ */
        var wpcf7 = {
            "apiSettings": {
                "root": "http:\/\/dogom.giaodienwebmau.com\/wp-json\/contact-form-7\/v1",
                "namespace": "contact-form-7\/v1"
            },
            "recaptcha": {
                "messages": {
                    "empty": "H\u00e3y x\u00e1c nh\u1eadn r\u1eb1ng b\u1ea1n kh\u00f4ng ph\u1ea3i l\u00e0 robot."
                }
            }
        };
        /* ]]> */
    </script> --}}
    {{-- <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.9.2') }}'></script> --}}
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/ot-flatsome-vertical-menu/assets/js/ot-vertical-menu.js?ver=1.1.0') }}'>
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_add_to_cart_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "http:\/\/dogom.giaodienwebmau.com\/?wc-ajax=%%endpoint%%",
            "i18n_view_cart": "Xem gi\u1ecf h\u00e0ng",
            "cart_url": "http:\/\/dogom.giaodienwebmau.com\/gio-hang\/",
            "is_cart": "",
            "cart_redirect_after_add": "no"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.2.5') }}'>
    </script>
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70') }}'>
    </script>
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4') }}'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "http:\/\/dogom.giaodienwebmau.com\/?wc-ajax=%%endpoint%%"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.2.5') }}'>
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "http:\/\/dogom.giaodienwebmau.com\/?wc-ajax=%%endpoint%%",
            "fragment_name": "wc_fragments_f31647eae19eb4e0e7a3b0929412c4e3"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.2.5') }}'>
    </script>
    {{-- <script type='text/javascript'
        src='{{ asset('theme/wp-content/themes/flatsome/inc/extensions/flatsome-live-search/flatsome-live-search.js?ver=3.5.3') }}'>
    </script> --}}
    <script type='text/javascript' src='{{ asset('theme/wp-includes/js/hoverIntent.min.js?ver=1.8.1') }}'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var flatsomeVars = {
            "ajaxurl": "http:\/\/dogom.giaodienwebmau.com\/wp-admin\/admin-ajax.php",
            "rtl": "",
            "sticky_height": "70"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('theme/wp-content/themes/flatsome/assets/js/flatsome.js?ver=3.5.3') }}'>
    </script>
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/themes/flatsome/assets/js/woocommerce.js?ver=3.5.3') }}'></script>
    <script type='text/javascript' src='{{ asset('theme/wp-includes/js/wp-embed.min.js?ver=4.9.22') }}'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var _zxcvbnSettings = {
            "src": "http:\/\/dogom.giaodienwebmau.com\/wp-includes\/js\/zxcvbn.min.js"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('theme/wp-includes/js/zxcvbn-async.min.js?ver=1.0') }}'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var pwsL10n = {
            "unknown": "M\u1eadt kh\u1ea9u m\u1ea1nh kh\u00f4ng x\u00e1c \u0111\u1ecbnh",
            "short": "R\u1ea5t y\u1ebfu",
            "bad": "Y\u1ebfu",
            "good": "Trung b\u00ecnh",
            "strong": "M\u1ea1nh",
            "mismatch": "M\u1eadt kh\u1ea9u kh\u00f4ng kh\u1edbp"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='{{ asset('theme/wp-admin/js/password-strength-meter.min.js?ver=4.9.22') }}'>
    </script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_password_strength_meter_params = {
            "min_password_strength": "3",
            "i18n_password_error": "Vui l\u00f2ng nh\u1eadp m\u1eadt kh\u1ea9u kh\u00f3 h\u01a1n.",
            "i18n_password_hint": "G\u1ee3i \u00fd: M\u1eadt kh\u1ea9u ph\u1ea3i c\u00f3 \u00edt nh\u1ea5t 12 k\u00fd t\u1ef1. \u0110\u1ec3 n\u00e2ng cao \u0111\u1ed9 b\u1ea3o m\u1eadt, s\u1eed d\u1ee5ng ch\u1eef in hoa, in th\u01b0\u1eddng, ch\u1eef s\u1ed1 v\u00e0 c\u00e1c k\u00fd t\u1ef1 \u0111\u1eb7c bi\u1ec7t nh\u01b0 ! \" ? $ % ^ & )."
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='{{ asset('theme/wp-content/plugins/woocommerce/assets/js/frontend/password-strength-meter.min.js?ver=3.2.5') }}'>
    </script>








    <script type="text/javascript">
        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
        }
        $('#shipping').change(function() {
            $('#total').html(formatNumber(parseInt({{ Cart::subtotal() }}) + parseInt($('#shipping').val())));
        });
    </script>

    <script>
        function buyNow(id, instance = null) {

            qty = $('#quantity').val();
            if (instance == null || instance == '') {
                var cart = $('.shopping-cart');
            } else {
                var cart = $('.shopping-' + instance);
            }

            $.ajax({
                url: '{{ action('Shop@addToCart') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    instance: instance,
                    qty: qty,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    flg = parseInt(data.flg);
                    if (flg === 1) {
                        setTimeout(function() {
                            if (data.instance == 'default') {
                                $('#count_cart').html(data.count_cart);
                                $('#cart-sidebar').html(data.htmlCart);
                                $('.subtotal').html(data.subtotal);
                                $('.top-subtotal').show();
                                $('.actions').show();
                            } else {
                                $('#count_' + data.instance).html(data.count_cart);
                            }

                        }, 1000);
                        window.location.href = '{{ action('Shop@cart') }}';


                    } else {
                        alert(data.error);
                    }

                }
            });

        }
    </script>

    <script>
        function addToCart(id, instance = null) {
            qty = $('#quantity').val();
            if (instance == null || instance == '') {
                var cart = $('.shopping-cart');
            } else {
                var cart = $('.shopping-' + instance);
            }
            // var imgtodrag = $('.product-box-'+id).find("img").eq(0);
            // if (imgtodrag) {
            //     var imgclone = imgtodrag.clone()
            //         .offset({
            //         top: imgtodrag.offset().top,
            //         left: imgtodrag.offset().left
            //     })
            //         .css({
            //         'opacity': '0.5',
            //             'position': 'absolute',
            //             'width': '150px',
            //             'z-index': '99999999'
            //     })
            //         .appendTo($('body'))
            //         .animate({
            //         'top': cart.offset().top,
            //             'left': cart.offset().left,
            //             'width': 75,
            //             'height': 75
            //     }, 1000, 'easeInOutExpo');
            //     // setTimeout(function () {
            //     //     cart.effect("shake", {times: 2}, 200);
            //     // }, 1500);

            //     imgclone.animate({
            //         'width': 0,
            //             'height': 0
            //     }, function () {
            //         $(this).detach()
            //     });
            // }

            $.ajax({
                url: '{{ action('Shop@addToCart') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    qty: qty,
                    instance: instance,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {

                    flg = parseInt(data.flg);
                    if (flg === 1) {
                        setTimeout(function() {
                            if (data.instance == 'default') {
                                $('#count_cart').html(data.count_cart);
                                $('#cart-sidebar').html(data.htmlCart);
                                $('.subtotal').html(data.subtotal);
                                $('.top-subtotal').show();
                                $('.actions').show();
                            } else {
                                $('#count_' + data.instance).html(data.count_cart);
                            }

                        }, 1000);

                        Swal.fire({
                            icon: 'success',
                            title: 'Thêm vào giỏ hàng thành công!',
                            showConfirmButton: false,
                        })

                    } else {
                        alert(data.error);
                    }

                }
            });

        }
    </script>

    <script>
        let $ = jQuery;
        $(document).ready(function() {
            $(window).on('load', function() {
                $.getScript("https://cdn.jsdelivr.net/npm/sweetalert2@10.13.0/dist/sweetalert2.all.min.js",
                    function() {

                        @if (Session::has('message'))
                            Swal.fire({
                                text: "{{ session('message') }}",
                                icon: "success",
                                // buttonsStyling: false,
                                confirmButtonText: "Đồng ý",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        @endif
                        @if (Session::has('error'))
                            Swal.fire({
                                text: "{{ session('error') }}",
                                icon: "error",
                                // buttonsStyling: false,
                                confirmButtonText: "Đồng ý",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            })
                        @endif
                    });
            })
        });
    </script>

    <script>
        function hover_menu_left() {

            // console.log('abc');
            var firstTime = true;
            var top = -1;

            var timer;
            var delay = 100;
            $('.categories-main').hover(function() {
                var that = $(this);
                timer = setTimeout(function() {
                    $(that).addClass('active');
                }, delay);
            }, function() {
                $(this).removeClass('active');
                clearTimeout(timer);
            });

            $('.categories-list-box').hover(function() {
                $('#jsMenuMarkLayer').stop().delay(20).fadeIn(100);
            }, function() {
                $('#jsMenuMarkLayer').stop().delay(20).fadeOut(100);
            });
            $('.nav-main').menuAim({
                rowSelector: "li.menuItem",
                submenuDirection: "right",
                activate: function(a) {
                    if (firstTime) {
                        $(a).addClass('active').children('.sub-cate').css({
                            width: '0',
                            display: 'block'
                        }).animate({
                            width: '720px'
                        }, 100);
                    } else {
                        $(a).addClass('active').children('.sub-cate').show();
                    }
                    var ind = $(a).index();
                    /*
                    for (var i = 0; i <= ind; i++) {
                    $('.nav-main > li').eq(ind).find('div.sub-cate').css({'top': top + 'px'});
                    top = top - 61;
                    }*/
                    firstTime = false;
                    $("img.lazyMenu", $(a)).each(function() {
                        $(this).attr("src", $(this).attr("data-original"));
                        $(this).removeAttr("data-original");
                    });
                },
                deactivate: function(a) {
                    $(a).removeClass('active').children('.sub-cate').hide();
                    //top = -1;
                },
                exitMenu: function() {
                    firstTime = true;
                    $('.sub-cate').hide();
                    $('.nav-main-box > .nav-main > li').removeClass('active');
                    // top = -1;
                    return true;
                }
            });
        }

        function menuAimExit() {
            $('.sub-cate').hide();
            $('.nav-main-box > .nav-main > li').removeClass('active');
        }

        $(document).ready(function($) {
            hover_menu_left();
        })
    </script>



    @stack('scripts')

</body>

</html>
