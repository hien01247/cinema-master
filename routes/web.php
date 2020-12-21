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


Route::get('/', [
    'uses'=>'PageController@getIndex'
]);

Route::get('index',[
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

Route::get('profile',[
    'as'=>'profile',
    'uses'=>'PageController@getProfile'
]);

Route::get('lich-su',[
    'as'=>'lich-su',
    'uses'=>'PageController@getLichSu'
]);

Route::post('chi-tiet-lich-su',[
    'as'=>'chi-tiet-lich-su',
    'uses'=>'PageController@postChiTietLichSu'
]);

Route::get('phim-da-xem',[
    'as'=>'phim-da-xem',
    'uses'=>'PageController@getPhimDaXem'
]);

Route::post('changePersonalData',[
    'as'=>'changePersonalData',
    'uses'=>'PageController@postchangePersonalData'
]);

Route::get('dang-ky',[
    'as'=>'dang-ky',
    'uses'=>'PageController@getDangKy'
]);

Route::post('dang-ky',[
    'as'=>'dang-ky',
    'uses'=>'PageController@postSignup'
]);

Route::post('dang-nhap',[
    'as'=>'dang-nhap',
    'uses'=>'PageController@postSignin'
]);

Route::get('dang-xuat',[
    'as'=>'dang-xuat',
    'uses'=>'PageController@getDangxuat'
]);


Route::get('contact',[
    'as'=>'contact',
    'uses'=>'PageController@contact'
]);


Route::get('he-thong-rap',[
    'as'=>'he-thong-rap',
    'uses'=>'PageController@heThongRap'
]);

Route::get('phim-dang-chieu',[
    'as'=>'phim-dang-chieu',
    'uses'=>'PageController@phimDangChieu'
]);

Route::get('phim-sap-chieu',[
    'as'=>'phim-sap-chieu',
    'uses'=>'PageController@phimSapChieu'
]);

Route::get('chi-tiet/{id}',[
    'as'=>'chi-tiet',
    'uses'=>'PageController@getChitiet'
]);

Route::post('mua-ve',[
    'as'=>'mua-ve',
    'uses'=>'PageController@postMuaVe'
]);

Route::get('mua-ve-menu',[
    'as'=>'mua-ve-menu',
    'uses'=>'PageController@getMuaVeMenu'
]);

Route::post('chon-phim',[
    'as'=>'chon-phim',
    'uses'=>'PageController@postChonPhim'
]);

Route::post('chon-rap',[
    'as'=>'chon-rap',
    'uses'=>'PageController@postChonRap'
]);

Route::post('chon-suat-chieu',[
    'as'=>'chon-suat-chieu',
    'uses'=>'PageController@postChonSuatChieu'
]);

Route::post('chon-ghe',[
    'as'=>'chon-ghe',
    'uses'=>'PageController@postChonGhe'
]);

Route::post('thanhtoan',[
    'as'=>'thanhtoan',
    'uses'=>'PageController@postThanhToan'
]);


Route::get('khuyen-mai',[
    'as'=>'khuyen-mai',
    'uses'=>'PageController@getKhuyenMai'
]);

Route::get('search',[
    'as'=>'search',
    'uses'=>'PageConTroller@getSearch'
]);
Auth::routes();
