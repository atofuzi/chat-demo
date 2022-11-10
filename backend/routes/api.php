<?php

use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\ChatRoomController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test', function () {
  return 'これはテストです';
});

Route::prefix('v1')->group(function () {
  Route::get('/chat/rooms/', [ChatRoomController::class, 'index']);
  Route::get('/chat/room/{id}/messages', [ChatMessageController::class, 'index']);
  Route::post('/chat/room/{id}/message', [ChatMessageController::class, 'store']);
});