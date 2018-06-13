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
    Route::get('{slug}/edit', 'BrandController@edit')->name('brand.edit');
    Route::put('{slug}', 'BrandController@update')->name('brand.update');

//    campaigns routes
    Route::get('{slug}/new-campaign', 'CampaignsController@create')->name('campaign.create');
    Route::post('{slug}/new-campaign', 'CampaignsController@store')->name('campaign.store');
    Route::get('{slug}/campaign/{uuid}', 'CampaignsController@show')->name('campaign.show');
    Route::get('{slug}/campaign/{uuid}/edit', 'CampaignsController@edit')->name('campaign.edit');
    Route::put('{slug}/campaign/{uuid}', 'CampaignsController@update')->name('campaign.update');

//    Subs Routes
    Route::get('subscribers/', 'SubsController@create')->name('subs.index');
    Route::get('subscribers/new-subscriber', 'SubsController@create')->name('subs.create');
});