<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Auth::routes();

// ANGKOT
Route::any('/data/angkot', 'AngkotController@index2');
Route::any('/data/rata_harian', 'DashboardController@rata_harian');
Route::any('/data/graf_pajak_angkot', 'DashboardController@graf_pajak_angkot');
Route::any('/data/graf_ujikir_angkot', 'DashboardController@graf_ujikir_angkot');
Route::any('/data/graf_survey_angkot', 'DashboardController@graf_survey_angkot');

Route::any('/data/angkot/get', 'AngkotController@get_data_angkot')->name('data.angkot.get');
Route::any('/data/angkot/tambah', 'AngkotController@form_data_angkot');
Route::any('/data/angkot/edit/{id}', 'AngkotController@edit_data_angkot');
Route::post('/data/angkot/simpan', 'AngkotController@simpan_data_angkot');
Route::post('/data/angkot/update', 'AngkotController@update_data_angkot');
Route::delete('/data/angkot/destroy/{ID}', 'AngkotController@destroy_angkot')->name('angkot.destroy');

//taxi
Route::any('/data/taxi/get', 'taxiController@get_data_taxi_bb')->name('data.taxi.get');
Route::any('/data/taxi_gr/get', 'taxiController@get_data_gr')->name('data.taxi_gr.get');
Route::any('/data/taxi_primkopau/get', 'taxiController@get_data_primkopau')->name('data.taxi_primkopau.get');
Route::any('/data/taxi_kk/get', 'taxiController@get_data_kk')->name('data.taxi_kk.get');

Route::any('/data/taxi/', 'taxiController@index2');
Route::any('/data/taxi_bb/tambah', 'taxiController@tambah_bb');
Route::any('/data/taxi_bb/edit/{ID}', 'taxiController@edit_bb');
Route::post('/data/taxi_bb/simpan', 'taxiController@simpan_data_bb');
Route::post('/data/taxi_bb/update', 'taxiController@update_data_bb');
Route::get('/data/taxi_bb/delete/{ID}', [
    'uses' => 'taxiController@delete_bb',
    'as' => 'bb.delete'
]);

Route::any('/data/taxi_primkopau/', 'taxiController@taxi_primkopau');
Route::any('/data/taxi_pk/tambah', 'taxiController@tambah_pk');
Route::post('/data/taxi_pk/simpan', 'taxiController@simpan_data_pk');
Route::any('/data/taxi_pk/edit/{NO}', 'taxiController@edit_pk');
Route::post('/data/taxi_pk/update', 'taxiController@update_data_pk');
Route::get('/data/taxi_pk/delete/{NO}', 'taxiController@delete_pk');

Route::any('/data/taxi_kk/', 'taxiController@taxi_kk');
Route::any('/data/taxi_kk/tambah', 'taxiController@tambah_kk');
Route::post('/data/taxi_kk/simpan', 'taxiController@simpan_data_kk');
Route::any('/data/taxi_kk/edit/{NO}', 'taxiController@edit_kk');
Route::post('/data/taxi_kk/update', 'taxiController@update_data_kk');
Route::get('/data/taxi_kk/delete/{NO}', 'taxiController@delete_kk');

Route::any('/data/taxi_gr/', 'taxiController@taxi_gr');
Route::any('/data/taxi_gr/tambah', 'taxiController@tambah_gr');
Route::post('/data/taxi_gr/simpan', 'taxiController@simpan_data_gr');
Route::any('/data/taxi_gr/edit/{id}', 'taxiController@edit_gr');
Route::post('/data/taxi_gr/update', 'taxiController@update_data_gr');
Route::get('/data/taxi_gr/delete/{id}', 'taxiController@delete_gr');


Route::any('/data/dashboard_taksi', 'DashboardController@dashboard_taksi');
Route::any('/data/graf_total_taxi', 'DashboardController@total_taxi');
Route::any('/data/graf_totalgr', 'DashboardController@total_tx_bb');
Route::any('/data/graf_totalpk', 'DashboardController@graf_tx_pk');
Route::any('/data/graf_kk', 'DashboardController@graf_tx_kk');
Route::any('/data/graf_bb', 'DashboardController@graf_tx_bb');



//BLUD
Route::any('/data/bmp/get', 'bludController@get_data_merah_putih')->name('data.bmp.get');
Route::any('/data/tmb/get', 'bludController@get_data_tmb')->name('data.tmb.get');
Route::any('/data/bs/get', 'bludController@get_data_bus_sekolah')->name('data.bs.get');
Route::any('/data/bandros/get', 'bludController@get_data_bandros')->name('data.bandros.get');

Route::any('/data/bmp/', 'bludController@merah_putih');
Route::any('/data/bmp/tambah', 'bludController@tambah_mp');
Route::post('/data/bmp/simpan', 'bludController@simpan_data_mp');
Route::any('/data/bmp/edit/{NO}', 'bludController@edit_mp');
Route::post('/data/bmp/update', 'bludController@update_data_mp');
Route::get('/data/bmp/delete/{NO}', 'bludController@delete_mp');

