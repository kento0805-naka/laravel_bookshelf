<?php


Auth::routes();
Route::get('/', 'TopController@index');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::middleware('auth')->group(function () {
        Route::get('/{name}/edit', 'UserController@edit')->name('edit');
        Route::put('/{name}', 'UserController@update')->name('update');
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
});

Route::resource('kento', 'UserController');