<?php

use App\Http\Controllers\TokenController;
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

// Route::post('/sanctum/token',TokenController::class);

// Route::get('/kategori', 'AnasayfaController@index');
// Route::get('/kategori/{slug_kategori_adi}', 'KategoriController@index');

Route::apiResource('/kategori', 'KategoriController');
Route::apiResource('/anasayfa', 'AnasayfaController');
Route::apiResource('/urun', 'UrunController');
Route::get('/urun/search/{search}', 'UrunController@search');
Route::post('/urun/search/{search}', 'UrunController@search');

Route::post('/kullanici/kaydol', 'KullaniciController@store');
Route::get('/kullanici/kaydol','KullaniciController@index');
