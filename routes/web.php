<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', ['as' => 'JapanCosmetic', 'uses' => 'Page\PageSaleController@showProduct']);
Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'Admin\UserController@login']);
Route::post('admin/post-login', ['as' => 'admin.post.login', 'uses' => 'Admin\UserController@postLogin']);
Route::get('admin/logout', ['as' => 'admin.logout', 'uses' => 'Admin\UserController@logout']);
Route::get('/JapanCosmetic/product/category={cate_id}',  ['as' => 'JapanCosmetic.product.category', 'uses' => 'Page\PageSaleController@showProductCategory']);
Route::post('/customer/post-create-customer',  ['as' => 'customer.post-create-customer', 'uses' => 'Page\PageSaleController@createCustomer']);
Route::get('JapanCosmetic/Blog', ['as' => 'JapanCosmetic.Blog', 'uses' => 'Page\PageSaleController@showBlog']);
Route::get('JapanCosmetic', ['as' => 'JapanCosmetic', 'uses' => 'Page\PageSaleController@showProduct']);
Route::get('JapanCosmetic/detailProduct', ['as' => 'JapanCosmetic.detailProduct', 'uses' => 'Page\PageSaleController@showDetailProduct']);
Route::get('JapanCosmetic/detailProduct/{product_id}', ['as' => 'JapanCosmetic.detailProduct', 'uses' => 'Page\PageSaleController@showDetailProduct']);
Route::get('JapanCosmetic/contact', ['as' => 'JapanCosmetic.contact', 'uses' => 'Page\PageSaleController@showContact']);
Route::get('JapanCosmetic/contact', ['as' => 'JapanCosmetic.contact', 'uses' => 'Page\PageSaleController@showContact']);
Route::post('/order/post-create-order',  ['as' => 'order.post-create-order', 'uses' => 'Admin\OrderController@CreateOrder']);
Route::get('JapanCosmetic/cheap-products', ['as' => 'JapanCosmetic.cheap', 'uses' => 'Page\PageSaleController@showCheapProduct']);
Route::get('JapanCosmetic/get-new-product', ['as' => 'JapanCosmetic.get-new-product', 'uses' => 'Page\PageSaleController@showGetNewProduct']);

