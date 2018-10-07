<?php

use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'MetaController@index');

/** Роуты емкостей */
Route::resource(
	'cups',
	'CupController',
	[
		'names' => [
			'index'   => 'api.cups.index',
			'store'   => 'api.cups.store',
			'create'  => 'api.cups.create',
			'show'    => 'api.cups.show',
			'update'  => 'api.cups.update',
			'destroy' => 'api.cups.destroy',
			'edit'    => 'api.cups.edit',
		],
	]
);

/** Роуты иконок */
Route::resource(
	'icons',
	'IconController',
	[
		'only'  => [
			'index', 'show',
		],
		'names' => [
			'index' => 'api.icons.index',
			'show'  => 'api.icons.show',
		],
	]
);


Route::any('/{everything?}', function() {
	$code = Response::HTTP_BAD_REQUEST;

	abort($code, Response::$statusTexts[ $code ]);
})->where('everything', '(.*)');
