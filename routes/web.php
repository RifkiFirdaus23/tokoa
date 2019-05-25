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

Route::get('/',  'BarangController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/barang', 'BarangController@index');

Route::get('/cari', 'BarangController@cari');

Route::get('/detail/hapus/{id_order}', 'DetailController@hapus');

Route::get('/chat', 'AdminController@chat');

Route::get('/barang/keranjang', 'BarangController@keranjang');

Route::get('/barang/keranjang/{id}', 'BarangController@hapus');

Route::get('/admin', 'AdminController@admin');

Route::get('/keranjang', 'KeranjangController@keranjang');

Route::post('/admin/proses', 'AdminController@proses');

Route::get('/admin/hapus/{id}', 'AdminController@hapus');

Route::post('/order', 'BarangController@order');

Route::post('/checkout', 'BarangController@checkout');

Route::get('/detail', 'DetailController@detail');
