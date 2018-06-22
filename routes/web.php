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
    Route::get('brands/', 'BrandController@index')->name('brand.index');
    Route::get('brands/new-brand', 'BrandController@create')->name('brand.create');
    Route::post('brands/new-brand', 'BrandController@store')->name('brand.store');
    Route::get('brands/{slug}', 'BrandController@show')->name('brand.show');
    Route::get('brands/{slug}/edit', 'BrandController@edit')->name('brand.edit');
    Route::put('brands/{slug}', 'BrandController@update')->name('brand.update');

//    campaigns routes
    Route::get('brands/{slug}/new-campaign', 'CampaignsController@create')->name('campaign.create');
    Route::post('brands/{slug}/new-campaign', 'CampaignsController@store')->name('campaign.store');
    Route::get('brands/{slug}/campaign/{uuid}', 'CampaignsController@show')->name('campaign.show');
    Route::get('brands/{slug}/campaign/{uuid}/edit', 'CampaignsController@edit')->name('campaign.edit');
    Route::put('brands/{slug}/campaign/{uuid}', 'CampaignsController@update')->name('campaign.update');

//    Scheduling a Camapign 
    Route::put('brands/{slug}/campaign/{uuid}/schedule', 'CampaignsController@storeSchedule')->name('campaign.schedule.store');

//    Adding and Removing list to Campaign
    Route::post('brands/{slug}/campaign/{uuid}/add-list', 'CampaignsController@addListsToCampaign')->name('campaign.add.lists');
    Route::post('brands/{slug}/campaign/{uuid}/remove-list', 'CampaignsController@removeListsToCampaign')->name('campaign.remove.lists');

//    SubsList Routes
    Route::get('subscribers', 'SubsListController@index')->name('subs.list.index');
    Route::post('subscribers', 'SubsListController@store')->name('subs.list.store');
    Route::get('subscribers/{uuid}', 'SubsListController@show')->name('subs.list.show');
    Route::get('subscribers/{uuid}/edit', 'SubsListController@edit')->name('subs.list.edit');
    Route::put('subscribers/{uuid}', 'SubsListController@update')->name('subs.list.update');
    Route::delete('subscribers/{uuid}', 'SubsListController@destroy')->name('subs.list.destroy');

//    Subs Routes
    Route::get('subscribers/{uuid}/new-subscriber', 'SubsController@create')->name('subs.create');
    Route::post('subscribers/{uuid}/new-subscriber', 'SubsController@store')->name('subs.store');
    Route::get('subscribers/{uuid}/{email}', 'SubsController@show')->name('subs.show');
    Route::delete('subscribers/{uuid}/{email}', 'SubsController@destroy')->name('subs.destroy');

//    Email Routes
    Route::get('emails', 'EmailController@index')->name('email.index');
    Route::post('brands/{slug}/campaign/{uuid}/email-testing', 'EmailController@test')->name('email.test');
    Route::get('campaign/{uuid}/email-sending', 'EmailController@jobsTest')->name('email.send');
    
//    Email Templates Route
    Route::get('templates', 'TemplateController@index')->name('template.index');
    Route::get('templates/new', 'TemplateController@create')->name('template.create');
    Route::post('templates/new-template', 'TemplateController@store')->name('template.store');
    Route::get('templates/{uuid}', 'TemplateController@show')->name('template.show');
    Route::get('templates/{uuid}/edit', 'TemplateController@edit')->name('template.edit');
    Route::get('templates/{id}/get', 'TemplateController@getContent')->name('template.get.content');

});