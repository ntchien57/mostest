<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KhoaHoc;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\LinhVuc;

class KhoaHocController extends Controller
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

            $content->header('Quản lý khóa học ');
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

            $content->header('Sửa khóa học');
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

            $content->header('Thêm mới khóa học');
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
        $grid = new Grid(new KhoaHoc());


        $gt = $this->gt;
        $loai = $this->loai;
        $grid->maKH('Mã khóa học');
        $grid->tenKH('Tên khóa học');
        $grid->maLV('Lĩnh vực')->display(function () {
            return optional($this->linhVuc)->tenLV;
        });  
        $grid->hocphi('Học phí')->display(function ($hocphi) {
            return number_format($hocphi);
        });
        $grid->sobuoi('Số buổi');
             
        $grid->disableExport();
        $grid->disableFilter();
        $grid->actions(function ($actions) {

            $actions->disableView();
        });

        $grid->quickSearch('tenKH');


        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(KhoaHoc::class, function (Form $form) {
            $form->text('maKH', 'Mã khóa học')->required();
            $form->text('tenKH', 'Tên khóa học')->required();
            $form->select('maLV', 'Lĩnh vực')
            ->options(LinhVuc::all()->pluck('tenLV', 'maLV'))->required();
            $form->currency('hocphi', 'Học phí')->symbol('VND')->options(['digits' => 0]);
            $form->number('sobuoi', 'Số buổi')->required();
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
            $content->body(Admin::show(KhoaHoc::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }
}
