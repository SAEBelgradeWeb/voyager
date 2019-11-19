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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
try {
    $pages = \TCG\Voyager\Models\Page::all();

    foreach ($pages as $page) {
        Route::get($page->slug, 'PagesController@page');
    }
} catch (\Exception $exception) {
    // do nothing
}

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
