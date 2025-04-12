<?php

use App\Models\PhongHoc;
use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('nhan_vien', NhanVienController::class);
    $router->resource('linh_vuc', LinhVucController::class);
    $router->resource('giao_vien', GiaoVienController::class);
    $router->resource('phong_hoc', PhongHocController::class);
    $router->resource('hoc_sinh', HocSinhController::class);
    $router->get('/ckfinder', function () {
        return view('admin.ckfinder');
    });
});
