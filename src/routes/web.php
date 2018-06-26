<?php

Route::group(['namespace' => 'Mahfuz\LoginActivity\Http\Controllers'], function() {
    Route::get('login-activity', 'LoginActivityController@index');
});