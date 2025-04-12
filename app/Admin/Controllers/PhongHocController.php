<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PhongHoc;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PhongHocController extends Controller
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

            $content->header('Quản lý phòng học ');
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

            $content->header('Sửa phòng học');
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

            $content->header('Thêm mới phòng học');
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
        $grid = new Grid(new PhongHoc());

            $grid->maPH('Mã phòng học');
            $grid->tenPH('Tên phòng học');
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
        return Admin::form(PhongHoc::class, function (Form $form) {
            $form->text('maPH', 'Mã phòng học')->required();
            $form->text('tenPH', 'Tên phòng học')->required();
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
            $content->body(Admin::show(PhongHoc::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }

}
