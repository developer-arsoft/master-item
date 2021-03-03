<?php

use App\Http\Controllers\MasterTestController;
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

Route::get('items', [MasterTestController::class, 'getItems']);
Route::post('items', [MasterTestController::class, 'storeItem']);
Route::get('items/{id}', [MasterTestController::class, 'showItem']);
Route::put('items/{id}', [MasterTestController::class, 'updateItem']);
Route::delete('items/{id}', [MasterTestController::class, 'deleteItem']);
