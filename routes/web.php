<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/about', function () {
//     return view('/about');
// });
// Route::get('/products', function () {
//     return view('products');
// });
// Route::get('cart', function () {
//     return view('cart');
// });

Route::get('/','App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('about','App\Http\Controllers\HomeController@about')->name("home.about");

//case
Route::get('cases','App\Http\Controllers\Admin\AdminCaseController@index')->name("admin.case.index");
Route::get('clientCases','App\Http\Controllers\Admin\AdminCaseController@clientCases')->name("admin.case.index");
Route::get('newCase','App\Http\Controllers\Admin\AdminCaseController@create')->name("admin.case.create");
Route::post('saveNewCase','App\Http\Controllers\Admin\AdminCaseController@save')->name("admin.case.save");
Route::get('caseName','App\Http\Controllers\Admin\AdminClientController@clientName')->name("admin.case.create");

//search cases
//Route::get('cases/{id}/search', 'App\Http\Controllers\Admin\AdminCaseController@search')->name('admin.case.search');
Route::post('cases/search', 'App\Http\Controllers\Admin\AdminCaseController@search')->name('admin.case.search');

//case asign
Route::get('delete','App\Http\Controllers\Admin\AdminCaseController@delete')->name("admin.case.delete");
Route::get('asign','App\Http\Controllers\Admin\AdminCaseController@asign')->name("admin.case.asign");
Route::put('/case/{id}/update','App\Http\Controllers\Admin\AdminCaseController@update')->name("admin.case.update");
Route::get('/case/{id}/edit','App\Http\Controllers\Admin\AdminCaseController@edit')->name("admin.case.edit");
Route::get('/case/{id}/delete','App\Http\Controllers\Admin\AdminCaseController@delete')->name("admin.case.delete");
Route::post('searchAsigned','App\Http\Controllers\Admin\AdminCaseController@searchAsigned')->name("admin.case.searchAsigned");

//judge
Route::get('asignedCases','App\Http\Controllers\Admin\AdminJudgeController@asignedCases')->name("admin.judge.asignedCases");
Route::get('/judge/{id}/editCase','App\Http\Controllers\Admin\AdminJudgeController@editCase')->name("admin.judge.editCase");
Route::put('/judge/{id}/updateCase','App\Http\Controllers\Admin\AdminJudgeController@updateCase')->name("admin.judge.updateCase");
Route::post('searchAsignedCases','App\Http\Controllers\Admin\AdminJudgeController@searchAsignedCases')->name("admin.judge.searchAsignedCases");

Route::get('/judge/{id}/caseDecision','App\Http\Controllers\Admin\AdminJudgeController@editCaseDecision')->name("admin.judge.caseDecision");
Route::put('/judge/{id}/updateCaseDecision','App\Http\Controllers\Admin\AdminJudgeController@updateCaseDecision')->name("admin.judge.updateCaseDecision");
//plaintiff
Route::get('clients','App\Http\Controllers\Admin\AdminClientController@index')->name("admin.client.index");
Route::get('newClient','App\Http\Controllers\Admin\AdminClientController@create')->name("admin.client.create");
Route::get('/client/{id}/show','App\Http\Controllers\Admin\AdminClientController@show')->name("admin.client.show");
Route::post('saveNewClient','App\Http\Controllers\Admin\AdminClientController@save')->name("admin.client.save");

//parties
Route::get('/party/{id}/create','App\Http\Controllers\Admin\AdminPartyController@SearchCase')->name("admin.party.create");
Route::post('saveParty','App\Http\Controllers\Admin\AdminPartyController@save')->name("admin.party.save");
Route::get('/party/{id}/viewParties','App\Http\Controllers\Admin\AdminPartyController@showParties')->name("admin.party.showParties");
Route::get('/party/{id}/showParties','App\Http\Controllers\Admin\AdminPartyController@showParties')->name("admin.party.showParties");
Route::get('/party/{id}/edit','App\Http\Controllers\Admin\AdminPartyController@edit')->name("admin.party.edit");
Route::put('/party/{id}/update','App\Http\Controllers\Admin\AdminPartyController@update')->name("admin.party.update");
Route::get('/party/{id}/delete','App\Http\Controllers\Admin\AdminPartyController@delete')->name("admin.party.delete");

Route::get('/party/{id}/audio','App\Http\Controllers\Admin\AdminPartyController@audio')->name("admin.party.audio");
Route::put('/party/{id}/audiorecord','App\Http\Controllers\Admin\AdminPartyController@audioRecord')->name("admin.party.audioRecord");

Route::get('/products','App\Http\Controllers\ProductController@index')->name("products.index");
Route::get('/products/{id}','App\Http\Controllers\ProductController@show')->name("products.show");
Route::get('/cart','App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete','App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add{id}','App\Http\Controllers\CartController@add')->name("cart.add");


Route::middleware("auth")->group(function () {
    Route::get('/cart/purchase','App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders','App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});
Route::middleware('admin')->prefix('/admin')->group(function() {
    Route::get('/','App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/products','App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/products/store','App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::get('/products/create','App\Http\Controllers\Admin\AdminProductController@create')->name("admin.product.create");
    Route::get('/products/{id}/delete','App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/products/{id}/edit','App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/products/{id}/update','App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
    Route::get('/adminUser','App\Http\Controllers\Admin\AdminRoleController@index')->name("admin.role.index");
    Route::get('/role/{id}/edit','App\Http\Controllers\Admin\AdminRoleController@edit')->name("admin.role.edit");
    Route::put('/role/{id}/update','App\Http\Controllers\Admin\AdminRoleController@update')->name("admin.role.update");
    Route::get('/role/{id}/delete','App\Http\Controllers\Admin\AdminRoleController@delete')->name("admin.role.delete");

    });

Auth::routes();
Route::get('language/{locale}', 'App\Http\Controllers\LocalizationController@changeLocale')->name('locale');
