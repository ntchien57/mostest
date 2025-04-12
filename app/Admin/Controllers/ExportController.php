<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShopBrand;
use App\Models\ShopCategory;
use App\Models\ShopOption;
use App\Models\ShopOptionDetail;
use App\Models\ExportWarehouse;
use App\Models\ShopProduct;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    use ModelForm;
    public $arrType = ['0' => 'Mặc định', '2' => "Hot"];
 

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $action = \Request::input('action');
            if ($action == 'report') {
                $content->header('Thống kê sản phẩm');
                $content->body($this->report());
            } else {
                $content->header('Lịch sử xuất kho');
                // $content->description('description');
                $content->body($this->grid());
            }

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

            $content->header('Nhập kho sản phẩm');
            // $content->description('description');

            $content->body($this->form($id)->edit($id));
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

            $content->header('Xuất kho sách');
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
        return Admin::grid(ExportWarehouse::class, function (Grid $grid) {

            // $grid->id('ID')->sortable();
            // $grid->name('Tên sản phẩm')->sortable();
            $grid->product('Tên sách')->display(function ($cate) {
                return $cate['name'];
            });
            $grid->column('Danh mục')->display(function () {
                $cateId = $this->product->category_id;
                $nameCate = ShopCategory::find($cateId);
                return $nameCate['name'];
            });
            // $grid->image('Hình ảnh')->image();
  
            // $grid->price('Giá bán')->display(function ($price) {
            //     return number_format($price);
            // });
            $grid->quantity('Số lượng xuất');
           
            $grid->column('Tồn kho')->display(function () {
                return $this->product->quantity;
            });
            
            $grid->column('created_at', 'Ngày xuất')->display(function ($created_at) {
                return date('d-m-Y', strtotime($created_at));
            });
            // $grid->updated_at('Lần cuối chỉnh sửa');
            $grid->model()->orderBy('id', 'desc');
            $grid->disableExport();
            $grid->disableFilter();
            $grid->disableColumnSelector();
            $grid->disableRowSelector();
            $grid->disableActions();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id = null)
    {

        $custom = Admin::form(ExportWarehouse::class, function (Form $form) use ($id) {
            $form->tab('Xuất kho sách', function ($form) {

                $arrCate = (new ShopProduct)->listCate();
                $form->select('product_id', 'Tên sách')->options($arrCate)->rules('required', [
                    'required' => 'Bạn chưa chọn sách']
                );
                         
                $form->text('quantity', 'Số lượng xuất')->rules('required', [
                    'required' => 'Bạn chưa nhập số lượng']
                );
                $form->datetime('created_at','Thời gian');
                $form->saving(function (Form $form) {
                    $productId = $form->product_id;
                    // dd($productId);
                    $pro = ShopProduct::find($productId); 
                    $pro['quantity'] = $pro['quantity'] - $form->quantity;
                    $pro->save();
                });
                $form->disableViewCheck();
                $form->disableEditingCheck();
                $form->disableCreatingCheck();
            });             
        });
        
         
        return $custom;


    }

/**
 * Report product
 * @return [type] [description]
 */
    protected function report()
    {
        return Admin::grid(ExportWarehouse::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->sku('Mã hàng')->sortable();
            $grid->name('Tên sản phẩm')->sortable();
            $grid->category('Danh mục')->display(function ($cate) {
                return $cate['name'];
            });
            $grid->cost('Giá cost')->display(function ($price) {
                return number_format($price);
            })->sortable();
            $grid->price('Giá bán')->display(function ($price) {
                return number_format($price);
            })->sortable();
            $grid->stock('Tồn kho')->sortable();
            $grid->sold('Bán ra')->sortable();
            $arrType = $this->arrType;
            $grid->type('Loại sản phẩm')->display(function ($type) use ($arrType) {
                $style = ($type == 1) ? 'class="label label-success"' : (($type == 2) ? '  class="label label-danger"' : 'class="label label-default"');
                return '<span ' . $style . '>' . $arrType[$type] . '</span>';
            });
            $grid->status('Trạng thái')->display(function ($stt) {
                return ($stt) ? 'Actie' : 'Disabled';
            });
            $grid->model()->orderBy('id', 'desc');
            $grid->disableExport();
            $grid->disableCreateButton();
            $grid->disableRowSelector();
            $grid->disableActions();
        });
    }

    // public function show($id)
    // {
    //     return Admin::content(function (Content $content) use ($id) {

    //         $content->header('Post');
    //         $content->description('Detail');
    //         $content->body(Admin::show(ExportWarehouse::findOrFail($id)));
    //     });

    // }
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('');
            $content->description('');
            $content->body(Admin::show(ExportWarehouse::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }
}
