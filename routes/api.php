<?php

use App\Services\Currency\Currency;
use App\Services\Currency\CurrencyLoaderFromApi;
use Illuminate\Http\Request;

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

Route::get('currency', function () {
    $currency = new Currency(new CurrencyLoaderFromApi('http://phisix-api3.appspot.com/stocks.json'));

    return $currency->all();

//    return [
//        [
//            'name' => '2GO Group',
//            'volume' => 19000,
//            'amount' => 35.58,
//        ],
//        [
//            'name' => 'HOUSE PREF A',
//            'volume' => 21000,
//            'amount' => 13.54,
//        ]
//    ];
});