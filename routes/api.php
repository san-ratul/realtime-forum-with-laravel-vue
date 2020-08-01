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

Route::apiResource('/question','QuestionController');

Route::apiResource('/category','CategoryController');

Route::apiResource('/{question}/reply','ReplyController');

Route::post('like/{reply}','LikeController@likeit')->name('reply.like');
Route::delete('like/{reply}','LikeController@unlikeit')->name('reply.unlike');