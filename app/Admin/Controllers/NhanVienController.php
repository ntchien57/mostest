<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class NhanVienController extends Controller
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

            $content->header('Quản lý nhân viên ');
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

            $content->header('Sửa nhân viên');
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

            $content->header('Thêm mới nhân viên');
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
        $grid = new Grid(new NhanVien());


            $gt = $this->gt;
            $loai = $this->loai;
            $grid->maNV('Mã nhân viên');
            $grid->tenNV('Tên nhân viên');
            $grid->loai('Phân loại')->display(function ($type) use ($loai) {
                return $loai[$type];
            });
            $grid->diachi('Địa chỉ');
            $grid->email('Email');
            $grid->ngaysinh('Ngày sinh');
            $grid->sdt('SĐT');
            $grid->gioitinh('Giới tính')->display(function ($type) use ($gt) {
                return $gt[$type];
            });
            $grid->sdt('CMND');
            $grid->masothue('Mã số thuế');
            $grid->tknganhang('TK Ngân hàng');

            // $grid->click('Click');
            $grid->disableExport();
            $grid->disableFilter();
            $grid->actions(function ($actions) {
               
                $actions->disableView();
            });

            $grid->quickSearch('tenNV');

            
            return $grid;       
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(NhanVien::class, function (Form $form) {
            $form->text('maNV', 'Mã nhân viên')->required();
            $form->text('tenNV', 'Tên nhân viên')->required();
            $form->select('loai', 'Phân loại')->options(['0' => 'Kế toán', '1'=> 'Tuyển sinh'])->default('0');
            $form->text('diachi', 'Địa chỉ')->required();
            $form->email('email', 'Email')->required();
            $form->date('ngaysinh', 'Ngày sinh')->required();
            $form->text('sdt', 'Số điện thoại')->required();
            $form->radio('gioitinh', 'Giới tính')->options(['0' => 'Nam', '1'=> 'Nữ'])->default('0');
            $form->text('cmnd', 'CMND')->required();
            $form->text('masothue', 'Mã số thuế')->required();
            $form->text('tknganhang', 'Tài khoản ngân hàng')->required();
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
            $content->body(Admin::show(NhanVien::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }

}
