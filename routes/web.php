<?php

Route::post('/login', 'LoginController@login');
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('superadmin')) {
            return redirect('/superadmin');
        }
    }
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/superadmin', 'SuperadminController@beranda');
    Route::get('/superadmin/karyawan', 'SuperadminController@karyawan');
    Route::get('/superadmin/karyawan/create', 'SuperadminController@karyawancreate');
    Route::post('/superadmin/karyawan/create', 'SuperadminController@karyawanstore');
    Route::get('/superadmin/karyawan/edit/{id}', 'SuperadminController@karyawanedit');
    Route::post('/superadmin/karyawan/edit/{id}', 'SuperadminController@karyawanupdate');
    Route::get('/superadmin/karyawan/delete/{id}', 'SuperadminController@karyawandelete');

    Route::get('/superadmin/rumah', 'SuperadminController@rumah');
    Route::get('/superadmin/rumah/create', 'SuperadminController@rumahcreate');
    Route::post('/superadmin/rumah/create', 'SuperadminController@rumahstore');
    Route::get('/superadmin/rumah/edit/{id}', 'SuperadminController@rumahedit');
    Route::post('/superadmin/rumah/edit/{id}', 'SuperadminController@rumahupdate');
    Route::get('/superadmin/rumah/delete/{id}', 'SuperadminController@rumahdelete');

    Route::get('/superadmin/pembeli', 'SuperadminController@pembeli');
    Route::get('/superadmin/pembeli/create', 'SuperadminController@pembelicreate');
    Route::post('/superadmin/pembeli/create', 'SuperadminController@pembelistore');
    Route::get('/superadmin/pembeli/edit/{id}', 'SuperadminController@pembeliedit');
    Route::post('/superadmin/pembeli/edit/{id}', 'SuperadminController@pembeliupdate');
    Route::get('/superadmin/pembeli/delete/{id}', 'SuperadminController@pembelidelete');

    Route::get('/superadmin/booking', 'SuperadminController@booking');
    Route::get('/superadmin/booking/create', 'SuperadminController@bookingcreate');
    Route::post('/superadmin/booking/create', 'SuperadminController@bookingstore');
    Route::get('/superadmin/booking/edit/{id}', 'SuperadminController@bookingedit');
    Route::post('/superadmin/booking/edit/{id}', 'SuperadminController@bookingupdate');
    Route::get('/superadmin/booking/delete/{id}', 'SuperadminController@bookingdelete');

    Route::get('/superadmin/penjualan', 'SuperadminController@penjualan');
    Route::get('/superadmin/penjualan/create', 'SuperadminController@penjualancreate');
    Route::post('/superadmin/penjualan/create', 'SuperadminController@penjualanstore');
    Route::get('/superadmin/penjualan/edit/{id}', 'SuperadminController@penjualanedit');
    Route::post('/superadmin/penjualan/edit/{id}', 'SuperadminController@penjualanupdate');
    Route::get('/superadmin/penjualan/delete/{id}', 'SuperadminController@penjualandelete');

    Route::get('/superadmin/laporan', 'SuperadminController@laporan');
    Route::get('/superadmin/laporan/rumah', 'SuperadminController@rumahpdf');
    Route::get('/superadmin/laporan/pembeli', 'SuperadminController@pembelipdf');
    Route::get('/superadmin/laporan/karyawan', 'SuperadminController@karyawanpdf');
    Route::get('/superadmin/laporan/booking', 'SuperadminController@bookingpdf');
    Route::get('/superadmin/laporan/penjualan', 'SuperadminController@penjualanpdf');
});
