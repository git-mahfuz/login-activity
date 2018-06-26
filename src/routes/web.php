<?php

Route::group(['namespace' => 'Mahfuz\LoginActivity\Http\Controllers', 'middleware' => ['web', 'auth']], function() {
    Route::get('login-activity', 'LoginActivityController@index');
});