<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/alterar/senha', 'HomeController@alterarSenha')->name('alterar.senha');
Route::post('/alterar/senha', 'HomeController@updateSenha')->name('senha.update');


/*
Route::get('login', 'Auth\LoginController@ShowLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@ShowLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@SendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@ShowResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request'); 
*/