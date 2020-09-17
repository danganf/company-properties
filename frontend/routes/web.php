<?php


Route::group( [ 'as' => 'auth.', 'prefix' => 'auth' ], function () {

    Route::get('/'       , 'AuthController@index' )->name('index');
    Route::post('/verify', 'AuthController@auth' )->name('auth');
    Route::get('/logoff' , 'AuthController@logoff' )->name('logoff');

});

Route::group( [ 'middleware' => [ 'verify.session' ] ], function () {/*, 'dependency.files'*/

    Route::get('/', 'MainController@index' )->name('dashboard');
    Route::get('/admin', 'MainController@admin' )->name('admin');
    Route::get('/new', 'MainController@new' )->name('new');
    Route::get('/edit/{id}', 'MainController@edit' )->name('edit');

});