//Shopping Cart
Route::get('JapanCosmetic/shoppingCart', ['as' => 'JapanCosmetic.cart', 'uses' => 'Page\CartController@showCart']);
Route::get('JapanCosmetic/addCart/{product_id}', ['as' => 'JapanCosmetic.addCart', 'uses' => 'Page\CartController@addToCart']);
Route::patch('JapanCosmetic/updateCart', ['as' => 'JapanCosmetic.updateCart', 'uses' => 'Page\CartController@updateCart']);
Route::delete('JapanCosmetic/removeCart', ['as' => 'JapanCosmetic.removeCart', 'uses' => 'Page\CartController@deleteCart']);
Route::get('JapanCosmetic/thanh-toan', ['as' => 'JapanCosmetic.pay', 'uses' => 'Page\PayController@pay']);
Route::get('JapanCosmetic/pay-success', ['as' => 'JapanCosmetic.paySuccess', 'uses' => 'Page\PayController@paySuccess']);
//Admin
Route::group(['prefix' => '/admin', 'middleware' => 'auth.admin'], function () {
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'Admin\MainController@dashboard']);
    Route::get('/user/list',  ['as' => 'user.list', 'uses' => 'Admin\UserController@showListUser']);
    Route::get('/user/create',  ['as' => 'user.create', 'uses' => 'Admin\UserController@showCreateUser']);
    Route::post('/user/post-create-user',  ['as' => 'user.post-create-user', 'uses' => 'Admin\UserController@createUser']);
    Route::post('/user/upload-image',  ['as' => 'user.upload-image', 'uses' => 'Admin\UserController@uploadFile']);
    Route::get('/user/update/{id}',  ['as' => 'user.update', 'uses' => 'Admin\UserController@showUpdateUser']);
    Route::post('/user/post-update',  ['as' => 'user.post-update', 'uses' => 'Admin\UserController@updateUser']);
    Route::delete('/user/delete-user/{id}',  ['as' => 'user.delete', 'uses' => 'Admin\UserController@deleteUser']);

    //Category
    Route::get('/category/list',  ['as' => 'category.list', 'uses' => 'Admin\CategoryController@ListCategory']);
    Route::get('/category/create',  ['as' => 'category.create', 'uses' => 'Admin\CategoryController@showCreateCategory']);
    Route::post('/category/post-create-category',  ['as' => 'category.post-create-category', 'uses' => 'Admin\CategoryController@createCategory']);
    Route::get('/category/update/{cate_id}',  ['as' => 'category.update', 'uses' => 'Admin\CategoryController@showCategory']);
    Route::post('/category/post-update',  ['as' => 'category.post-update', 'uses' => 'Admin\CategoryController@updateCategory']);
    Route::delete('/category/delete-category/{cate_id}',  ['as' => 'category.delete', 'uses' => 'Admin\CategoryController@deleteCategory']);

    //Product
    Route::get('/product/list',  ['as' => 'product.list', 'uses' => 'Admin\ProductController@showListProduct']);
    Route::get('/product/create',  ['as' => 'product.create', 'uses' => 'Admin\ProductController@showCreateProduct']);
    Route::post('/product/post-create-product',  ['as' => 'product.post-create-product', 'uses' => 'Admin\ProductController@createProduct']);
    Route::get('/product/update/{product_id}',  ['as' => 'product.update', 'uses' => 'Admin\ProductController@showProduct']);
    Route::post('/product/post-update',  ['as' => 'product.post-update', 'uses' => 'Admin\ProductController@updateProduct']);
    Route::delete('/product/delete-product/{product_id}',  ['as' => 'product.delete', 'uses' => 'Admin\ProductController@deleteProduct']);
    Route::post('/product/upload-image',  ['as' => 'product.upload-image', 'uses' => 'Admin\ProductController@uploadFile']);
    Route::get('/product/show-detail/{product_id}',  ['as' => 'product.show-detail', 'uses' => 'Admin\ProductController@showDetailProduct']);

    //Supplier
    Route::get('/supplier/list',  ['as' => 'supplier.list', 'uses' => 'Admin\SupplierController@showListSupplier']);
    Route::get('/supplier/create',  ['as' => 'supplier.create', 'uses' => 'Admin\SupplierController@showCreateSupplier']);
    Route::post('/supplier/post-create-supplier',  ['as' => 'supplier.post-create-supplier', 'uses' => 'Admin\SupplierController@createSupplier']);
    Route::get('/supplier/update/{supplier_id}',  ['as' => 'supplier.update', 'uses' => 'Admin\SupplierController@showSupplier']);
    Route::post('/supplier/post-update',  ['as' => 'supplier.post-update', 'uses' => 'Admin\SupplierController@updateSupplier']);
    Route::delete('/supplier/delete-supplier/{supplier_id}',  ['as' => 'supplier.delete', 'uses' => 'Admin\SupplierController@deleteSupplier']);
    Route::post('/supplier/upload-image',  ['as' => 'supplier.upload-image', 'uses' => 'Admin\SupplierController@uploadFile']);

    //Blogs
    Route::get('/blog/list',  ['as' => 'blog.list', 'uses' => 'Admin\BlogController@showListBlog']);
    Route::get('/blog/create',  ['as' => 'blog.create', 'uses' => 'Admin\BlogController@showCreateBlog']);
    Route::post('/blog/post-create-blog',  ['as' => 'blog.post-create-blog', 'uses' => 'Admin\BlogController@createBlog']);
    Route::get('/blog/update/{blog_id}',  ['as' => 'blog.update', 'uses' => 'Admin\BlogController@showBlog']);
    Route::post('/blog/post-update',  ['as' => 'blog.post-update', 'uses' => 'Admin\BlogController@updateBlog']);
    Route::delete('/blog/delete-blog/{blog_id}',  ['as' => 'blog.delete', 'uses' => 'Admin\BlogController@deleteBlog']);


    //Order
    Route::get('/order/list',  ['as' => 'order.list', 'uses' => 'Admin\OrderController@showListOrder']);
    Route::get('/order/update/{order_id}',  ['as' => 'order.update', 'uses' => 'Admin\OrderController@showOrder']);
    Route::post('/order/post-update',  ['as' => 'order.post-update', 'uses' => 'Admin\OrderController@updateOrder']);
});
