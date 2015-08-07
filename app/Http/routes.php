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
use App\Http\Controllers\Auth\AuthController ;

    // lista de empresas para mejorar acceso
    Route::get('',function(){
       return view('company_list');
    });


    //login pasa x middle company para chequear la empresa
    Route::get('login/id={id}', ['middleware'=>['company'],'as'=>'login','uses'=>'LoginController@getLogin']);

    //pasa para cambiar la conexion a la db segun la empresa
    Route::group(['middleware'=>'changeDb'],function(){

        Route::post('postLogin',['as'=>'postLogin','uses'=>'LoginController@postLogin']);

        Route::group(['middleware' => ['auth']], function()
        {
            Route::get('home', ['as'=>'home','uses'=>'HomeController@getIndex']);
           // Route::get('dispositivos',            ['middleware' => ['roles:dispostivo-listar'] , 'as'=>'dispositivos','uses'=>'DispositivosController@getIndex']);

            Route::get('crudo', ['as'=>'crud','uses'=>'CrudController@getIndex']);



            //logout
            Route::get('logout',['as'=>'logout','uses'=>'LoginController@getLogout']);
        });



        Route::group(['prefix'=>'config'],function()
        {
            Route::post('addUser',['as'=>'postUser','uses'=>'UsersController@postCreate']);
            Route::get('del/{id}',['as'=>'delUser','uses'=>'UsersController@getDel']);

            Route::get('user',function(){
                return view('config/users');
            });
        });


    });



//test
Route::get('test',function()
{
    Artisan::call('make:controller',['name'=>'App\Http\Controllers\PepitoController']);
    Artisan::call('make:model',		['name'=>'App\Entities\PepitoModel']);
    Artisan::call('make:migration',	['name'=>'PepitoMigration']);

});

