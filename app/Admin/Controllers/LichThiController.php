<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LichThi;
use App\Models\LinhVuc;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Tab;

class LichThiController extends Controller
{
    use ModelForm;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Content $content)
    {
        // Tạo Tab
        $tab = new Tab();

        // Grid Thi thử
        $gridThiThu = $this->gridThiThu()->render();
        $tab->add('Thi thử', $gridThiThu);

        // Grid Thi thật
        $gridThiThat = $this->gridThiThat()->render();
        $tab->add('Thi thật', $gridThiThat);

        return $content
            ->title('Quản lý lịch thi')
            ->body($tab);
    }

    protected function gridThiThu()
    {
        $grid = new Grid(new LichThi());

        // Chỉ lấy các bản ghi với loai = 0 (Thi thử)
        $grid->model()->where('loai', 0);
        $grid->disableExport();
        $grid->disableFilter();

        $grid->quickSearch('maLT', 'maphongthi');
        $grid->column('maLT', 'Mã lịch thi');
        $grid->column('maLV', 'Lĩnh vực');
        $grid->column('maphongthi', 'Mã phòng thi');
        $grid->column('lephi', 'Lệ phí')->display(function ($lephi) {
            return number_format($lephi, 0, ',', '.') . ' VND';
        });
        $grid->actions(function ($actions) {
            $actions->disableView();
        });
        $grid->column('ngaythi', 'Ngày thi');

        return $grid;
    }

    protected function gridThiThat()
    {
        $grid = new Grid(new LichThi());

        // Chỉ lấy các bản ghi với loai = 1 (Thi thật)
        $grid->model()->where('loai', 1);

        $grid->column('maLT', 'Mã lịch thi');
        $grid->column('maLV', 'Lĩnh vực');
        $grid->column('maphongthi', 'Mã phòng thi');
        $grid->column('lephi', 'Lệ phí')->display(function ($lephi) {
            return number_format($lephi, 0, ',', '.') . ' VND';
        });
        $grid->column('ngaythi', 'Ngày thi');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        $grid->quickSearch('maLT', 'maphongthi');

        return $grid;
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

            $content->header('Sửa lịch thi');
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

            $content->header('Thêm mới lịch thi');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    // protected function grid()
    // {
    //     $grid = new Grid(new LichThi());

    //     $grid->maLT('Mã lịch thi');
    //     $grid->maLV('Lĩnh vực')->display(function () {
    //         return optional($this->linhVuc)->tenLV;
    //     });
    //     $grid->maPT('Mã phòng thi');
    //     $grid->sobuoi('Số buổi');

    //     $grid->disableExport();
    //     $grid->disableFilter();
    //     $grid->actions(function ($actions) {

    //         $actions->disableView();
    //     });

    //     $grid->quickSearch('tenKH');

    //     return $grid;
    // }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(LichThi::class, function (Form $form) {
            $form->text('maLT', 'Mã lịch thi')->required();
            $form->select('maLV', 'Lĩnh vực')
                ->options(LinhVuc::all()->pluck('tenLV', 'maLV'))->required();
            $form->text('maphongthi', 'Mã phòng thi')->required();
            $form->currency('lephi', 'Lệ phí')->symbol('VND')->options(['digits' => 0]);
            $form->date('ngaythi', 'Ngày thi')->required();
            $form->radio('loai', 'Loại')->options(['0' => 'Thi thử', '1' => 'Thi thật'])->default('0');
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
            $content->body(Admin::show(LichThi::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }
}
