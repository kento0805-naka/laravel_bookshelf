<?php


Auth::routes();
Route::get('/', 'TopController@index');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
});
