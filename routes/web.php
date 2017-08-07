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

Route::get('/','PageController@index');

Route::get('/home', 'PageController@index');

Route::get('/contact', 'PageController@contact');

Route::get('/mieter', 'PageController@mieter');

Route::get('/liegenschaft', 'PageController@liegenschaft');

Route::get('/wohnungen/{liegenschaftID}', 'PageController@wohnungen');

Route::get('/registry','PageController@registry');

Route::get('/login', 'PageController@login');

Route::post('/saveMieter', array('uses'=>'MieterController@createMieter'));

Route::get('/addMieter', 'PageController@addMieter');

Route::get('/editMieter/{mieterID}', 'MieterController@selectedMieter');

Route::post('/updateMieter', array('uses'=>'MieterController@updateMieter'));

Route::get('/deleteMieter/{mieterID}', 'MieterController@deleteMieter');

Route::post('/saveLiegenschaft', array('uses'=>'LiegenschaftController@createLiegenschaft'));

Route::get('/addLiegenschaft', 'PageController@addLiegenschaft');

Route::get('/editLiegenschaft/{liegenschaftID}', 'LiegenschaftController@selectedLiegenschaft');

Route::post('/updateLiegenschaft', array('uses'=>'LiegenschaftController@updateLiegenschaft'));

Route::get('/deleteLiegenschaft/{liegenschaftID}', 'LiegenschaftController@deleteLiegenschaft');

Route::get('/addWohnung/{liegenschaftID}', 'PageController@addWohnung');

Route::post('/saveWohnung', array('uses'=>'WohnungController@createWohnung'));

Route::post('/mieterToWohnung', array('uses'=>'WohnungController@mieterToWohnung'));

Route::post('/mieterentfernen', array('uses'=>'WohnungController@mieterentfernen'));

Route::get('/editWohnung/{wohnungsID}', 'WohnungController@selectedWohnung');

Route::post('/updateWohnung', array('uses'=>'WohnungController@updateWohnung'));

Route::get('/deleteWohnung/{wohnungsID}', 'WohnungController@deleteWohnung');

Auth::routes();

Route::get('/logout', function ()
{
	Auth::logout();
	return redirect('/');
});

Route::auth();