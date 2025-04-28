<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GiaoVien;
use App\Models\KhoaHoc;
use App\Models\LopHoc;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\Models\LinhVuc;
use App\Models\PhongHoc;

class LopHocController extends Controller
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

            $content->header('Quản lý lớp học ');
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

            $content->header('Sửa lớp học');
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

            $content->header('Thêm mới lớp học');
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
        $grid = new Grid(new LopHoc());

        $grid->maLH('Mã lớp học');
        $grid->tenLH('Tên lớp học');
        $grid->maKH('Khóa học')->display(function () {
            return optional($this->khoaHoc)->tenKH;
        }); $grid->maPH('Phòng học')->display(function () {
            return optional($this->phongHoc)->tenPH;
        }); 
        $grid->maGV('Giáo viên')->display(function () {
            return optional($this->giaoVien)->tenGV;
        });        
        $grid->hocphi('Học phí');
        $grid->ngaybd('Ngày bắt đầu');
        $grid->ngaykt('Ngày kết thúc');
        $grid->disableExport();
        $grid->disableFilter();
        $grid->actions(function ($actions) {

            $actions->disableView();
        });

        $grid->quickSearch('tenGV');


        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(LopHoc::class, function (Form $form) {
            $form->text('maLH', 'Mã lớp học')->required();
            $form->text('tenLH', 'Tên lớp học')->required();
            $form->select('maKH', 'Khóa học')
                ->options(KhoaHoc::all()->pluck('tenKH', 'maKH'))->required();
            $form->select('maGV', 'Giáo viên')
            ->options(GiaoVien::all()->pluck('tenGV', 'maGV'))->required();
            $form->select('maPH', 'Phòng học')
                ->options(PhongHoc::all()->pluck('tenPH', 'maPH'))->required();
            $form->currency('hocphi', 'Học phí')->symbol('VND')->options(['digits' => 0]);
            $form->date('ngaybd', 'Ngày bắt đầu')->required();
            $form->date('ngaykt', 'Ngày kết thúc')->required();
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
            $content->body(Admin::show(LopHoc::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }
}
