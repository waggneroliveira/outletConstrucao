<?php

Route::prefix('cliente')->name('customer.')->namespace('Customer')->group(function () {
    Auth::routes();
});

Route::middleware('auth:customer')->namespace('Customer')->group(function(){
  Route::post('cliente/email/resend','Auth\VerificationController@resend')->name('verification.resend');
  Route::get('cliente/email/verify','Auth\VerificationController@show')->name('verification.notice');
  Route::get('cliente/email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('verification.verify');
});
