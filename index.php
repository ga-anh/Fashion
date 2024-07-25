<?php
session_start();

require_once "App/Config/Database.php";

require_once "vendor/autoload.php";

use App\Routing\Route;
// Define routes
Route::add('/', 'HomeController@index');
Route::add('/index', 'HomeController@index');
Route::add('/index/idth/(\d+)', 'ThuongHieuController@showth');
Route::add('/product', 'ProductController@index');
Route::add('/product/(\d+)', 'ProductController@index');
Route::add('/product/detail/(\d+)', 'ProductController@detail');
Route::add('/product/idcatalog/(\d+)', 'ProductController@index');
Route::add('/product/search/(\w+)', 'ProductController@index');
Route::add('/product/trang/(\d+)', 'ProductController@index');
Route::add('/cart','CartController@index');
Route::add('/addcart','CartController@index');
Route::add('/cart/del','CartController@delcart');
Route::add('/cart/tangsl/(\d+)','CartController@index');
Route::add('/cart/voucher/1','CartController@index');
Route::add('/cart/delete/(\d+)','CartController@deletecart');
Route::add('/login','UserController@dangnhap');
Route::add('/signup','UserController@dangky');
Route::add('/bill','BillController@index');
Route::add('/billhoanthanh','BillController@billsubmit');
Route::add('/trangcanhan','UserController@trangcanhan');
Route::add('/logout','UserController@logout');
Route::add('/myaccount','UserController@myaccount');
Route::add('/updateuser','UserController@myaccount');
Route::add('/theodoidh','BillController@theodoidh');
Route::add('/theodoidh/chitietdh/(\d+)','BillController@chitietdh');
//echo "<pre>".print_r(Route::showroutes())."</pre>";
$uri = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
//echo $uri;
Route::dispatch($uri);



