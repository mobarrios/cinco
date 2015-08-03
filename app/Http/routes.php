<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('test',function()
{
	Artisan::call('make:controller',['name'=>'App\Http\Controllers\PepitoController']);
	Artisan::call('make:model',		['name'=>'App\Entities\PepitoModel']);
	Artisan::call('make:migration',	['name'=>'PepitoMigration']);
    	
});

//login
Route::get('login',     ['as'=>'login','uses'=>'LoginController@getLogin']);
Route::post('postLogin',['as'=>'postLogin','uses'=>'LoginController@postLogin']);


Route::group(['middleware' => ['auth']], function()
{
    Route::get('/',    ['as'=>'home','uses'=>'HomeController@getIndex']);
    Route::get('home', ['as'=>'home','uses'=>'HomeController@getIndex']);

    Route::get('dispositivos',            ['middleware' => ['roles:dispostivo-listar'] , 'as'=>'dispositivos','uses'=>'DispositivosController@getIndex']);
    Route::get('dispositivosEditar',      ['middleware' => ['roles:dispostivo-editar'] , 'as'=>'dispositivosEditar','uses'=>'DispositivosController@getEdit']);
    Route::get('dispositivosBorrar/{id}', ['middleware' => ['roles:dispostivo-eliminar'] , 'as'=>'dispositivosDelete','uses'=>'DispositivosController@getDelete']);
    Route::post('dispositivosEditarPost', ['middleware' => ['roles:dispositivo-editar'], 'as' => 'dispositivosEditPost','uses'=>'DispositivosController@postEdit']);



    //logout
    Route::get('logout',['as'=>'logout','uses'=>'LoginController@getLogout']);


});

