<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CmsNews;
use App\Models\CmsPage;
use App\Models\CmsCategory;
use App\Models\CmsContent;
use App\Models\Config;
use App\Models\ShopBrand;
use App\Models\ShopCategory;
use App\Models\ShopOrder;
use App\Models\ShopOrderDetail;
use App\Models\ShopOrderHistory;
use App\Models\ShopOrderTotal;
use App\Models\ShopProduct;
use App\Models\ShopProductType;
use App\Models\ShopContact;
use App\Models\ShopDocument;
use App\User;
// use Illuminate\Support\Facades\Request;
use Cart;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Promocodes;
use App\Promocodes\Models\Promocode;
use App\Models\PromoCodeUser;
use Session;
use View;

//use Illuminate\Http\Request;
class shop extends Controller
{
    ////
    public $banners;
    public $news;
    public $news_lm5;
    public $newsCategories;
    public $notice;
    public $contact;
    public $cartCount;
    public $products_hot_lm4;
    public $products_new_lm4;



    //////
    public $brands;
    public $categories;
    public $configs;
    public $theme       = "user";
    public $theme_asset = "user";


    public function __construct()
    {
        $host = request()->getHost();
        config(['app.url' => 'http://' . $host]);
        //End demo multihost
        $this->banners = Banner::where('status', 1)->where('type', 1)->orderBy('sort', 'desc')->orderBy('id', 'desc')->get();
        $this->news    = (new CmsNews)->getItemsNews($limit = 8, $opt = 'paginate');
        $this->news_lm5    = (new CmsNews)->getItemsNews($limit = 5, $opt = 'paginate');
        $this->notice  = (new CmsPage)->where('uniquekey', 'notice')->where('status', 1)->first();
        $this->newsCategories = (new CmsCategory)->getCategories(0);
        //////

        $this->brands     = ShopBrand::getBrands();
        // $this->contact     = ShopBrand::getBrands();
        $this->categories = ShopCategory::getCategories(0);
        $this->configs    = Config::pluck('value', 'key')->all();
        $this->cartCount = Cart::content()->unique('id')->count();

//Config for  SMTP
        config(['app.name' => $this->configs['site_title']]);
        config(['mail.driver' => ($this->configs['smtp_mode']) ? 'smtp' : 'sendmail']);
        config(['mail.host' => empty($this->configs['smtp_host']) ? env('MAIL_HOST', '') : $this->configs['smtp_host']]);
        config(['mail.port' => empty($this->configs['smtp_port']) ? env('MAIL_PORT', '') : $this->configs['smtp_port']]);
        config(['mail.encryption' => empty($this->configs['smtp_security']) ? env('MAIL_ENCRYPTION', '') : $this->configs['smtp_security']]);
        config(['mail.username' => empty($this->configs['smtp_user']) ? env('MAIL_USERNAME', '') : $this->configs['smtp_user']]);
        config(['mail.password' => empty($this->configs['smtp_password']) ? env('MAIL_PASSWORD', '') : $this->configs['smtp_password']]);
        config(['mail.from' =>
            ['address' => $this->configs['site_email'], 'name' => $this->configs['site_title']]]
        );
//
        View::share('newsCategories', $this->newsCategories);
        View::share('categories', $this->categories);
        View::share('cartCount', $this->cartCount);
        View::share('brands', $this->brands);
        View::share('banners', $this->banners);
        View::share('configs', $this->configs);
        View::share('news', $this->news);
        View::share('news_lm5', $this->news_lm5);
        View::share('theme_asset', $this->theme_asset);
        View::share('theme', $this->theme);
        View::share('products_hot', (new ShopProduct)->getProducts(2));
        View::share('products_hot_lm4', (new ShopProduct)->getProducts(2, $limit = 4));
        View::share('products_new_lm4', (new ShopProduct)->getProducts(0, $limit = 4, $sort_by = 'id', $order_by = 'desc'));
        View::share('products_new', (new ShopProduct)->getProducts(0, $limit = 8, $sort_by = 'id', $order_by = 'desc'));
        View::share('logo', Banner::where('status', 1)->where('type', 0)->orderBy('sort', 'desc')->orderBy('id', 'desc')->first());
        View::share('blogs_limit5' , CmsContent::where('status', 1)->orderByDesc('id')->limit(5)->get());

    }
/**
 * [index description]
 * @return [type] [description]
 */
    public function index(Request $request)
    {
        $banner = ['0' => 'Logo', '1' => 'Banner lớn', '2' => 'Banner nhỏ', '3' => 'Banner khác'];
        $blog_first = CmsContent::where('status', 1)->orderByDesc('id')->first();
        $categories_hot = ShopCategory::where('status', 1)->where('hot',1)->get();
        return view($this->theme . '.home.shop_home',
            array(
                'title'         => $this->configs['site_title'],
                'title_h1'      => 'Sản phẩm mới',
                'description'   => $this->configs['site_description'],
                'keyword'       => $this->configs['site_keyword'],
                'banners_top'   => Banner::where('status', 1)->where('type', 1)->orderBy('sort', 'asc')->orderBy('id', 'desc')->get(),
                'banners_left'  => Banner::where('status', 1)->where('type', 2)->orderBy('sort', 'desc')->orderBy('id', 'desc')->first(),
                'banners_right' => Banner::where('status', 1)->where('type', 3)->orderBy('sort', 'desc')->orderBy('id', 'desc')->limit(2)->get(),
                'banners'       => Banner::where('status', 1)->where('type', 1)->orderBy('sort', 'desc')->orderBy('id', 'desc')->get(),
                'notice'        => $this->getPage('notice'),
                'products_new'  => (new ShopProduct)->getProducts($type = 1, $limit = 8, $opt = null),
                'home_page'     => 1,
                'blogs'         => (new CmsNews)->getItemsNews($limit = 8),
                'documents'         => (new ShopDocument)->getDocumentByLimit($limit = 8),
                'blog_first' => $blog_first,
                'blogs_all' => CmsContent::where('status', 1)->orderByDesc('id')->limit(5)->get(),
                'categories_hot'=>$categories_hot,
                'productsFlashsale' => ShopProduct::where('flash_active',1)->orderBy('id', 'desc')->get()
            )
        );
    }

/**
 * [productToCategory description]
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
    public function productToCategory(Request $request, $name, $id)
    {
        $category = (new ShopCategory)->find($id);
        if ($category) {
            $keyword = $request["keyword"];
            $sort_by = $request["sort_by"];
            $sort_order = $request["sort_order"];
            $brand = $request["brand"];
        $banner = Banner::inRandomOrder()->where('status', 1)->where('type',1)->first();

            //  return $brand;
            // return $category->id;
            $products = $category->getProductsToCategory($id = $category->id, $limit = 20, $opt = 'paginate', $sort_by, $sort_order, $brand, $keyword);
            // return $products;
            return view($this->theme . '.products.shop_products',
                array(
                    'title_h1'     => $category->name,
                    'title'        => $category->name,
                    'description'  => $category->description,
                    'sort_by'  => $sort_by,
                    'sort_order'  => $sort_order,
                    'brand'  => $brand,
                    'keyword'      => $this->configs['site_keyword'],
                    'categorySelf' => $category,
                    'products'     => $products,
                    'og_image'     => url('/') . '/documents/website/' . $category->image,
                    'banner' => $banner

                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Not found',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }

    }


/**
 * [productToCategory description]
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
public function articleToCategory(Request $request, $name, $id)
{
    $category = (new CmsCategory())->find($id);
    if ($category) {
        $keyword = $request["keyword"];
        $sort_by = $request["sort_by"];
        $sort_order = $request["sort_order"];
        $brand = $request["brand"];
        //  return $brand;
        $products = $category->getContentsToCategory($id = $category->id, $limit = 6, $otp = 'paginate');
        // return $products;
        return view($this->theme . '.cms_articles',
            array(
                'title_h1'     => $category->title,
                'title'        => $category->title,
                'description'  => $category->description,
                'sort_by'  => $sort_by,
                'sort_order'  => $sort_order,
                'brand'  => $brand,
                'keyword'      => $this->configs['site_keyword'],
                'categorySelf' => $category,
                'news'     => $products,
                'og_image'     => url('/') . '/documents/website/' . $category->image,
            )
        );
    } else {
        return view($this->theme . '.notfound',
            array(
                'title'       => 'Not found',
                'description' => '',
                'keyword'     => $this->configs['site_keyword'],
            )
        );
    }

}

public function allArticle(){
    $products = CmsContent::where('status', 1)->orderByDesc('id')->paginate(8);
    if ($products) {
        //  return $brand;
        // return $products;
        return view($this->theme . '.cms_articles',
            array(
                'title_h1'     => 'Tất cả bài viết',
                'title'        => 'Tất cả bài viết',
                'keyword'      => $this->configs['site_keyword'],   
                'news'     => $products,
            )
        );
    } else {
        return view($this->theme . '.notfound',
            array(
                'title'       => 'Not found',
                'description' => '',
                'keyword'     => $this->configs['site_keyword'],
            )
        );
    }  
}

/**
 * All products
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
    public function allProducts()
    {
        $products = ShopProduct::where('status', 1)
            ->orderBy('id', 'desc')->paginate(20);
        if ($products) {
            return view($this->theme . '.products.shop_products',
                array(
                    'title_h1'    => 'Sản phẩm -' . $this->configs['site_title'],
                    'title'       => 'Sản phẩm -' . $this->configs['site_title'],
                    'description' => $this->configs['site_description'],
                    'keyword'     => $this->configs['site_keyword'],
                    'products'    => $products,
                    'search_enable' => false
                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Not found',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }

    }
    public function allDocuments()
    {
        $documents = ShopDocument::where('status', 1)
            ->orderBy('id', 'desc')->paginate(10);
        if ($documents) {
            return view($this->theme . '.shop_documents',
                array(
                    'title_h1'    => 'Tài liệu -' . $this->configs['site_title'],
                    'title'       => 'Tài liệu -' . $this->configs['site_title'],
                    'description' => $this->configs['site_description'],
                    'keyword'     => $this->configs['site_keyword'],
                    'documents'    => $documents,
                    'search_enable' => false
                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Not found',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }

    }
/**
 * All products
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
    public function getHotProducts(Request $request)
    {
        $keyword = $request["keyword"];
        $sort_by = $request["sort_by"];
        $sort_order = $request["sort_order"];
        $banner = Banner::inRandomOrder()->where('status', 1)->where('type',1)->first();

        if($sort_by && $sort_order){
            $products = (new ShopProduct)->getProducts($type = 2, $limit = 12, $opt = 'paginate', $sort_by = $sort_by, $sort_order = $sort_order );
        }
        else{
            $products = (new ShopProduct)->getProducts($type = 2, $limit = 12, $opt = 'paginate');

        }

        
        if ($products) {
            return view($this->theme . '.products.shop_products',
                array(
                    'title_h1'    => 'Sản phẩm bán chạy - ' . $this->configs['site_title'],
                    'title'       => 'Sản phẩm bán chạy',
                    'description' => $this->configs['site_description'],
                    'keyword'     => $this->configs['site_keyword'],
                    'products'    => $products,
                    'search_enable' => false
                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Not found',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }

    }
/**
 * Promotion products
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
    public function promotionProducts(Request $request)
    {
        $keyword = $request["keyword"];
        $sort_by = $request["sort_by"];
        $sort_order = $request["sort_order"];
        $brand = $request["brand"];
        $products = (new ShopProduct)->searchByPromotion($keyword, $sort_by, $sort_order, $brand);
        $banner = Banner::inRandomOrder()->where('status', 1)->where('type',1)->first();
        // return $products;
        if ($products) {
            return view($this->theme . '.products.shop_products',
                array(
                    'title_h1'    => 'Sản phẩm đang khuyến mãi ',
                    'title'       => 'Sản phẩm đang khuyến mãi',
                    'description' => $this->configs['site_description'],
                    'keyword'     => $this->configs['site_keyword'],
                    'products'    => $products,
                    'sort_by'  => $sort_by,
                    'sort_order'  => $sort_order,
                    'brand'  => $brand,
                    'banner' => $banner
                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Not found',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }


    }

/**
 * [productDetail description]
 * @param  [type] $name [description]
 * @param  [type] $id   [description]
 * @return [type]       [description]
 */
    public function productDetail($name, $id)
    {
        $product = ShopProduct::find($id);
        $products_other = ShopProduct::where('status', 1)->where('category_id', $product->category_id)->where('id', '!=', $product->id)->orderByDesc('id')->get();
        if ($product && $product->status && ($this->configs['product_display_out_of_stock'] || $product->stock > 0)) {
            //Update last view
            $product->view += 1;
            $product->date_lastview = date('Y-m-d H:i:s');
            $product->save();
            $arrlastView      = empty(\Cookie::get('productsLastView')) ? array() : json_decode(\Cookie::get('productsLastView'), true);
            $arrlastView[$id] = date('Y-m-d H:i:s');
            arsort($arrlastView);
            \Cookie::queue('productsLastView', json_encode($arrlastView), (86400 * 30));
            //End last viewed

            //Check product available
            return view($this->theme . '.products.shop_product_detail',
                array(
                    'title_h1'           => $product->name,
                    'title'              => $product->name,
                    'description'        => $product->description,
                    'keyword'            => $product->keyword,
                    'product'            => $product,
                    'productsToCategory' => (new ShopCategory)->getProductsToCategory($id = $product->category_id, $limit = 8, $opt = 'random'),
                    'og_image'           => url('/') . '/documents/website/' . $product->image,
                    'products_other' => $products_other
                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Not found',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }

    }
    /**
     * [profile description]
     * @return [type] [description]
     */
    public function profile()
    {
        $id          = Auth::user()->id;
        $user        = User::find($id);
        $orders      = ShopOrder::with('orderTotal')->where('user_id', $id)->orderBy('id', 'desc')->get();
        $statusOrder = ['0' => 'Mới', '1' => 'Đang xử lý', '2' => 'Đang giao', '3' => 'Hủy bỏ', '4' => 'Hoàn thành'];
        return view($this->theme . '.shop_profile')->with(array(
            'title_h1'    => 'Trang khách hàng',
            'title'       => 'Trang khách hàng - ' . $this->configs['site_title'],
            'description' => '',
            'keyword'     => $this->configs['site_keyword'],
            'user'        => $user,
            'orders'      => $orders,
            'statusOrder' => $statusOrder,
        ));
    }

/**
 * Get list product follow brands
 * @param  int $id brand
 * @return view
 */
    public function product_brands($name, $id, $category = null)
    {
        $brand = ShopBrand::find($id);
        return view($this->theme . '.shop_products',
            array(
                'title'       => 'Thương hiệu '. $brand->name,
                'description' => '',
                'search_enable' => false,
                'page'        => 'products',
                'products'    => ShopProduct::where('status', 1)
                    ->orderBy('id', 'desc')->where('brand_id', $id)->paginate(9),
            )
        );
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

/**
 * Remove item from cart
 * @author lanhktc
 */
    public function removeItem($id = null)
    {
        if ($id === null) {
            return redirect('gio-hang.html');
        }

        if (array_key_exists($id, Cart::content()->toArray())) {
            Cart::remove($id);
        }

        return redirect('gio-hang.html');
    }
/**
 * Remove item from cart
 * @author lanhktc
 */
    public function removeItemFromWl($id = null)
    {
        if ($id === null) {
            return redirect('wishlist.html');
        }

        if (array_key_exists($id, Cart::instance('wishlist')->content()->toArray())) {
            Cart::instance('wishlist')->remove($id);
        }

        return redirect('wishlist.html');
    }
/**
 * Store card
 * @author lanhktc
 * @return boolean
 */
    public function storecart(Request $request)
    {
        if (Cart::count() == 0) {
            return redirect('/');
        }
        if (!$this->configs['shop_allow_guest'] && !Auth::user()) {
            return redirect('login');
        }
        $messages = [
            'max'               => 'Chiều dài tối đa :max.',
            'toname.required'   => 'Bạn chưa nhập tên.',
            // 'address1.required' => 'Bạn chưa nhập địa chỉ nhà.',
            // 'address2.required' => 'Bạn chưa nhập quận huyện.',
            'phone.required'    => 'Bạn chưa nhập số điện thoại.',
            'phone.regex'       => 'Số điện thoại chưa đúng.',
        ];
        // $v = Validator::make($request->all(), [
        //     'toname'   => 'required|max:100',
        //     // 'address1' => 'required|max:100',
        //     // 'address2' => 'required|max:100',
        //     'phone'    => 'required|regex:/^0[^0][0-9\-]{7,13}$/',
        // ], $messages);
        // if ($v->fails()) {
        //     return redirect()->back()->withInput()->withErrors($v->errors());
        // }
        try {
            DB::connection('mysql')->beginTransaction();
            $objects                     = array();
            $objects[]                   = (new ShopOrderTotal)->getShipping(); //module shipping
            $objects[]                   = (new ShopOrderTotal)->getDiscount(); //module discount
            $objects[]                   = (new ShopOrderTotal)->getReceived(); //module reveived
            $dataTotal                   = ShopOrderTotal::processDataTotal($objects); //sumtotal and re-sort item total
            $subtotal                    = (new ShopOrderTotal)->sumValueTotal('subtotal', $dataTotal);
            $shipping                    = (new ShopOrderTotal)->sumValueTotal('shipping', $dataTotal); //sum shipping
            $discount                    = (new ShopOrderTotal)->sumValueTotal('discount', $dataTotal); //sum discount
            $received                    = (new ShopOrderTotal)->sumValueTotal('received', $dataTotal); //sum received
            $total                       = (new ShopOrderTotal)->sumValueTotal('total', $dataTotal);
            $arrOrder['user_id']         = empty(Auth::user()->id) ? 0 : Auth::user()->id;
            $arrOrder['subtotal']        = $subtotal;
            $arrOrder['shipping']        = $shipping;
            $arrOrder['discount']        = $discount;
            $arrOrder['received']        = $received;
            $arrOrder['payment_status']  = 0;
            $arrOrder['shipping_status'] = 0;
            $arrOrder['status']          = 0;
            $arrOrder['total']           = $total;
            $arrOrder['balance']         = $total + $received;
            $arrOrder['toname']          = $request->get('toname');
            $arrOrder['address1']        = $request->get('address1') ? $request->get('address1') : "";
            $arrOrder['address2']        = $request->get('address2')? $request->get('address2') : "";
            $arrOrder['phone']           = $request->get('phone');
            $arrOrder['comment']         = $request->get('comment');
            $arrOrder['created_at']      = date('Y-m-d H:i:s');

            //Insert to Order
            $orderId = ShopOrder::insertGetId($arrOrder);
            //

            //Insert order total
            ShopOrderTotal::insertTotal($dataTotal, $orderId);
            //End order total

            foreach (Cart::content() as $value) {
                $product                  = ShopProduct::find($value->id);
                $arrDetail['order_id']    = $orderId;
                $arrDetail['product_id']  = $value->id;
                $arrDetail['name']        = $value->name;
                $arrDetail['price']       = $value->price;
                $arrDetail['qty']         = $value->qty;
                $arrDetail['type']        = $value->options->toJson();
                $arrDetail['sku']         = $product->sku;
                $arrDetail['total_price'] = $value->price * $value->qty;
                $arrDetail['created_at']  = date('Y-m-d H:i:s');
                ShopOrderDetail::insert($arrDetail);
                //If product out of stock
                if (!$this->configs['product_buy_out_of_stock'] && $product->stock < $value->qty) {
                    return redirect('/')->with('error', 'Mã hàng ' . $product->sku . ' vượt quá số lượng cho phép');
                } //
                $product->quantity -= $value->qty;
                $product->sold += $value->qty;
                $product->save();

            }

            Cart::destroy(); // destroy cart

            if (!empty(session('coupon'))) {
                Promocodes::apply(session('coupon'), $uID = null, $msg = 'Order #' . $orderId); // apply coupon
                $request->session()->forget('coupon'); //destroy coupon
            }

            //Add history
            $dataHistory = [
                'order_id' => $orderId,
                'content'  => 'New order',
                'user_id'  => empty(Auth::user()->id) ? 0 : Auth::user()->id,
                'add_date' => date('Y-m-d H:i:s'),
            ];
            ShopOrderHistory::insert($dataHistory);

            DB::connection('mysql')->commit();

            //Send email
            try {
                $data = ShopOrder::with('details')->find($orderId)->toArray();
                Mail::send('vendor.mail.order_new', $data, function ($message) use ($orderId) {
                    $message->to($this->configs['site_email'], $this->configs['site_title']);
                    $message->replyTo($this->configs['site_email'], $this->configs['site_title']);
                    $message->subject('[#' . $orderId . '] Đơn hàng mới!');
                });
            } catch (\Exception $e) {
                //
            } //

            return redirect('gio-hang.html')->with('message', 'ĐƠN HÀNG THÀNH CÔNG');
        } catch (\Exception $e) {
            DB::connection('mysql')->rollBack();
            echo 'Caught exception: ', $e->getMessage(), "\n";

        }

    }

/**
 * [addToCart description]
 * @param Request $request [description]
 */
    public function addToCart(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/gio-hang.html');
        }
        $instance = empty($request->get('instance')) ? 'default' : $request->get('instance');
        $id       = $request->get('id');
        $qty       = $request->get('qty');
        $product  = ShopProduct::find($id);
        if($qty > $product->quantity){
            return response()->json(
                [
                    'flg'   => 0,
                    'error' => 'Vượt quá số lượng trong kho ',
                ]
            );
        }
        if($qty < 0){
            return response()->json(
                [
                    'flg'   => 0,
                    'error' => 'Số lượng không được âm ',
                ]
            );
        }
        if ($instance == 'default') {
            //Cart
            //Condition:
            //1. Instock
            //2. Active
            //3. Date availabe
            if ($product->status != 0 and ($this->configs['product_preorder'] == 1 || $product->date_available == null || date('Y-m-d H:i:s') >= $product->date_available) and ($this->configs['product_buy_out_of_stock'] || $product->stock)) {

                if($product->flash_price > 0){
                    Cart::add(
                        array(
                            'id'    => $id,
                            'name'  => $product->name,
                            'qty'   => $qty,
                            'price' => $product->flash_price,
    
                        )
                    );
                }else{
                    Cart::add(
                        array(
                            'id'    => $id,
                            'name'  => $product->name,
                            'qty'   => $qty,
                            'price' => $product->getPrice($id),
    
                        )
                    );
                }
                
                   
                
            }

            $htmlCart = '';
            $cart     = Cart::content();
            foreach ($cart as $key => $item) {
                $product = ShopProduct::find($item->id);
                $htmlCart .= '<div class="cart-product">'.
                '<a href="'.url('san-pham/'.ktc_str_convert($item->name).'_'.$item->id.'.html').'" class="image">'.
                    '<img src="'.asset('documents/website/'.$product->image).'" alt="">'
                .'</a>'
                .'<div class="content">'
                    .'<h3 class="title">'
                        .'<a href="'.url('san-pham/'.$item->slug).'">'.$item->name.'</a>'
                    .'</h3>'
                    .'<p class="price"><span class="qty">'.$item->qty. '×</span>'.number_format($item->price,0,0,".").'đ</p>'
                    .'<a href="'.url("removeItem/$item->rowId").'" class="cross-btn"><i class="fas fa-times"></i></a>
                </div>
            </div>';
            }

        } else {
            //Wishlist or Compare...
            ${'arrID' . $instance} = array_keys(Cart::instance($instance)->content()->groupBy('id')->toArray());
            if (!in_array($id, ${'arrID' . $instance})) {
                Cart::instance($instance)->add(
                    array(
                        'id'    => $id,
                        'name'  => $product->name,
                        'qty'   => 1,
                        'price' => $product->getPrice($id),
                    )
                );
            } else {
                return response()->json(
                    [
                        'flg'   => 0,
                        'error' => 'Sản phẩm đã có sẵn trong ' . $instance,
                    ]
                );
            }
            $htmlCart = '';
        }

        return response()->json(
            [
                'flg'        => 1,
                'subtotal'   => number_format(Cart::instance($instance)->subtotal()),
                'count_cart' => Cart::instance($instance)->count(),
                'htmlCart'   => $htmlCart,
                'instance'   => $instance,
            ]
        );

    }

/**
 * [addToCart description]
 * @param Request $request [description]
 */
    public function updateToCart(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/gio-hang.html');
        }
        $id      = $request->get('id');
        $rowId   = $request->get('rowId');
        $product = ShopProduct::find($id);
        $new_qty = $request->get('new_qty');
        if ($product->stock < $new_qty && !$this->configs['product_buy_out_of_stock']) {
            return response()->json(
                ['flg' => 0,
                    'msg'  => 'Vượt quá số lượng cho phép.',
                ]);
        } else {
            Cart::update($rowId, ($new_qty) ? $new_qty : 0);
            return response()->json(
                ['flg' => 1,
                ]);
        }

    }
/**
 * [cart description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function cart(Request $request)
    {
//===update/ add new item to cart
        if ($request->isMethod('post')) {
            $product_id = $request->get('product_id');
            $opt_sku    = empty($request->get('opt_sku')) ? null : $request->get('opt_sku');
            $qty        = $request->get('qty');
            $product    = ShopProduct::find($product_id);
            //Condition:
            //In of stock
            //Active
            //Date availabe
            if ($product->status != 0 and ($this->configs['product_preorder'] == 1 || $product->date_available == null || date('Y-m-d H:i:s') >= $product->date_available) && ($this->configs['product_display_out_of_stock'] || $product->stock > 0)) {
                $options = array();
                if ($opt_sku != $product->sku && $opt_sku) {
                    $options[] = $opt_sku;
                }
                Cart::add(
                    array(
                        'id'      => $product_id,
                        'name'    => $product->name,
                        'qty'     => $qty,
                        'price'   => (new ShopProduct)->getPrice($product_id, $opt_sku),
                        'options' => $options,
                    )
                );
            }

        }
//====================================================
        $objects   = array();
        $objects[] = (new ShopOrderTotal)->getShipping();
        $objects[] = (new ShopOrderTotal)->getDiscount();
        $objects[] = (new ShopOrderTotal)->getReceived();
        $couponValue= 0;
        if (!empty(session('coupon'))) {
            $hasCoupon = true;
            $couponValue = (new ShopOrderTotal)->getDiscount()["value"];
        } else {
            $hasCoupon = false;
        }
        return view($this->theme . '.cart.shop_cart',
            array(

                'title_h1'    => 'Giỏ hàng',
                'title'       => 'Giỏ hàng' . ' - ' . $this->configs['site_title'],
                'description' => '',
                'keyword'     => '',
                'cart'        => Cart::content(),
                'dataTotal'   => ShopOrderTotal::processDataTotal($objects),
                'hasCoupon'   => $hasCoupon,
                'couponValue'   => $couponValue
            )
        );
    }
/**
 * [cart description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function wishlist(Request $request)
    {

        $wishlist = Cart::instance('wishlist')->content();
        return view($this->theme . '.shop_wishlist',
            array(

                'title_h1'    => 'Danh sách sản phẩm yêu thích',
                'title'       => 'Danh sách sản phẩm yêu thích',
                'description' => '',
                'keyword'     => '',
                'wishlist'    => $wishlist,
            )
        );
    }
/**
 * [product_type description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function product_type(Request $request)
    {
        $data         = $request->all();
        $product_type = ShopProductType::where('opt_sku', $data['sku'])->first();
        if ($product_type) {
            $response = array('error' => 0, 'name' => $product_type->opt_name, 'price' => $product_type->opt_price, 'sku' => $product_type->opt_sku, 'image' => $product_type->opt_image);
        } else {
            $response = array('error' => 1, 'msg' => 'Not found');
        }
        return response()->json(
            $response
        );
    }

/**
 * [clear_cart description]
 * @return [type] [description]
 */
    public function clear_cart()
    {
        Cart::destroy();
        return redirect('/gio-hang.html');
    }

/**
 * [usePromotion description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function usePromotion(Request $request)
    {
        if ($this->configs['promotion_mode'] != 1) {
            return false;
        }
        $html   = '';
        $code   = $request->get('code');
        $action = $request->get('action');
        // if ($action === 'remove') {
        //     $request->session()->forget('coupon'); //destroy coupon
        //     $objects   = array();
        //     $objects[] = (new ShopOrderTotal)->getShipping();
        //     $objects[] = (new ShopOrderTotal)->getDiscount();
        //     $objects[] = (new ShopOrderTotal)->getReceived();
        //     $dataTotal = ShopOrderTotal::processDataTotal($objects);
        //     foreach ($dataTotal as $key => $element) {
        //         if ($element['value'] != 0) {
        //             $html .= "<tr class='showTotal'>
        //                  <th>" . $element['title'] . "</th>
        //                 <td style='text-align: right' id='" . $element['code'] . "'>" . number_format($element['value']) . " VNĐ</td>
        //             </tr>";
        //         }

        //     }
        //     return json_encode(['html' => $html]);
        // }

        // $check = json_decode(Promocodes::check($code), true);

        $check = Promocode::where('code', $code)->first();
        $userId = Auth::user()->id;
        $checkUser = PromoCodeUser::where('promocode_id', $check['id'])->where('user_id', $userId)->first();
    
        if($check == null){
            $error = 1;
            $value = 0;
            $msg = "Mã giảm giá không hợp lệ!";
        }elseif ($check != null && $checkUser != null) {
            $error = 1;
            $value = 0;
            $msg = "Bạn đã dùng mã giảm giá này rồi!";
        } else {
           
                $arrType = [
                    '0' => 'VNĐ',
                    '1' => 'Point',
                    '2' => '%',
                ];
                $error = 0;
                $msg   = "Mã giảm giá có giá trị " . number_format($check['reward']) . $arrType[$check['type']] . " cho đơn hàng này.";
                $request->session()->put('coupon', $code);

                $objects   = array();
                $objects[] = (new ShopOrderTotal)->getShipping();
                $objects[] = (new ShopOrderTotal)->getDiscount();
                $objects[] = (new ShopOrderTotal)->getReceived();
                $dataTotal = ShopOrderTotal::processDataTotal($objects);
                $value =  $check['reward'];
                foreach ($dataTotal as $key => $element) {
                    if ($element['value'] != 0) {
                        if ($element['code'] == 'total') {
                            // $html .= "<tr class='showTotal'  style='background:#f5f3f3;font-weight: bold;'>";
                            $afterCoupon = $element['value'] - $value;
                            $html .= "<th>" . $element['title'] . "</th>
                        <td style='text-align: right' id='" . $element['code'] . "'><strong><span class='woocommerce-Price-amount amount'>" . number_format($afterCoupon) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span></strong> </td>
                        
                   ";}


                        // } else {
                        //     $html .= "<tr class='showTotal'>";
                        // }

                        
                    }

                }
            }

        // }
        return json_encode(['error' => $error, "value" => number_format($value), 'msg' => $msg, 'html' => $html, 'code' =>$code, 'check' =>$check]);
        // return json_encode(['error' => $error, 'msg' => $msg, 'html' => $html, 'code' =>$code]);

    }

/**
 * [search description]
 * @param  Request $request [description]
 * @return [type]           [description]
 */
    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $sort_by = $request["sort_by"];
        $sort_order = $request["sort_order"];
        $brand = $request["brand"];
        return view($this->theme . '.products.shop_products',
            array(
                'title'         => 'Tìm kiếm: ' . $keyword,
                'title_h1'      => 'Kết quả từ khóa: <span style="color:red;font-style:italic">' . $keyword . '</span>',
                'description'   => '',
                'sort_by'  => $sort_by,
                'sort_order'  => $sort_order,
                'brand'  => $brand,
                'search_keyword'       => $keyword,
                'products'      => ShopProduct::resultSearch($keyword, $sort_by, $sort_order, $brand),
                'products_left' => (new ShopProduct)->getProducts($type = null, $limit = 2, $opt = 'random'),
            ));
    }

    //=======================CMS================================================================
    /**
     * [pages description]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function pages($key = null)
    {

        $page = $this->getPage($key);
        if ($page) {
            return view($this->theme . '.cms_page',
                array(
                    'title'         => $page->title,
                    'title_h1'      => $page->title,
                    'description'   => '',
                    'keyword'       => $this->configs['site_keyword'],
                    'page'          => $page,
                    'products_left' => (new ShopProduct)->getProducts($type = null, $limit = 2, $opt = 'random'),

                ));
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Không tìm thấy dữ liệu',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],

                )
            );
        }

    }
/**
 * [login description]
 * @return [type] [description]
 */
    public function login()
    {
        if (Auth::user()) {
            return Redirect::away('/');
        }
        return view($this->theme . '.shop_login',
            array(
                'title'       => 'Trang đăng nhập',
                'title_h1'    => '',
                'description' => '',
                'keyword'     => $this->configs['site_keyword'],
            )
        );
    }

/**
 * [login description]
 * @return [type] [description]
 */
    public function forgot()
    {
        if (Auth::user()) {
            return Redirect::away('/');
        }
        return view($this->theme . '.shop_forgot',
            array(
                'title'       => 'Quên mật khẩu',
                'title_h1'    => '',
                'description' => '',
                'keyword'     => $this->configs['site_keyword'],
            )
        );
    }

/**
 * [getPage description]
 * @param  [type] $key [description]
 * @return [type]      [description]
 */
    public function getPage($key = null)
    {
        $key = ($key == null || $key == '') ? 'trang-chu' : $key;
        return CmsPage::where('uniquekey', $key)->where('status', 1)->first();
    }

    public function updatePromotion($code, $action = "apply")
    {

    }

/**
 * [login description]
 * @return [type] [description]
 */
    public function getContact()
    {
        $page = $this->getPage('lien-he');
        return view($this->theme . '.shop_contact',
            array(
                'title'       => 'Liên hệ',
                'title_h1'    => '',
                'description' => '',
                'page'        => $page,
                'keyword'     => $this->configs['site_keyword'],
                'og_image'    => url('/') . 'logo.png',
            )
        );
    }
/**
 * [login description]
 * @return [type] [description]
 */
    public function getCheckout(Request $request)
    {
        //===update/ add new item to cart
        if ($request->isMethod('post')) {
            $product_id = $request->get('product_id');
            $opt_sku    = empty($request->get('opt_sku')) ? null : $request->get('opt_sku');
            $qty        = $request->get('qty');
            $product    = ShopProduct::find($product_id);
            //Condition:
            //In of stock
            //Active
            //Date availabe
            if ($product->status != 0 and ($this->configs['product_preorder'] == 1 || $product->date_available == null || date('Y-m-d H:i:s') >= $product->date_available) && ($this->configs['product_display_out_of_stock'] || $product->stock > 0)) {
                $options = array();
                if ($opt_sku != $product->sku && $opt_sku) {
                    $options[] = $opt_sku;
                }
                Cart::add(
                    array(
                        'id'      => $product_id,
                        'name'    => $product->name,
                        'qty'     => $qty,
                        'price'   => (new ShopProduct)->getPrice($product_id, $opt_sku),
                        'options' => $options,
                    )
                );
            }

        }
//====================================================
        $objects   = array();
        $objects[] = (new ShopOrderTotal)->getShipping();
        $objects[] = (new ShopOrderTotal)->getDiscount();
        $objects[] = (new ShopOrderTotal)->getReceived();
        $couponValue= 0;
        if (!empty(session('coupon'))) {
            $hasCoupon = true;
            $couponValue = number_format(abs((new ShopOrderTotal)->getDiscount()["value"]));
        } else {
            $hasCoupon = false;
        }
        return view($this->theme . '.cart.shop_checkout',
            array(

                'title_h1'    => 'Giỏ hàng',
                'title'       => 'Giỏ hàng' . ' - ' . $this->configs['site_title'],
                'description' => '',
                'keyword'     => '',
                'cart'        => Cart::content(),
                'dataTotal'   => ShopOrderTotal::processDataTotal($objects),
                'hasCoupon'   => $hasCoupon,
                'couponValue'   => $couponValue
            )
        );
    }
/**
 * [login description]
 * @return [type] [description]
 */
    public function getIntroduction()
    {
        $page = $this->getPage('gioi-thieu');
        return view($this->theme . '.shop_introduction',
            array(
                'title'       => 'Giới thiệu',
                'title_h1'    => '',
                'description' => '',
                'page'        => $page,
                'keyword'     => $this->configs['site_keyword'],
                'og_image'    => url('/') . 'logo.png',
            )
        );
    }

    public function postContact(Request $request)
    {
        
        //Send email
        try {
            $data            = $request->all();
            $data['content'] = str_replace("\n", "<br>", $data['content']);
            ShopContact::insert(["name"=> $data["name"], "title"=> $data["title"], "content"=> $data["content"],"email"=> $data["email"],"phone"=> $data["phone"], "created_at" => \Carbon\Carbon::now()  ]);
            // Mail::send('vendor.mail.contact', $data, function ($message) use ($data) {
            //     $message->to($this->configs['site_email'], $this->configs['site_title']);
            //     $message->replyTo($data['email'], $data['name']);
            //     $message->subject($data['title']);
            // });
            return redirect('lien-he.html')->with('message', 'Cảm ơn bạn. Chúng tôi sẽ liên hệ sớm nhất có thể!');

        } catch (\Exception $e) {
            return $e;
            echo $e->getMessage();
        } //

        // dd($data);
    }

    public function postContactLite(Request $request)
    {
        $validator = $request->validate([
            'phone'   => 'required|regex:/^0[^0][0-9\-]{7,13}$/'
        ], [
            'phone.required'   => 'Bạn chưa nhập số điện thoại',
            'phone.regex'      => 'Số điện thoại chưa đúng',
        ]);
        //Send email
        try {
            $data            = $request->all();
            // return $data      ;
            ShopContact::insert(["phone"=> $data["phone"], "created_at" => \Carbon\Carbon::now() ]);
            // return 1;

            // Mail::send('vendor.mail.contact', $data, function ($message) use ($data) {
            //     $message->to($this->configs['site_email'], $this->configs['site_title']);
            //     $message->replyTo($data['email'], $data['name']);
            //     $message->subject($data['title']);
            // });
            return redirect()->back()->with('message', 'Cảm ơn bạn. Chúng tôi sẽ liên hệ sớm nhất có thể!');

        } catch (\Exception $e) {
            echo $e->getMessage();
        } //

        // dd($data);
    }

    public function news()
    {
        return view($this->theme . '.cms_news',
            array(
                'title'       => 'Tin tức '.$this->configs['site_title'],
                'description' => $this->configs['site_description'],
                'keyword'     => $this->configs['site_keyword'],
                'news'        => $this->news,
                'og_image'    => url('/') . '/logo.png',
            )
        );
    }

    public function news_detail($name, $id)
    {
        $news_currently = CmsNews::find($id);
        $blog_currently = CmsContent::find($id);
        // $categorySelf = CmsCategory::where('id', $blog_currently['category_id'])->first();
        // $blogs_other = CmsContent::where('id', '!=', $blog_currently['id'])->orderByDesc('id')->get();

        if ($news_currently) {
            $title = ($news_currently) ? $news_currently->title : 'Không tìm thấy dữ liệu';
            return view($this->theme . '.cms_news_detail',
                array(
                    'title'          => $title,
                    'news_currently' => $news_currently,
                    'description'    => $this->configs['site_description'],
                    'keyword'        => $news_currently->keyword,
                    'blogs'          => (new CmsNews)->getItemsNews($limit = 4),
                    'og_image'       => url('/') . '/documents/website/' . $news_currently->image,
                )
            );
        }
        else if($blog_currently){
            $title = ($blog_currently) ? $blog_currently->title : 'Không tìm thấy dữ liệu';
            return view($this->theme . '.cms_news_detail',
                array(
                    'title'          => $title,
                    'news_currently' => $blog_currently,
                    'description'    => $this->configs['site_description'],
                    'keyword'        => $blog_currently->keyword,
                    // 'blogs'          => (new CmsContent)->getItemsNews($limit = 4),
                    // 'categorySelf' => $categorySelf,
                    // 'blogs_other' => $blogs_other

                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Không tìm thấy dữ liệu',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }

    }
    public function document_detail($name, $id)
    {
        $news_currently = ShopDocument::find($id);
        if ($news_currently) {
            $title = ($news_currently) ? $news_currently->title : 'Không tìm thấy dữ liệu';
            return view($this->theme . '.shop_document_detail',
                array(
                    'title'          => $title,
                    'news_currently' => $news_currently,
                    'description'    => $this->configs['site_description'],
                    'keyword'        => $this->configs['site_keyword'],
                    // 'blogs'          => (new ShopDocument)->getItemsNews($limit = 4),
                    'og_image'       => url('/') . '/documents/website/' . $news_currently->image,
                )
            );
        } else {
            return view($this->theme . '.notfound',
                array(
                    'title'       => 'Không tìm thấy dữ liệu',
                    'description' => '',
                    'keyword'     => $this->configs['site_keyword'],
                )
            );
        }

    }

    public function freeship()
    {
            return view($this->theme . '.shop_freeship',
                array(
                    'title'          => 'Mã freeship',
                )
            );

    }

    public function loginUser()
    {
            return view($this->theme . '.login.login',
                array(
                    'title'          => 'Đăng nhập',
                )
            );

    }


    public function registerUser()
    {
            return view($this->theme . '.login.register',
                array(
                    'title'          => 'Đăng ký',
                )
            );

    }

    public function loginUserPost(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])){
            return redirect()->route('home');

        }else{
            return  redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');

        }

    }

    public function registerUserPost(Request $request)
    {
            
        $email = User::where('email',$request->email)->first();
        $phone = User::where('phone',$request->phone)->first();


        if($email){
            return redirect()->back()->with('erorr', 'Email đã tồn tại');              
        }

        if($phone){
            return redirect()->back()->with('erorr', 'Số điệnt thoại đã được đăng ký');              
        }

        if($request->input('password') != $request->input('again-password') ){
            return redirect()->back()->with('error', "Vui lòng nhập mật khẩu trùng nhau");
        }

        User::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=>bcrypt($request->input('password')),
            'address1'=> $request->input('address1'),
            'phone'=> $request->input('phone'),
        ]);

        return redirect()->route('login')->with('message', 'Đăng ký thành công');
    }

}
