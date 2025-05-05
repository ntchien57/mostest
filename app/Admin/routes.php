<?php

use App\Models\ChiTietLopHoc;
use App\Models\HocSinh;
use App\Models\TaiKhoan;
use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('nhan_vien', NhanVienController::class);
    $router->resource('linh_vuc', LinhVucController::class);
    $router->resource('giao_vien', GiaoVienController::class);
    $router->resource('phong_hoc', PhongHocController::class);
    $router->resource('hoc_sinh', HocSinhController::class);
    $router->resource('lien_he', LienHeController::class);
    $router->resource('khoa_hoc', KhoaHocController::class);
    $router->resource('lop_hoc', LopHocController::class);
    $router->resource('phieu_thu', PhieuThuController::class);
    $router->resource('phieu_chi', PhieuChiController::class);
    $router->resource('lich_thi', LichThiController::class);
    $router->resource('chi-tiet-lop-hoc', ChiTietLopHocController::class);
    $router->resource('thi_sinh_du_thi', ThiSinhDuThiController::class);
    $router->resource('ket_qua', KetQuaController::class);
    $router->resource('tai_khoan', TaiKhoanController::class);

    $router->get('/ckfinder', function () {
        return view('admin.ckfinder');
    });

    $router->get('xoa-hoc-sinh-khoi-lop', function () {
        $id = request('id');
    
        // Tìm bản ghi chi tiết lớp học
        $chiTiet = \App\Models\ChiTietLopHoc::find($id);
    
        if (!$chiTiet) {
            admin_toastr('Không tìm thấy học sinh trong lớp', 'error');
            return redirect()->back();
        }
    
        // Tìm lớp học dựa vào mã lớp học
        $lopHoc = \App\Models\LopHoc::where('maLH', $chiTiet->maLH)->first();
    
        if (!$lopHoc) {
            admin_toastr('Không tìm thấy lớp học tương ứng', 'error');
            return redirect()->back();
        }
    
        // Xóa bản ghi
        $chiTiet->delete();
    
        admin_toastr('Đã xóa học sinh khỏi lớp', 'success');
    
        // Chuyển hướng về trang chi tiết lớp học
        return redirect(admin_url("lop_hoc/{$lopHoc->id}"));
    });
    
    $router->get('api/get-nguoinop', function () {
        $maHS = request('q'); // Laravel-Admin tự động gửi 'q' khi gọi load()

        $hocSinh = HocSinh::where('maHS', $maHS)->first();

        if (!$hocSinh) {
            return response()->json([]);
        }

        return response()->json([
            'nguoinop' => $hocSinh->tenHS, // lấy tên học sinh
        ]);
    });

    $router->get('api/get-hocsinh', function () {
        $maHS = request('q');
    
        $hocSinh = App\Models\HocSinh::where('maHS', $maHS)->first();
    
        if ($hocSinh) {
            return response()->json([
                'success' => true,
                'data' => [
                    'tenHS' => $hocSinh->tenHS,
                    'diachi' => $hocSinh->diachi,
                    'email' => $hocSinh->email,
                    'ngaysinh' => $hocSinh->ngaysinh,
                    'sdt' => $hocSinh->sdt,
                    'gioitinh' => $hocSinh->gioitinh,
                    'cmnd' => $hocSinh->cmnd,
                ],
            ]);
        }
    
        return response()->json(['success' => false]);
    });
    
});
