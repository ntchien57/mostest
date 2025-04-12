<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LinhVuc;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class LinhVucController extends Controller
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

            $content->header('Quản lý lĩnh vực ');
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

            $content->header('Sửa lĩnh vực');
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

            $content->header('Thêm mới lĩnh vực');
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
        $grid = new Grid(new LinhVuc());

            $grid->maLV('Mã lĩnh vực');
            $grid->tenLV('Tên lĩnh vực');
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
        return Admin::form(LinhVuc::class, function (Form $form) {
            $form->text('maLV', 'Mã lĩnh vực')->required();
            $form->text('tenLV', 'Tên lĩnh vực')->required();
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
            $content->body(Admin::show(LinhVuc::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }

}
