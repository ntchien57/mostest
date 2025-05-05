<?php

namespace App\Admin\Controllers;

use App\Models\ChiTietLopHoc;
use App\Models\HocSinh;
use App\Models\LopHoc;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ChiTietLopHocController extends AdminController
{
    public function title()
    {
        return 'Chi tiết lớp học';
    }

    // Grid cho admin riêng, nếu cần
    protected function grid()
    {
        $grid = new Grid(new ChiTietLopHoc());

        $grid->model()->with('lopHoc', 'hocSinh');

        $grid->column('id', 'ID');
        $grid->column('lopHoc.tenLH', 'Tên lớp học');
        $grid->column('hocSinh.tenHS', 'Tên học sinh');

        return $grid;
    }

    // Form thêm/sửa học sinh trong lớp
    protected function form()
    {
        $form = new Form(new ChiTietLopHoc());

        $form->select('maLH', 'Lớp học')
            ->options(LopHoc::all()->pluck('tenLH', 'maLH'))
            ->default(request('maLH'))
            ->required()
            ->readOnly();

        $form->select('maHS', 'Học sinh')
            ->options(HocSinh::all()->pluck('tenHS', 'maHS'))
            ->required();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableList(); // Tắt nút mặc định

            $tools->add('<a class="btn btn-sm btn-default" href="' . admin_url('lop_hoc') . '"><i class="fa fa-list"></i> Danh sách</a>');
        });
        $form->saved(function (Form $form) {
            admin_toastr('Thêm học sinh thành công', 'success');
        
            // Lấy mã lớp từ bản ghi vừa lưu
            $maLH = $form->model()->maLH;
        
            // Lấy ID tương ứng trong bảng LopHoc
            $lopHoc = \App\Models\LopHoc::where('maLH', $maLH)->first();
        
            // Nếu tìm thấy thì chuyển hướng
            if ($lopHoc) {
                return redirect(admin_url("lop_hoc/{$lopHoc->id}"));
            }
        
            // Nếu không tìm thấy, quay lại danh sách lớp học
            return redirect(admin_url("lop_hoc"));
        });

        $form->saving(function (Form $form) {
            $maLH = $form->maLH;
            $maHS = $form->maHS;
        
            $exists = \App\Models\ChiTietLopHoc::where('maLH', $maLH)
                        ->where('maHS', $maHS)
                        ->exists();
        
            if ($exists) {
                admin_error('Lỗi', 'Học sinh này đã tồn tại trong lớp học.');
                return back();
            }
        });
        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();
        return $form;
    }

}
