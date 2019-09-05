<?php

    /*Front Side*/
Route::get ('/', [
    'uses'  => 'frontPageController@index',
    'as'    => '/'
]);

Route::get ('/product-page/{id}', [
    'uses'  => 'frontPageController@productPage',
    'as'    => 'product'
]);

Route::get ('/product-details/{id}', [
    'uses'  => 'frontPageController@productDetails',
    'as'    => 'product-details'
]);

/*Cart start*/

//Route::post ('/cart/add-to-cart', [
//    'uses'  => 'CartController@addToCart',
//    'as'    => 'add-to-cart'
//]);
//
//Route::get ('/cart/show-cart', [
//    'uses'  => 'CartController@showCart',
//    'as'    => 'show-cart'
//]);
//
//Route::post ('/cart/update-cart-product', [
//    'uses'  => 'CartController@updateCart',
//    'as'    => 'update-cart-product'
//]);
//
//Route::get ('/cart/delete-cart-item/{id}', [
//    'uses'  => 'CartController@deleteCart',
//    'as'    => 'delete-cart-item'
//]);


Route::post('cart/add-to-cart',[
    'uses'  => 'cartController@addCart',
    'as'    => 'add-to-cart'
]);

Route::get('cart/show-cart',[
    'uses'  => 'cartController@showCart',
    'as'    => 'show-cart'
]);

Route::post('cart/update-cart',[
    'uses'  => 'cartController@updateCart',
    'as'    => 'update-cart-product'
]);

Route::get('cart/delete-cart/{id}',[
    'uses'  => 'cartController@deleteCart',
    'as'    => 'delete-cart-item'
]);




/*cart ends*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//category

Route::get ('/category/add-category', [
    'uses'  => 'CategoryController@addCategory',
    'as'    => 'add-category'
]);

Route::post ('/category/new-category', [
    'uses'  => 'CategoryController@newCategory',
    'as'    => 'new-category'
]);

Route::get ('/category/manage-category', [
    'uses'  => 'CategoryController@manageCategory',
    'as'    => 'manage-category'
]);

Route::get ('/category/edit-category/{id}', [
    'uses'  => 'CategoryController@editCategory',
    'as'    => 'edit-category'
]);

Route::post ('/category/update-category', [
    'uses'  => 'CategoryController@updateCategory',
    'as'    => 'update-category'
]);

Route::get ('/category/delete-category/{id}', [
    'uses'  => 'CategoryController@deleteCategory',
    'as'    => 'delete-category'
]);


//Brand

Route::get ('/brand/add-brand', [
    'uses'  => 'BrandController@addBrand',
    'as'    => 'add-brand'
]);

Route::post ('/brand/new-brand', [
    'uses'  => 'BrandController@newBrand',
    'as'    => 'new-brand'
]);

Route::get ('/brand/manage-brand', [
    'uses'  => 'BrandController@manageBrand',
    'as'    => 'manage-brand'
]);

Route::get ('/brand/edit-brand/{id}', [
    'uses'  => 'BrandController@editBrand',
    'as'    => 'edit-brand'
]);

Route::post ('/brand/update-brand', [
    'uses'  => 'BrandController@updateBrand',
    'as'    => 'update-brand'
]);

Route::get ('/brand/delete-brand/{id}', [
    'uses'  => 'BrandController@deleteBrand',
    'as'    => 'delete-brand'
]);


//Product

Route::get ('/product/add-product', [
    'uses'  => 'ProductController@addProduct',
    'as'    => 'add-product'
]);

Route::post ('/product/new-product', [
    'uses'  => 'ProductController@newProduct',
    'as'    => 'new-product'
]);

Route::get('/get-category-name/{id}', [
    'uses'  => 'ProductController@getCategoryName',
    'as'    => 'get-category-name'
]);


Route::get ('/product/manage-product', [
    'uses'  => 'ProductController@manageProduct',
    'as'    => 'manage-product'
]);

//Route::get ('/product/get-category-brand-name/{ida}/{idb}', [
//    'uses'  => 'ProductController@getCategoryBrandName',
//    'as'    => 'get-category-name'
//]);

Route::get ('/product/get-category-brand-name/{ida}/{idb}', [
    'uses'  => 'ProductController@getCategoryBrandName',
    'as'    => 'get-category-brand-name-by-id'

]);

Route::get ('/product/view-product/{id}', [
    'uses'  => 'ProductController@viewProduct',
    'as'    => 'view-product'

]);

Route::get ('/product/edit-product/{id}', [
    'uses'  => 'ProductController@editProduct',
    'as'    => 'edit-product'

]);

Route::post ('/product/update-product', [
    'uses'  => 'ProductController@updateProduct',
    'as'    => 'update-product'
]);


Route::get ('/product/delete-product/{id}', [
    'uses'  => 'ProductController@deleteProduct',
    'as'    => 'delete-product'

]);


