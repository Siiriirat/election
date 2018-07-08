<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/header_regis', function () {
    return view('master.header_regis');
});
Route::get('/admin_regis', function () {
    return view('header.admin_regis');
});


Route::get('/admin_edit', function () {
    return view('header.admin_edit');
});

Route::get('/show_area', function () {
    return view('admin.show_area');
});






Route::post('/header_regis','MasterController@header_regis');

Route::get('/admin_area','HeaderController@admin_area');
Route::post('/admin_area','HeaderController@admin_regis');
Route::get('/select_area','HeaderController@select_area');
Route::post('/area','AdminController@area');

Route::post('/score','AdminController@score');

//show member(master)
Route::get('/show_member','MasterController@showmember');

//delete header(master)
Route::get('delete/{header_id}/header', 'MasterController@deleteheader');

//edit header(master)
Route::get('edit/{header_id}/header', 'MasterController@editheader');

//update header(master)
Route::post('edit/{header_id}/update','MasterController@updateheader');

//show header(master)
Route::get('show/{header_id}/header','MasterController@showadmin');

// show area(admin)
Route::get('show/{admin_id}/admin','AdminController@showarea');

// edit admin
Route::get('edit/{admin_id}/admin','AdminController@editadmin');

//update admin(master)
Route::post('edit/{admin_id}/updateadmin','AdminController@updateadmin');

// edit area
Route::get('edit/{area_id}/area','AdminController@editarea');

//update area(master)
Route::post('edit/{area_id}/updatearea','AdminController@updatearea');

//delete area(master)
Route::get('delete/{area_id}/area', 'AdminController@deletearea');

Route::get('/showscore','AdminController@showscore');

//add score
Route::get('add/{area_id}/score','AdminController@addscore');


//scoreadd
Route::get('scoreadd','AdminController@scoreadd');



//คะแนน
Route::get('score_add','AdminController@allarea');
Route::post('score_add','AdminController@search');
Route::post('action','AdminController@action');
Route::get('showscore1','AdminController@scoreshow');
