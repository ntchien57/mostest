<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TaiKhoan;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TaiKhoanController extends Controller
{
    use ModelForm;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Quản lý tài khoản ');
            // $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Sửa tài khoản');
            // $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('Thêm mới tài khoản');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TaiKhoan());

        $grid->taikhoan('Tài khoản');
        $grid->column('hocsinh.tenHS', 'Tên học sinh');
        $grid->matkhau('Mật khẩu');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->actions(function ($actions) {

            $actions->disableView();
        });

        $grid->quickSearch('tenLV');

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(TaiKhoan::class, function (Form $form) {
            $form->text('taikhoan', 'Mã học sinh')->required();

            // Hiển thị thông tin học sinh
            $form->html('<div id="hocsinh_info" style="margin-top:15px;"></div>');

            $form->password('matkhau', 'Mật khẩu')->required();

            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();

            // Script gọi API và hiển thị thông tin
            Admin::script(<<<SCRIPT
            function formatDate(dateStr) {
                if (!dateStr) return '';
                const date = new Date(dateStr);
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                return day + '/' + month + '/' + year;
            }

            $(document).on('input', 'input[name="taikhoan"]', function() {
                var maHS = $(this).val().trim();
                if (maHS.length > 0) {
                    $.get('/admin/api/get-hocsinh?q=' + maHS, function(response) {
                        if (response.success) {
                            var data = response.data;
                            var html = '<b>Họ tên:</b> ' + data.tenHS + '<br>' +
                                       '<b>Địa chỉ:</b> ' + data.diachi + '<br>' +
                                       '<b>Email:</b> ' + data.email + '<br>' +
                                       '<b>Ngày sinh:</b> ' + formatDate(data.ngaysinh) + '<br>' +
                                       '<b>SĐT:</b> ' + data.sdt + '<br>' +
                                       '<b>Giới tính:</b> ' + (data.gioitinh == '1' ? 'Nữ' : 'Nam') + '<br>' +
                                       '<b>CMND:</b> ' + data.cmnd;
                            $('#hocsinh_info').html(html).css('color', 'black');
                        } else {
                            $('#hocsinh_info').html('<span style="color:red;">Không tìm thấy học sinh</span>');
                        }
                    });
                } else {
                    $('#hocsinh_info').html('');
                }
            });
        SCRIPT);
        });
    }

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('');
            $content->description('');
            $content->body(Admin::show(TaiKhoan::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }

}
