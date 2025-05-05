<?php

namespace App\Admin\Controllers;

use App\Models\LopHoc;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\KhoaHoc;
use App\Models\GiaoVien;
use App\Models\PhongHoc;
use App\Models\ChiTietLopHoc;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use App\Admin\Actions\XoaHocSinhButton;
use Encore\Admin\Controllers\ModelForm;

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
    public function index(Content $content)
    {
        $tab = new Tab();

        $tab->add('Lớp học', $this->gridLopHoc()->render());
        $tab->add('Lớp ôn', $this->gridLopOn()->render());

        return $content
            ->title('Danh sách lớp học và lớp ôn')
            ->body($tab);
    }

    protected function gridLopHoc()
    {
        $grid = new Grid(new LopHoc());

        $grid->model()->where('loai', 1); // Lớp học

        $grid->column('maLH', 'Mã lớp học');
        $grid->column('tenLH', 'Tên lớp học');
        $grid->column('maKH', 'Khóa học')->display(function () {
            return optional($this->khoaHoc)->tenKH;
        });
        $grid->column('maPH', 'Phòng học')->display(function () {
            return optional($this->phongHoc)->tenPH;
        });
        $grid->column('maGV', 'Giáo viên')->display(function () {
            return optional($this->giaoVien)->tenGV;
        });
        $grid->column('hocphi', 'Học phí')->display(function ($hp) {
            return number_format($hp, 0, ',', '.') . ' VND';
        });
        $grid->column('ngaybd', 'Ngày bắt đầu');
        $grid->column('ngaykt', 'Ngày kết thúc');

        $grid->disableExport();
        $grid->disableFilter();

        $grid->quickSearch('tenLH', 'maLH');

        return $grid;
    }

    protected function gridLopOn()
    {
        $grid = new Grid(new LopHoc());

        $grid->model()->where('loai', 0); // Lớp ôn

        $grid->column('maLH', 'Mã lớp ôn');
        $grid->column('tenLH', 'Tên lớp ôn');
        $grid->column('maKH', 'Khóa học')->display(function () {
            return optional($this->khoaHoc)->tenKH;
        });
        $grid->column('maPH', 'Phòng học')->display(function () {
            return optional($this->phongHoc)->tenPH;
        });
        $grid->column('maGV', 'Giáo viên')->display(function () {
            return optional($this->giaoVien)->tenGV;
        });
        $grid->column('hocphi', 'Học phí')->display(function ($hp) {
            return number_format($hp, 0, ',', '.') . ' VND';
        });
        $grid->column('ngaybd', 'Ngày bắt đầu');
        $grid->column('ngaykt', 'Ngày kết thúc');

        $grid->disableExport();
        $grid->disableFilter();
        

        $grid->quickSearch('tenLH', 'maLH');

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

            $content->header('Thêm mới lớp');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(LopHoc::class, function (Form $form) {
            $form->text('maLH', 'Mã lớp')->required();
            $form->text('tenLH', 'Tên lớp')->required();
            $form->select('maKH', 'Khóa học')
                ->options(KhoaHoc::all()->pluck('tenKH', 'maKH'))->required();
            $form->select('maGV', 'Giáo viên')
                ->options(GiaoVien::all()->pluck('tenGV', 'maGV'))->required();
            $form->select('maPH', 'Phòng học')
                ->options(PhongHoc::all()->pluck('tenPH', 'maPH'))->required();
            $form->currency('hocphi', 'Học phí')->symbol('VND')->options(['digits' => 0]);
            $form->radio('loai', 'Loại')->options(['0' => 'Lớp ôn', '1' => 'Lớp học'])->default('0');
            $form->date('ngaybd', 'Ngày bắt đầu')->required();
            $form->date('ngaykt', 'Ngày kết thúc')->required();
            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();
        });
    }

    public function show($id, Content $content)
    {
        $lopHoc = LopHoc::where('id', $id)->firstOrFail();

        return $content
            ->title('Lớp học: ' . $lopHoc->tenLH)
            ->description(' Từ ngày ' . $lopHoc->ngaybd . ' đến ngày ' . $lopHoc->ngaykt)
            ->body($this->gridHocSinh($lopHoc->maLH));
    }

    protected function gridHocSinh($maLH)
    {
        $grid = Admin::grid(ChiTietLopHoc::class, function (Grid $grid) use ($maLH) {
            $grid->model()->where('maLH', $maLH)->with('hocSinh');

            $grid->column('hocSinh.maHS', 'Mã học sinh');
            $grid->column('hocSinh.tenHS', 'Tên học sinh');
            $grid->column('hocSinh.email', 'Email');
            $grid->column('hocSinh.sdt', 'SĐT');

            $grid->actions(function ($actions) {
                $actions->disableView(); // Ẩn nút View nếu không cần
            });

            $grid->tools(function ($tools) use ($maLH) {
                $tools->append(new \App\Admin\Actions\ThemHocSinhButton($maLH));
            });
            $grid->actions(function ($actions) {
                $actions->disableView();
                $actions->disableEdit();
                $actions->disableDelete();
                $id = $actions->row->id;
                $url = admin_url("xoa-hoc-sinh-khoi-lop?id={$id}");
            
                $actions->append("<a href='{$url}' 
                    onclick=\"return confirm('Bạn có chắc chắn muốn xóa học sinh này khỏi lớp?')\"
                    class='btn btn-sm btn-danger' style='margin-left:5px'>
                    <i class='fa fa-trash'></i></a>");
            });
            
            $grid->disableCreateButton();
            $grid->disableExport();
            $grid->disableFilter();
            $grid->quickSearch('hocSinh.tenHS');
        });

        return $grid;
    }

}
