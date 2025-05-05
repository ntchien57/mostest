<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\HocSinh;
use App\Models\LichThi;
use App\Models\NhanVien;
use App\Models\ThiSinhDuThi;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class ThiSinhDuThiController extends Controller
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

            $content->header('Quản lý thí sinh dự thi ');
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

            $content->header('Sửa thí sinh dự thi');
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

            $content->header('Thêm mới thí sinh dự thi');
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
        $grid = new Grid(new ThiSinhDuThi());

        $grid->maTS('Mã thí sinh');
        $grid->tenTS('Tên thí sinh');
        $grid->diachi('Địa chỉ');
        $grid->email('Email');
        $grid->ngaysinh('Ngày sinh');
        $grid->sdt('Số điện thoại');
        $grid->gioitinh('Giới tính')->display(function ($value) {
            return $value == 0 ? 'Nam' : 'Nữ';
        });
        $grid->cmnd('CMND');

        // Hiển thị lịch thi dạng chi tiết giống trong select
        $grid->maLT('Lịch thi')->display(function ($maLT) {
            $lichthi = \DB::table('lichthi')
                ->join('linhvuc', 'lichthi.maLV', '=', 'linhvuc.maLV')
                ->where('lichthi.maLT', $maLT)
                ->select('lichthi.maLT', 'linhvuc.tenLV', 'lichthi.maphongthi', 'lichthi.ngaythi', 'lichthi.loai')
                ->first();
        
            if ($lichthi) {
                $loaiThi = $lichthi->loai == 1 ? 'Thi thật' : 'Thi thử';
                return "{$lichthi->maLT} - {$lichthi->tenLV} - Phòng thi: {$lichthi->maphongthi} - Ngày thi: {$lichthi->ngaythi} - {$loaiThi}";
            }
        
            return $maLT;
        });
        

        $grid->disableExport(); // Tùy chọn: tắt export nếu không cần
        $grid->filter(function ($filter) {
            $filter->like('maTS', 'Mã thí sinh');
            $filter->like('tenTS', 'Tên thí sinh');
            $filter->equal('maLT', 'Lịch thi')->select(
                \DB::table('lichthi')
                    ->join('linhvuc', 'lichthi.maLV', '=', 'linhvuc.maLV')
                    ->select('lichthi.maLT', \DB::raw("CONCAT(lichthi.maLT, ' - ', linhvuc.tenLV) as label"))
                    ->pluck('label', 'maLT')
                    ->toArray()
            );
        });

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(ThiSinhDuThi::class, function (Form $form) {
            $form->text('maTS', 'Mã thí sinh dự thi')->required();
            $form->text('tenTS', 'Tên thí sinh dự thi')->required();
            $form->text('diachi', 'Địa chỉ')->required();
            $form->email('email', 'Email')->required();
            $form->date('ngaysinh', 'Ngày sinh')->required();
            $form->text('sdt', 'Số điện thoại')->required();
            $form->radio('gioitinh', 'Giới tính')->options(['0' => 'Nam', '1' => 'Nữ'])->default('0');
            $form->text('cmnd', 'CMND')->required();

            $form->select('maLT', 'Lịch thi')->options(
                DB::table('lichthi')
                    ->join('linhvuc', 'lichthi.maLV', '=', 'linhvuc.maLV')
                    ->select(
                        'lichthi.maLT',
                        DB::raw("
                            CONCAT(
                                lichthi.maLT, ' - ',
                                linhvuc.tenLV, ' - Phòng thi: ', lichthi.maphongthi,
                                ' - Ngày thi: ', lichthi.ngaythi,
                                ' - ', 
                                CASE WHEN lichthi.loai = 1 THEN 'Thi thật' ELSE 'Thi thử' END
                            ) as label
                        ")
                    )
                    ->pluck('label', 'maLT')
                    ->toArray()
            )->required();
            

            $form->disableViewCheck();
            $form->disableEditingCheck();
            $form->disableCreatingCheck();

            // === Thêm đoạn script để tự động fill 'nguoinop'
            $form->html('
            <script>
                $(document).ready(function () {
                    $("input[name=\'maTS\']").on("blur", function () {
                        var maTS = $(this).val();
                        if (maTS) {
                            $.ajax({
                                url: "/admin/api/get-hocsinh",
                                type: "GET",
                                data: { q: maTS },
                                success: function (res) {
                                    if (res.success) {
                                        const data = res.data;
                                        $("input[name=\'tenTS\']").val(data.tenHS);
                                        $("input[name=\'diachi\']").val(data.diachi);
                                        $("input[name=\'email\']").val(data.email);
                                        $("input[name=\'ngaysinh\']").val(data.ngaysinh);
                                        $("input[name=\'sdt\']").val(data.sdt);
                                        $("input[name=\'cmnd\']").val(data.cmnd);
                                        $("input[name=\'gioitinh\'][value=\'" + data.gioitinh + "\']").prop("checked", true);
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
            $content->header('Chi tiết thí sinh dự thi');
            $content->description('');
    
            $content->body(Admin::show(ThiSinhDuThi::with('nhanVien')->findOrFail($id), function (Show $show) {
    
                $show->field('html_preview', 'Hóa đơn')->as(function () {
                    $tenNV = optional($this->nhanVien)->tenNV;
                    $soTien = number_format($this->sotien, 0, ',', '.') . ' VND';
                    return '
                        <div style="padding: 30px; font-family: DejaVu Sans, Arial, sans-serif; border: 2px solid #333; width: 700px; margin: 0 auto;">
                            <h2 style="text-align:center; margin-bottom: 30px;">thí sinh dự thi</h2>
                            <table style="width: 100%; font-size: 16px; line-height: 1.6; margin-left: 20%;">
                                <tr>
                                    <td style="width: 30%;"><strong>Mã thí sinh dự thi:</strong></td>
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
