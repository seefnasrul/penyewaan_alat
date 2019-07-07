<?php
Route::get('/', function() {
    return redirect(route('admin.dashboard'));
});

Route::get('home', function() {
    return redirect(route('admin.dashboard'));
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function() {
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    Route::get('users/roles', 'UserController@roles')->name('users.roles');
    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users'
        ]
    ]);
});

Route::middleware('auth')->get('logout', function() {
    Auth::logout();
    return redirect(route('login'))->withInfo('You have successfully logged out!');
})->name('logout');

Auth::routes(['verify' => true]);

Route::name('js.')->group(function() {
    Route::get('dynamic.js', 'JsController@dynamic')->name('dynamic');
});

// Get authenticated user
Route::get('users/auth', function() {
    return response()->json(['user' => Auth::check() ? Auth::user() : false]);
});

Route::name('alat.')->prefix('alat')->group(function() {
    Route::get('','AlatController@index')->name('index');
    Route::get('create','AlatController@create')->name('create');
    Route::post('create','AlatController@store')->name('store');
    Route::get('get-data','AlatController@getAlats')->name('get-data');
    Route::get('{id}/edit','AlatController@edit')->name('edit');
    Route::put('{id}','AlatController@update')->name('update');
    Route::get('{id}/delete','AlatController@destroy')->name('delete');
});

Route::name('transaksi.')->prefix('transaksi')->group(function() {
    Route::get('','TransaksiController@index')->name('index');
    // Route::get('/add-list','TransaksiController@indexTambahTransaksi')->name('indexTambah');
    Route::get('create/{id}','TransaksiController@create')->name('create');
    Route::post('create','TransaksiController@store')->name('store');
    Route::get('get-data','TransaksiController@getData')->name('get-data');
    Route::get('add-list','TransaksiController@indexTambahTransaksi')->name('add-list');
    Route::get('get-data-tambah-transaksi','TransaksiController@getDataTambahTransaksi')->name('get-data-tambah-transaksi');
    Route::get('{id}/edit','TransaksiController@edit')->name('edit');
    Route::get('add-list','TransaksiController@indexTambahTransaksi')->name('add-list');
    Route::put('{id}','TransaksiController@update')->name('update');
});
                                                                                                                                                  
Route::name('pengguna.')->prefix('pengguna')->group(function() {
    Route::get('','PenggunaController@index')->name('index');
    Route::get('create','PenggunaController@create')->name('create');
    Route::post('create','PenggunaController@store')->name('store');
    Route::get('get-data','PenggunaController@getData')->name('get-data');
    Route::get('{id}/edit','PenggunaController@edit')->name('edit');
    Route::put('{id}','PenggunaController@update')->name('update');
    Route::get('{id}/delete','PenggunaController@destroy')->name('delete');
    
});

