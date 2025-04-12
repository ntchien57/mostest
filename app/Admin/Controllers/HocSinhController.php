<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HocSinh;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\LinhVuc;

class HocSinhController extends Controller
{
    use ModelForm;
    public $gt = ['0' => 'Nam', '1' => 'Nữ'];
    public $loai = ['0' => 'Kế toán', '1' => 'Tuyển sinh'];
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Quản lý học sinh ');
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

            $content->header('Sửa học sinh');
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

            $content->header('Thêm mới học sinh');
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
        $grid = new Grid(new HocSinh());


        $gt = $this->gt;
        $loai = $this->loai;
        $grid->maHS('Mã học sinh');
        $grid->tenHS('Tên học sinh');
        $grid->diachi('Địa chỉ');
        $grid->email('Email');
        $grid->ngaysinh('Ngày sinh');
        $grid->sdt('SĐT');
        $grid->gioitinh('Giới tính')->display(function ($type) use ($gt) {
            return $gt[$type];
        });
        $grid->sdt('CMND');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->actions(function ($actions) {

            $actions->disableView();
        });

        $grid->quickSearch('tenHS');


        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(HocSinh::class, function (Form $form) {
            $form->text('maHS', 'Mã học sinh')->required();
            $form->text('tenHS', 'Tên học sinh')->required();
            $form->text('diachi', 'Địa chỉ')->required();
            $form->email('email', 'Email')->required();
            $form->date('ngaysinh', 'Ngày sinh')->required();
            $form->text('sdt', 'Số điện thoại')->required();
            $form->radio('gioitinh', 'Giới tính')->options(['0' => 'Nam', '1' => 'Nữ'])->default('0');
            $form->text('cmnd', 'CMND')->required();
            $form->text('tendangnhap', 'Tên đăng nhập')->required();
            $form->password('matkhau', 'Mật khẩu')->required();
            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();
        });
    }

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('');
            $content->description('');
            $content->body(Admin::show(HocSinh::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }
}
