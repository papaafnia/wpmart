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



Auth::routes();

// Route::post('/daftar','Auth\RegisterMhsController@userbaru')->name('daftar.baru');
Route::post('/reg-owner','Auth\RegistrasiOwnerController@registrasiowner')->name('reg.owner');
Route::get('/update-profile/{id}','Auth\RegistrasiOwnerController@updateprofile')->name('update.profile');

Route::get('/page/kategori','Landingpage\LandingPageController@kategori')->name('welcome.kategori');
Route::get('/page/sub-kategori/{id}','Landingpage\LandingPageController@subkategori')->name('welcome.subkategori');
Route::get('/page/detail-barang/{id}','Landingpage\LandingPageController@detailbarang')->name('detail.subkategori');
// ========================================================================================\\

// ADMIN


  Route::group(['prefix' => 'superadmin', 'middleware' => ['role:superadmin|admin']], function() { 
  
  // DASHBOARD
  Route::resource('/dashboard','Admin\DasboardController');

  // DATA BARANG
  Route::resource('/data-barang','Admin\Databarang\DataBarangController');
  Route::get('/data-barang/destroy/{id}','Admin\Databarang\DataBarangController@destroy')->name('destroy.data_barang');
  Route::post('/data-barang/import_excel', 'Admin\Databarang\DataBarangController@import_excel')->name('import.excel');

  // DATA USER
  Route::resource('/data-user','Admin\Datauser\DataUserController');

  // KATEGORI
  Route::resource('/kategori','Admin\Kategori\KategoriController');
  Route::get('/kategori/destroy/{id}','Admin\Kategori\KategoriController@destroy')->name('destroy.kategori');

  // SUB KATEGORI
  Route::resource('/sub-kategori','Admin\SubKategori\SubKategoriController');
  Route::get('/sub-kategori/destroy/{id}','Admin\SubKategori\SubKategoriController@destroy')->name('destroy.sub-kategori');

  // AJAX
  Route::get('/data-barang/kategori/get/{id}', 'Admin\Databarang\DataBarangController@kategori');
  Route::get('/data-barang/subkategori/get/{id}', 'Admin\Databarang\DataBarangController@subkategori');

  // PEMESANAN
  Route::resource('/pemesanan','Admin\Pemesanan\PemesananController');

  // CONFIG

  // LAPORAN
  Route::get('/laporan-pemesanan','Admin\Laporan\LaporanPemesananController@viewlaporan')->name('view.laporan');
  Route::post('/cetak-laporan-pemesanan','Admin\Laporan\LaporanPemesananController@cetaklaporan')->name('cetak.laporan');
  Route::get('/print-laporan-pemesanan','Admin\Laporan\LaporanPemesananController@printlaporan')->name('print.laporan');

  });

  // ========================================================================================\\


//   OWNER

 Route::group(['prefix' => 'owner', 'middleware' => ['role:owner']], function() { 
 
  Route::resource('/home','Owner\HomeController');

  // KATALOG
  Route::resource('/catalog','Owner\Catalog\CatalogController');
  Route::resource('/catalog-sub','Owner\Catalog\CatalogController');
  Route::get('/catalog-sub/detail/{id}','Owner\Catalog\CatalogController@subdetails')->name('subcat.details');

  // CART
  Route::resource('/cart','Owner\Cart\CartController');
  Route::post('/cart/addtocart','Owner\Cart\CartController@addToCart')->name('add.to.cart');
  Route::get('/cart/remove-item/{id}','Owner\Cart\CartController@cartRemove')->name('remove.cart');

  // MENUNGGU KONFIRMASI
  Route::resource('/menunggu-konfirmasi','Owner\MenungguKonfirmasi\MenungguKonfirmasiController');

  // RIWAYAT PEMESANAN
  Route::resource('/riwayat-pemesanan','Owner\RiwayatPemesanan\RiwayatPemesananController');
 
});