Route::any('/data/tmb/', 'bludController@tmb');
Route::any('/data/tmb/tambah', 'bludController@tambah_tmb');
Route::post('/data/tmb/simpan', 'bludController@simpan_data_tmb');
Route::any('/data/tmb/edit/{NO}', 'bludController@edit_tmb');
Route::post('/data/tmb/update', 'bludController@update_data_tmb');
Route::get('/data/tmb/delete/{NO}', 'bludController@delete_tmb');

Route::any('/data/bs/', 'bludController@bus_sekolah');
Route::any('/data/bs/tambah', 'bludController@tambah_bs');
Route::post('/data/bs/simpan', 'bludController@simpan_data_bs');
Route::any('/data/bs/edit/{NO}', 'bludController@edit_bs');
Route::post('/data/bs/update', 'bludController@update_data_bs');
Route::get('/data/bs/delete/{NO}', 'bludController@delete_bs');

Route::any('/data/bandros/', 'bludController@bandros');
Route::any('/data/bandros/tambah', 'bludController@tambah_bandros');
Route::post('/data/bandros/simpan', 'bludController@simpan_data_bandros');
Route::any('/data/bandros/edit/{NO}', 'bludController@edit_bandros');
Route::post('/data/bandros/update', 'bludController@update_data_bandros');
Route::get('/data/bandros/delete/{NO}', 'bludController@delete_bandros');


// TRAYEK
Route::any('/data/trayek', 'TrayekController@index');
Route::any('/data/trayek/tambah', 'TrayekController@tambah_trayek');
Route::any('/data/trayek/edit/{id}', 'TrayekController@edit_trayek');
Route::post('/data/trayek/simpan', 'TrayekController@simpan_trayek');
Route::post('/data/trayek/update', 'TrayekController@update_trayek');
Route::get('/data/trayek/delete/{id}', [
    'uses' => 'TrayekController@delete_trayek',
    'as' => 'trayek.delete'
]);


//KIR
Route::any('/data/uji_kir', 'UjiKIRController@index');
Route::any('/data/uji_kir/tambah', 'UjiKIRController@tambah_uji_kir');
Route::any('/data/uji_kir/edit/{id}', 'UjiKIRController@edit_uji_kir');
Route::post('/data/uji_kir/simpan', 'UjiKIRController@simpan_uji_kir');
Route::post('/data/uji_kir/update', 'UjiKIRController@update_uji_kir');
Route::get('/data/uji_kir/destroy/{id}', [
    'uses' => 'UjiKIRController@delete_kir',
    'as' => 'uji_kir.destroy'
]);


// Route::any('/data_angkot', 'AngkotController@index'); pass
Route::any('/data_trayek', 'TrayekController@index');
Route::any('/uji_kir', 'UjiKIRController@index');
Route::any('/dashboard', 'DashboardController@index');
Route::any('/search', 'AngkotController@search');
Route::any('/search_datatable', 'AngkotController@search_datatable');
Route::any('/pencarian', 'AngkotController@pencarian');
Route::any('/detail_kendaraan/{no_kendaraan}', 'AngkotController@detail_kendaraan');
Route::any('/view_tambah_angkot', 'AngkotController@view_tambah_angkot');
Route::any('/tambah_angkot', 'AngkotController@save_angkot');

// PROFILE
Route::any('/profiles', 'UserController@index');

Route::get('/home', 'HomeController@index')->name('home');
 
// EMBED
Route::any('/embed', 'EmbedController@index');

// Dashboard
Route::any('/data/total_data', 'DashboardController@total_data');
Route::any('/data/total_trip_angkot', 'DashboardController@total_trip_angkot');
Route::any('/data/total_angkot_beroperasi', 'DashboardController@total_angkot_beroperasi');
Route::any('/data/total_angkot_bandung', 'DashboardController@total_angkot_bandung');
Route::any('/data/total_angkot_akdp', 'DashboardController@total_angkot_akdp');
Route::any('/data/sp_dashboard_usia_kendaraan', 'DashboardController@sp_dashboard_usia_kendaraan');
Route::any('/data/total_angkot', 'DashboardController@total_angkot');
Route::any('/data/best_angkot', 'DashboardController@best_angkot');
Route::any('/data/best_jurusan', 'DashboardController@best_jurusan');
Route::any('/data/penumpang_tercatat', 'DashboardController@penumpang_tercatat');

//USER
Route::any('/user/list', 'UserController@list_user');
Route::any('/user/tambah_user', 'UserController@tambah_user');
Route::post('/user/simpan', 'UserController@simpan');
Route::get('/user/delete/{id}', 'UserController@delete_user');
Route::any('/user/edit/{id}', 'UserController@edit_user');
Route::post('/user/update', 'UserController@update_user');


//DAMRI
Route::any('/data/damri', 'DamriController@index');
Route::any('/data/damri/get', 'DamriController@get_data_damri')->name('data.damri.get');
Route::any('/data/damri/tambah', 'DamriController@tambah_data_damri');
Route::any('/data/damri/edit/{NO}', 'DamriController@edit_data_damri');
Route::post('/data/damri/simpan', 'DamriController@simpan_data_damri');
Route::post('/data/damri/update', 'DamriController@update_data_damri');
Route::get('/data/damri/delete/{NO}', 'DamriController@delete_damri');
