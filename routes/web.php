<?php

Route::resource('admin/products', 'Admin\ProductController');


//substituir o post pelo any, pois na paginação ele precisa ser get, como essa rota era post, estava apresentando erro.
Route::any('admin/categories/search','Admin\CategoryController@search')->name('categories.search');


Route::resource('admin/categories','Admin\CategoryController');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
