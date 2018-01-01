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

Route::group(['middleware' => 'CheckAfterLogin'],function(){

    Route::group(['namespace' => 'Login', 'prefix' => 'login'],function(){
        
        Route::get('/',['uses' => 'LoginController@index','as' => 'login']);
        Route::post('/login-store',['uses' => 'LoginController@store','as' => 'login.store']);

        Route::get('/register',['uses' => 'RegisLogController@getRegister','as' => 'register']);
        Route::POST('/store-register',['uses' => 'RegisLogController@store','as' => 'store.register']);
    });
});

Route::group(['middleware' => 'CheckDataLogin'],function(){  

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'],function(){
        Route::get('/', 'AdminDsController@index')->name('admin.index');
        Route::get('/logout', 'AdminDsController@logout')->name('admin.logout');
        // Master Portfolio
        Route::get('/master-portfolio', 'MasterPortfolioController@index')->name('master.portfolio');
        Route::post('/upload-portfolio', 'MasterPortfolioController@upload')->name('upload-portfolio');
        Route::get('/edit-portfolio', 'MasterPortfolioController@edit')->name('edit-portfolio');
        Route::post('/update-portfolio', 'MasterPortfolioController@update')->name('update-portfolio');
        Route::get('/delete-portfolio/{id}', 'MasterPortfolioController@destroy')->name('delete-portfolio');

        Route::get('/master-about', 'MasterAboutController@index')->name('master.about');
        Route::get('/show-about', 'MasterAboutController@show')->name('show.about');
        Route::post('/insert-about', 'MasterAboutController@store')->name('insert.about');
        Route::get('/edit-about', 'MasterAboutController@edit')->name('edit.about');
        Route::post('/update-about','MasterAboutController@update')->name('update.about');
        Route::get('/delete-about/{id}','MasterAboutController@destroy')->name('delete.about');

        Route::get('/master-contact','MasterContactController@index')->name('master.contact');
        Route::get('/read-contact','MasterContactController@read')->name('read.contact');
        Route::post('/store-contact','MasterContactController@store')->name('store-contact');

        Route::resource('/home','MasterHomeController');
        Route::get('/api/home','MasterHomeController@api')->name('api.home');
        
    }); 
});



