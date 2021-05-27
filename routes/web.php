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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/contraseña/restablecer', 'ResetPasswordController@resetPassword')->name('reset-password');
Route::post('/contraseña/restablecer/nuevo', 'ResetPasswordController@updatePassword')->name('update-password');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/todos', 'sendProductsController@index')->name('all');

    //Shos filter completed
    Route::get('/home/completados', 'ProductController@showSendsCompleted')->name('completed');
    Route::get('/home/en-procesos', 'ProductController@showSendsNoCompleted')->name('process');
    Route::put('/detalle-producto/completar{id}', 'ProductController@completedSend')->name('completed-send');

    // Sends
    Route::get('/nuevo-envio', 'sendProductsController@create')->name('new-send');
    Route::get('/rastrear/{id}', 'sendProductsController@showTrack')->name('track');
    Route::post('/save', 'sendProductsController@store')->name('save');
    Route::get('/editar-producto/{id}', 'sendProductsController@edit')->name('edit-send');
    Route::put('/update/{id}', 'sendProductsController@update')->name('update');
    Route::delete('/eliminar/{id}', 'sendProductsController@destroy')->name('destroy');

    //Product
    Route::get('/publicar-estado-envío/{id}', 'sendProductsController@postStatusSend')->name('pust-status-send');

    // Agregar seguimiento
    Route::post('/publicar-seguimiento', 'TrackingController@store')->name('post-tracking');

    //Show list commnets
    Route::get('/detalle-producto/comentarios/{id}', 'ProductController@show')->name('show-comments-post');
});

Route::get('/buscar-producto', 'sendProductsController@searchFolio')->name('search_folio');
Route::get('/detalle-producto/{id}', 'sendProductsController@show')->name('detail-send');
Route::get('/rastrear/{id}', 'sendProductsController@showTrack')->name('track');

Route::get('rastrear/comentar/{id}', function ($id) {
    return view('sends.comment', compact('id'));
})->name('show-form-commnet');

Route::post('/rastrear/comentar', 'ProductController@store')->name('comment-post');

Route::get('/no-hay-resultados', function () {
    return view('404.404');
})->name('404');


