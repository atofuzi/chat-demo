<?php

use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\ChatRoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::get('/test', function () {
  return 'これはテストです';
});

Route::prefix('v1')->group(function () {
  Route::middleware('auth:api')->get('/chat/rooms/', [ChatRoomController::class, 'index']);
  Route::get('/chat/room/{id}/messages', [ChatMessageController::class, 'index']);
  Route::post('/chat/room/{id}/message', [ChatMessageController::class, 'store']);
  // リアルタイム通信テスト用のRoute TODO:削除する
  Route::get('/chat/room/{id}/message/action', [ChatMessageController::class, 'action']);
  Route::post('test/s3', function () {
    try {
        Storage::cloud()->put('hello.json', '{"hello": "world"}');
    } catch ( Exception $err) {
        return $err->getMessage();
    }
});

});



