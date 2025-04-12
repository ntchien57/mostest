<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BannerController extends Controller
{
    use ModelForm;
    public $banner = ['0' => 'Logo', '1' => 'Banner lớn'];
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Quản lý banner website');
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

            $content->header('Sửa hình ảnh');
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

            $content->header('Thêm mới hình ảnh');
            // $content->description('description');

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

        return Admin::grid(Banner::class, function (Grid $grid) {
            $banner = $this->banner;
            $grid->id('ID')->sortable();
            $grid->image('Hình ảnh')->image();
            $grid->url('url');
            $grid->html('html');
            $grid->type('Loại')->display(function ($type) use ($banner) {
                return $banner[$type];
            });
            // $grid->click('Click');
            $grid->status('Trạng thái')->switch();
            $grid->sort('Sắp xếp')->sortable();
            $grid->created_at();
            $grid->updated_at();
            $grid->model()->orderBy('id', 'desc');
            $grid->disableExport();
            $grid->disableFilter();
            $grid->disableRowSelector();
            $grid->disableColumnSelector();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Banner::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->image('image', 'Hình ảnh')->uniqueName()->move('banner')->removable();
            $form->textarea('html', 'html');
            $form->text('url', 'Link liên kết');
            $form->select('type', 'Loại')->options($this->banner)->rules('required');
            $form->switch('status', 'Trạng thái');
            $form->number('sort', 'Sắp xếp')->default('1');
            $form->display('created_at', 'Ngày tạo');
            $form->display('updated_at', 'Ngày chỉnh sửa');
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
            $content->body(Admin::show(Banner::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }

}
