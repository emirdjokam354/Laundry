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

Route::get('/', function () {
    return view('authentikasi/login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//beranda 
Route::get('/dashboard','BerandaController@index')->name('home')->middleware('auth');;

//authentikasi
Route::get('/login','LoginController@index')->name('login');
// Route::post('/login','LoginController@index')->name('login');


//management user
//admin
Route::get('/management/administrator','AdministratorController@index')->middleware('auth');
Route::get('/management/administrator/tambah','AdministratorController@TambahAdmin');
Route::post('/management/administrator/store','AdministratorController@store');
Route::get('/management/administrator/hapus/{id}','AdministratorController@hapus');
Route::get('/management/administrator/edit/{id}','AdministratorController@edit');
Route::post('/management/administrator/update','AdministratorController@update');
Route::get('/management/administrator/cari','AdministratorController@cari');

//karyawan
Route::get('/management/kasir','KasirController@index')->middleware('auth');
Route::get('/management/kasir/tambah','KasirController@tambah');
Route::post('/management/kasir/store','KasirController@store');
Route::get('/management/kasir/edit/{id}','KasirController@edit');
Route::post('/management/kasir/update','KasirController@update');
Route::get('management/kasir/hapus/{id}','KasirController@hapus');
Route::get('/management/kasir/cari','KasirController@cari');

//owner
Route::get('management/owner','OwnerController@index')->middleware('auth');
Route::get('/management/owner/tambah','OwnerController@tambah');
Route::post('/management/owner/store','OwnerController@store');
Route::get('/management/owner/edit/{id}','OwnerController@edit');
Route::post('/management/owner/update','OwnerController@update');
Route::get('/management/owner/cari','OwnerController@cari');
Route::get('management/owner/hapus/{id}','OwnerController@hapus');

//Pelanggan
Route::get('/pelanggan','PelangganController@index')->middleware('auth');
Route::get('/pelanggan/tambah','PelangganController@tambah');
Route::post('/pelanggan/store','PelangganController@store');
Route::get('/pelanggan/edit/{id}','PelangganController@edit');
Route::post('/pelanggan/update','PelangganController@update');
Route::get('/pelanggan/hapus/{id}','PelangganController@hapus');
Route::get('pelanggan/cari','PelangganController@cari');

//Outlet
Route::get('/outlet','OutletController@index')->middleware('auth');
Route::get('/outlet/tambah','OutletController@tambah');
Route::post('/outlet/store','OutletController@store');
Route::get('/outlet/edit/{id}','OutletController@edit');
Route::post('/outlet/update','OutletController@update');
Route::post('/outlet/delete/{id}','OutletController@hapus')->name('delete');
Route::get('/outlet/cari','OutletController@cari');


//paket laundry
Route::get('/paket','PaketController@index')->name('paket')->middleware('auth');
Route::get('/paket/tambah','PaketController@tambah');
Route::post('/paket/store','PaketController@store');
Route::get('/paket/edit/{id}','PaketController@edit');
Route::post('/paket/update','PaketController@update');
// Route::resource('paket','PaketController');
Route::get('paket{id}','PaketController@destroy');
Route::get('/paket/cari','PaketController@cari');

//transaksi
Route::get('/transaksi','TransaksiController@index')->middleware('auth');
Route::get('/transaksi/tambah','TransaksiController@tambah');
Route::post('transaksi/store','TransaksiController@store');
Route::get('/transaksi/hapus/{id}','TransaksiController@hapus');
Route::get('/transaksi/edit/{id}','TransaksiController@edit');
Route::post('/transaksi/update','TransaksiController@update');
//detail transaksi
Route::get('/transaksi/detail/{id}','DetailTransaksiController@detail');
Route::post('/transaksi/detail','DetailTransaksiController@ProsesTransaksi');


// percobaan pelanggan
use App\Pelanggan;
use App\Transaksi;
Route::get('/create_pelanggan', function() {

    $pelanggan = Pelanggan::create([
        'nama' => 'Achmed Alfarizi Gerard',
        'alamat' => 'Jl.Raya Laswi Baleendah',
        'jenkel' => 'Pria',
        'tlp' => '084327655712'
    ]);

    return $pelanggan;
});

Route::get('/create_transaksi', function(){
    $transaksi = Transaksi::create([
        'id_outlet' => '3',
        'id_member' => '5',
        'kode_invoice' => '0000002',
        'status' => 'baru',
        'dibayar' => 'belum_dibayar'
    ]);

    return $transaksi;
});

Route::get('/create_pelanggan_transaksi', function () {
    $pelanggan = Pelanggan::find(5);

    $transaksi = new Transaksi([
        'id_outlet' => '3',
        'kode_invoice' => '0000002',
        'status' => 'baru',
        'dibayar' => 'belum_dibayar',
    ]);

    $pelanggan->transaksi()->save($transaksi);
    return $pelanggan;
});