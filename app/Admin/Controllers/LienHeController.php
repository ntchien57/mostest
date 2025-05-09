<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LienHe;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LienHeController extends Controller
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

            $content->header('Quản lý liên hệ ');
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

            $content->header('Sửa liên hệ');
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

            $content->header('Thêm mới liên hệ');
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
        $grid = new Grid(new LienHe());

            $grid->tenkhach('Tên khách');
            $grid->email('Email');
            $grid->sdt('sdt');
            $grid->ykien('Ý kiến');
            $grid->ngaylienhe('Ngày');

            $grid->disableExport();
            $grid->disableFilter();
            $grid->actions(function ($actions) {
               
                $actions->disableView();
                $actions->disableEdit();
            });

            $grid->quickSearch('tenkhach');

            $grid->disableCreateButton();
            return $grid;       
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(LienHe::class, function (Form $form) {
            $form->text('maLV', 'Mã liên hệ')->required();
            $form->text('tenLV', 'Tên liên hệ')->required();
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
            $content->body(Admin::show(LienHe::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }

}
