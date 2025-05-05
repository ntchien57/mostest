<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HocSinh;
use App\Models\NhanVien;
use App\Models\PhieuThu;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PhieuThuController extends Controller
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

            $content->header('Quản lý phiếu thu ');
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

            $content->header('Sửa phiếu thu');
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

            $content->header('Thêm mới phiếu thu');
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
        $grid = new Grid(new PhieuThu());

        $grid->column('maPT', 'Mã phiếu thu')->sortable();

        $grid->maNV('Tên nhân viên')->display(function () {
            return optional($this->nhanVien)->tenNV;
        });
        $grid->column('maHS', 'Mã học sinh');
        $grid->column('nguoinop', 'Người nộp');
        $grid->column('sotien', 'Số tiền')->display(function ($sotien) {
            return number_format($sotien, 0, ',', '.') . ' VND';
        });
        $grid->column('ngaythu', 'Ngày thu')->sortable();

        $grid->disableExport();
        $grid->disableFilter();

        $grid->quickSearch('maPT', 'nguoinop'); // Cho tìm nhanh theo mã phiếu thu hoặc người nộp

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(PhieuThu::class, function (Form $form) {
            $form->text('maPT', 'Mã phiếu thu')->required();

            $form->select('maNV', 'Nhân viên')
                ->options(NhanVien::all()->pluck('tenNV', 'maNV'))
                ->required();

            $form->select('maHS', 'Mã học sinh')
                ->options(HocSinh::all()->pluck('maHS', 'maHS'));

            $form->text('nguoinop', 'Người nộp')->required();

            $form->currency('sotien', 'Số tiền')->symbol('VND')->options(['digits' => 0]);
            $form->date('ngaythu', 'Ngày thu')->required();

            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();

            // === Thêm đoạn script để tự động fill 'nguoinop'
            $form->html('
            <script>
                $(document).ready(function() {
                    $("select[name=\'maHS\']").on("change", function() {
                        var maHS = $(this).val();
                        if(maHS) {
                            $.ajax({
                                url: "/admin/api/get-nguoinop",
                                type: "GET",
                                data: { q: maHS },
                                success: function(response) {
                                    if(response.nguoinop){
                                        $("input[name=\'nguoinop\']").val(response.nguoinop);
                                    }
                                }
                            });
                        }
                    });
                });
            </script>
        ');
        });
    }

    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('Chi tiết phiếu thu');
            $content->description('');
    
            $content->body(Admin::show(PhieuThu::with('nhanVien')->findOrFail($id), function (Show $show) {
    
                $show->field('html_preview', 'Hóa đơn')->as(function () {
                    $tenNV = optional($this->nhanVien)->tenNV;
                    $soTien = number_format($this->sotien, 0, ',', '.') . ' VND';
                    return '
                        <div style="padding: 30px; font-family: DejaVu Sans, Arial, sans-serif; border: 2px solid #333; width: 700px; margin: 0 auto;">
                            <h2 style="text-align:center; margin-bottom: 30px;">PHIẾU THU</h2>
                            <table style="width: 100%; font-size: 16px; line-height: 1.6; margin-left: 20%;">
                                <tr>
                                    <td style="width: 30%;"><strong>Mã phiếu thu:</strong></td>
                                    <td>' . $this->maPT . '</td>
                                </tr>
                                <tr>
                                    <td><strong>Nhân viên thu:</strong></td>
                                    <td>' . $tenNV . '</td>
                                </tr>
                                <tr>
                                    <td><strong>Mã học sinh:</strong></td>
                                    <td>' . $this->maHS . '</td>
                                </tr>
                                <tr>
                                    <td><strong>Người nộp:</strong></td>
                                    <td>' . $this->nguoinop . '</td>
                                </tr>
                                <tr>
                                    <td><strong>Số tiền:</strong></td>
                                    <td>' . $soTien . '</td>
                                </tr>
                                <tr>
                                    <td><strong>Ngày thu:</strong></td>
                                    <td>' . date('d/m/Y', strtotime($this->ngaythu)) . '</td>
                                </tr>
                            </table>
                
                            <div style="margin-top:50px; display: flex; justify-content: space-between; font-size: 16px;">
                                <div style="text-align: center;">
                                    <strong>Người nộp tiền</strong><br><br><br>
                                    <span style="text-decoration: underline;">' . $this->nguoinop . '</span>
                                </div>
                                <div style="text-align: center;">
                                    <strong>Nhân viên thu</strong><br><br><br>
                                    <span style="text-decoration: underline;">' . $tenNV . '</span>
                                </div>
                            </div>
                        </div>
                    ';
                })->unescape();
                
    
                $show->panel()
                    ->tools(function ($tools) {
                        $tools->disableEdit();
                        $tools->disableDelete();
                    });
            }));
        });
    }
    
    

}
