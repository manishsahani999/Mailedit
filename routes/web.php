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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
//    brand routes
    Route::get('new-brand', 'BrandController@create')->name('brand.create');
    Route::post('new-brand', 'BrandController@store')->name('brand.store');
    Route::get('{slug}', 'BrandController@show')->name('brand.show');

//    campaigns routes
    Route::get('{slug}/new-campaign', 'CampaignsController@create')->name('campaign.create');
    Route::post('{slug}/new-campaign', 'CampaignsController@store')->name('campaign.store');
    Route::get('{slug}/campaign/{uuid}', 'CampaignsController@show')->name('campaign.show');
});