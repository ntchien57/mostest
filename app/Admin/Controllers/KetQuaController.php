<?php

namespace App\Admin\Controllers;

use App\Models\KetQua;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\LichThi;
use App\Models\LinhVuc;
use App\Models\ThiSinhDuThi;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class KetQuaController extends Controller
{
    use ModelForm;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Content $content)
    {
        $tab = new Tab();
        $tab->add('Kết quả thi thử', $this->gridKetQua(0)->render());
        $tab->add('Kết quả thi thật', $this->gridKetQua(1)->render());

        return $content
            ->title('Quản lý kết quả')
            ->body($tab);
    }

    protected function gridKetQua($loai)
    {
        $grid = new Grid(new KetQua());

        $grid->model()
            ->join('thisinhduthi', 'ketqua.maTS', '=', 'thisinhduthi.maTS')
            ->join('lichthi', 'ketqua.maLT', '=', 'lichthi.maLT')
            ->where('lichthi.loai', $loai)
            ->select(
                'ketqua.*',
                'thisinhduthi.tenTS as tenTS',
                'thisinhduthi.email as email',
                'lichthi.ngaythi as ngaythi',
                'lichthi.maphongthi as maphongthi'
            );

        $grid->column('maTS', 'Mã thí sinh');
        $grid->column('tenTS', 'Tên thí sinh');
        $grid->column('email', 'Email');
        $grid->column('maLT', 'Mã lịch thi');
        $grid->column('maphongthi', 'Phòng thi');
        $grid->column('ngaythi', 'Ngày thi');
        $grid->column('ketqua', 'Kết quả');
        $grid->column('chungchi', 'Chứng chỉ')->display(function () {
            return $this->ketqua >= 100
                ? "<span style='color: green; font-weight: bold;'>Đạt</span>"
                : "<span style='color: red; font-weight: bold;'>Không đạt</span>";
        });

        $grid->disableExport();
        $grid->disableFilter();
        $grid->quickSearch('maTS', 'maLT', 'tenTS');
        $grid->actions(function ($actions) {
            $actions->disableView();
        });

        return $grid;
    }

    protected function form()
    {
        return Admin::form(KetQua::class, function (Form $form) {
            $form->select('maTS', 'Thí sinh')->options(
                ThiSinhDuThi::all()->pluck('tenTS', 'maTS')
            )->required();

            $form->select('maLT', 'Lịch thi')->options(
                LichThi::all()->mapWithKeys(function ($item) {
                    return [$item->maLT => $item->maLT . ' - ' . $item->maphongthi . ' - ' . $item->ngaythi];
                })->toArray()
            )->required();

            $form->text('ketqua', 'Kết quả')->required();
            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();
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

            $content->header('Sửa kết quả');
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

            $content->header('Thêm mới kết quả');
            $content->body($this->form());
        });
    }

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('');
            $content->description('');
            $content->body(Admin::show(KetQua::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }
}
