<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class HomeController extends Controller
{
    public function index()
    {
        Admin::js(asset('vendor/chartjs/dist/Chart.bundle.min.js'));
        // Admin::js(asset('js/jquery.min.js'));
        Admin::css(asset('slick/slick.css'));
        Admin::css(asset('slick/slick-theme.css'));
        Admin::js(asset('slick/slick.min.js'));
        Admin::script(<<<JS
    $(document).ready(function(){
        $('.slick-banner').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: true,
            infinite: true
        });
    });
JS);

        return Admin::content(function (Content $content) {
            $content->header('Trang chủ');
            $carousel = <<<HTML
<div class="slick-banner" style="margin-top: 20px;">
    <div><img src="images/dhsg_1.jpg" style="height: auto; width: 100%; object-fit: cover;" class="img-fluid" alt="Banner 1"></div>
    <div><img src="images/dhsg_2.jpg" style="height: auto; width: 100%; object-fit: cover;" class="img-fluid" alt="Banner 2"></div>
    <div><img src="images/dhsg_3.jpg" style="height: auto; width: 100%; object-fit: cover;" class="img-fluid" alt="Banner 3"></div>
</div>

HTML;

            $content->body($carousel);
        });
    }
}
