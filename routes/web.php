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

Route::get('/', function () {
    return view('welcome');
});

//商家分类
Route::resource('shopCategory','ShopCategoryController');

//商家信息
Route::resource('shop','ShopController');
//商家审核
Route::get('ban','ShopController@ban')->name('ban');
Route::get('audit{shop}','ShopController@audit')->name('audit');
//管理员登录成功之后跳转到
Route::get('/admin/index','AdminController@index')->name('admin.index');
//管理员
Route::resource('admin','AdminController');


//管理员登录
Route::get('login','SessionController@create')->name('login');
Route::post('login','SessionController@store')->name('login.store');

Route::get('change','AdminController@change')->name('change');
Route::post('change','AdminController@change_save')->name('change.change_save');

//注销管理员登录
Route::get('logout','SessionController@destroy')->name('logout');

//商家帐号管理
Route::resource('user','ShopUserController');

//会员的列表
Route::get('member/index','Member\MemberController@index')->name('member.index');
//活动的添加
Route::resource('activ','ActivController');


//未开始的活动
Route::get('unactiv','ActivController@unactiv')->name('unactiv');

//进行中的活动
Route::get('conduct','ActivController@conduct')->name('conduct');

//结束的活动
Route::get('end','ActivController@end')->name('end');

