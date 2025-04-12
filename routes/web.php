<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
Auth::routes();
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

//============================
Route::get('/', 'Shop@index')->name('home');
Route::get('index.html', 'Shop@index');
Route::get('/login.html', 'Shop@showLogin');
Route::get('/shop/{name}_{id}.html', 'Shop@productToCategory');
Route::get('/san-pham/{name}_{id}.html', 'Shop@productDetail');
Route::get('/brands/{name}_{id}/{category?}', 'Shop@product_brands');
Route::get('/profile.html', [
    'middleware' => 'auth',
    'uses'       => 'Shop@profile',
]);
Route::get('/tai-lieu.html', 'Shop@allDocuments');
Route::get('/dang-nhap.html', 'Shop@loginUser')->name('login');
Route::get('/dang-xuat.html', 'Shop@logout');
Route::get('/dang-ky.html', 'Shop@registerUser');
Route::post('/dang-nhap.html', 'Shop@loginUserPost');
Route::post('/dang-ky.html', 'Shop@registerUserPost');
Route::get('/ma-freeship.html', 'Shop@freeship');
Route::get('/tai-lieu/{name}_{id}.html', 'Shop@document_detail');
Route::get('/san-pham.html', 'Shop@allProducts');
Route::get('/san-pham-khuyen-mai.html', 'Shop@promotionProducts');
Route::get('/thanh-toan.html', 'Shop@getCheckout');
Route::get('/wishlist.html', 'Shop@wishlist');
Route::get('/gio-hang.html', 'Shop@cart');
Route::post('/gio-hang.html', 'Shop@cart');
Route::get('/tim-kiem.html', 'Shop@search');
Route::get('/san-pham-hot.html', 'Shop@getHotProducts');
Route::get('/removeItem/{id}', 'Shop@removeItem');
Route::get('/removeItemFromWl/{id}', 'Shop@removeItemFromWl');
Route::get('/clear-cart', 'Shop@clear_cart');
Route::post('/addToCart', 'Shop@addToCart');
Route::post('/updateToCart', 'Shop@updateToCart');
Route::post('/storecart', 'Shop@storecart');
Route::get('/login.html', 'Shop@login');
Route::get('/forgot.html', 'Shop@forgot');
Route::post('/usePromotion', 'Shop@usePromotion');
Route::post('product_type', 'Shop@product_type');
//========end shop ================

//======cms==================
Route::get('/tin-tuc.html', 'Shop@news');
Route::get('/lien-he.html', 'Shop@getContact');
// Route::get('/gioi-thieu.html', 'Shop@getIntroduction');
Route::post('/lien-he.html', 'Shop@postContact');
Route::post('/lien-he-sdt.html', 'Shop@postContactLite');
Route::get('/tin-tuc/{name}_{id}.html', 'Shop@news_detail');
Route::get('/blogs.html', 'Shop@news');
Route::get('/danh-muc-bai-viet/{name}_{id}.html', 'Shop@articleToCategory');
Route::get('/bai-viet.html', 'Shop@allArticle');
Route::get('/bai-viet/{name}_{id}.html', 'Shop@news_detail');
Route::get('/blog/{name}_{id}.html', 'Shop@news_detail');
Route::get('/{key}.html', 'Shop@pages');
//=====end cms =========

Route::prefix('payment')->group(function () {
    Route::get('paypal', 'PayPalController@index');
});

//===========auth==============
// Authentication Routes...
// Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('login', function () {
    return redirect('login.html');
})->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('register', function () {
    return redirect('login.html');
})->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/reset', function () {
    return redirect('forgot.html');
})->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
//================================
