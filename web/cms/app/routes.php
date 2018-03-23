<?php 

Route::get('Api/Login','Api/Login/login');
Route::resource('article', 'Api/Article');
Route::resource('content/index', 'Api/Content/index');
Route::resource('content/addCollect', 'Api/Content/addCollect');
Route::resource('content/isCollect', 'Api/Content/isCollect');
Route::resource('cate/all', 'Api/Category/all');
Route::get('cate/catelist', 'Api/category/catelist');
Route::get('collect/getall', 'Api/Collect/getAll');