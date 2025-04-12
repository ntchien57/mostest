<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShopBrand;
use App\Models\ShopCategory;
use App\Models\ShopOption;
use App\Models\ShopOptionDetail;
use App\Models\ShopProduct;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;


class ShopProductController extends Controller
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
                $content->header('Quản lý sản phẩm');
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

            $content->header('Chỉnh sửa sản phẩm');
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

            $content->header('Tạo sản phẩm mới');
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
        return Admin::grid(ShopProduct::class, function (Grid $grid) {

            // $grid->id('ID')->sortable();
            $grid->name('Tên sản phẩm')->sortable();
            $grid->category('Danh mục')->display(function ($cate) {
                return $cate['name'];
            });
            $grid->image('Hình ảnh')->image();
  
            $grid->price('Giá bán')->display(function ($price) {
                return number_format($price);
            });
            $grid->quantity('Tồn kho');
           
            
            $grid->column('created_at', 'Ngày tạo')->display(function ($created_at) {
                return date('d-m-Y', strtotime($created_at));
            });
            $grid->column('flash_active', 'Giảm giá giờ vàng')->display(function ($flashActive) {
                return $flashActive ? '<span class="label label-success">Đang diễn ra</span>' : '<span class="label label-danger">Chưa diễn ra</span>';
            });
            // $grid->updated_at('Lần cuối chỉnh sửa');
            $grid->model()->orderBy('id', 'desc');
            $grid->disableExport();
            $grid->disableFilter();
            $grid->disableColumnSelector();
            $grid->disableRowSelector();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($id = null)
    {

        return Admin::form(ShopProduct::class, function (Form $form) use ($id) {
            $form->tab('Thông tin sản phẩm', function ($form) {

                $arrBrand = ShopBrand::pluck('name', 'id')->all();
                $arrBrand = ['0' => '-- Chọn nhãn hiệu --'] + $arrBrand;
                $form->text('name', 'Tên sản phẩm')->rules('required', [
                    'required' => 'Bạn chưa nhập tên sản phẩm']);

                $arrCate = (new ShopCategory)->listCate();
                $form->select('category_id', 'Danh mục')->options($arrCate)->rules('required', [
                    'required' => 'Bạn chưa chọn danh mục']
                );
            

                $form->image('image', 'Hình ảnh')->uniqueName()->move('product');
             
                $form->ckeditor('description', 'Mô tả');

                $form->ckeditor('content', 'Nội dung');
    
                $form->currency('price', 'Giá bán')->symbol('VND')->options(['digits' => 0]);
                $form->text('quantity', 'Tồn kho')->options(['digits' => 0]);
                $form->currency('unpromotion_price', 'Giá trước khi giảm')->symbol('VND')->options(['digits' => 0]);
                $form->currency('flash_price', 'Giảm giá giờ vàng')->symbol('VND')->options(['digits' => 0]);
                $form->datetime('start_time', 'Thời gian bắt đầu');
                $form->datetime('end_time', 'Thời gian kết thúc');
                

                // $form->divide();
                $form->radio('type', 'Loại sản phẩm')->options($this->arrType)->default('0');
              
                $form->disableViewCheck();
                $form->disableEditingCheck();
                $form->disableCreatingCheck();



            })
            ->tab('Hình ảnh phụ', function ($form) {
                $form->hasMany('images', 'Hình ảnh phụ', function (Form\NestedForm $form) {
                    $form->image('image', 'Hình ảnh nhỏ')->uniqueName()->move('product_slide');
                });

            });
//             
        });

    }

/**
 * Report product
 * @return [type] [description]
 */
    protected function report()
    {
        return Admin::grid(ShopProduct::class, function (Grid $grid) {

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
    //         $content->body(Admin::show(ShopProduct::findOrFail($id)));
    //     });

    // }
    public function show($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('');
            $content->description('');
            $content->body(Admin::show(ShopProduct::findOrFail($id), function (Show $show) {
                $show->id('ID');
            }));
        });
    }
}
