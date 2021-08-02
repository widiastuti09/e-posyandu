<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login-mobile', 'API\AuthController@login');
Route::post('/save-token', 'API\AuthController@saveDeviceToken');

Route::get('/user-mobile', 'API\AuthController@user');

Route::get('/ibu-hamil', 'API\IbuHamilController@ibuHamil');
Route::get('/ibu-hamil/{id}', 'API\IbuHamilController@detailIbuHamil');

Route::get('/balita', 'API\BalitaController@balita');
Route::get('/balita/{id}', 'API\BalitaController@detailBalita');

Route::get('/lansia', 'API\LansiaController@lansia');
Route::get('/lansia/{id}', 'API\LansiaController@detailLansia');

Route::get('/pemeriksaan-bumil/{id}', 'API\IbuHamilController@periksabumil');

Route::get('/Bumilresti/{id}','API\IbuHamilController@Bumilresti');

Route::get('/penimbangan-balita/{id}', 'API\BalitaController@penimbanganBalita');
Route::get('/pemeriksaan-lansia/{id}', 'API\LansiaController@periksaLansia');

Route::get('/jadwal-balita', 'API\JadbalController@index');
Route::get('/jadwal-bumil','API\JadmilController@index');
Route::get('jadwal-lansia', 'API\JadlanController@index');

Route::post('/reset-password', 'API\AuthController@resetPassword');
Route::post('/verification-code', 'API\AuthController@verificationCode');
Route::post('/ganti-password', 'API\AuthController@gantiPassword');

Route::put('/edit-profile/{id}', 'API\AuthController@updateUser');
