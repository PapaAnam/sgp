<?php
Route::middleware('auth')->group(function(){

	Route::get('/', function(){
		return redirect()->route('barang.index');
	});

	Route::resource('barang', 'BarangController')->except(['show']);
	Route::get('/barang/cek/{barang}', 'BarangController@cek');
	Route::resource('konsumen', 'KonsumenController')->except(['show']);
	Route::get('/konsumen/cek/{barang}', 'KonsumenController@cek');
	Route::get('/order-final/{order_final}/cetak', 'OrderFinalController@cetak')->name('order-final.print');
	Route::get('/order-final/cek/{order_final}', 'OrderFinalController@cek');
	Route::get('/laporan-rahn', 'OrderFinalController@rahn')->name('order-final.print-all');
	Route::get('/laporan-due-date', 'OrderFinalController@dueDate')->name('order-final.due-date');
	Route::get('/laporan-keuangan', 'OrderFinalController@keuangan')->name('order-final.keuangan');
	Route::resource('order-final', 'OrderFinalController');
	Route::get('/pelunasan/{order_final}/cetak', 'PelunasanController@cetak')->name('pelunasan.print');
	Route::resource('pelunasan', 'PelunasanController');
	Route::resource('perpanjangan', 'PerpanjanganController');
	Route::get('/perpanjangan/cek/{order_final}', 'PerpanjanganController@cek');
	Route::get('/perpanjangan/{perpanjangan}/cetak', 'PerpanjanganController@cetak')->name('perpanjangan.print');

});
Auth::routes();
