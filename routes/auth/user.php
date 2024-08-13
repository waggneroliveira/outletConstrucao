<?php


Route::prefix('painel')->name('admin.')->namespace('User')->group(function () {

    Auth::routes();

});
